  
    <form name="form" id="<?php if($_GET['id']!='') echo "form"; else echo "payment-form";?>" method="post" action="" enctype="multipart/form-data">
      <table style="width: 100%;" cellspacing="10" cellpadding="10">
            <tr>
                <td colspan="4"><h1>Account Profile</h1></td>
            </tr>
            <tr>
                <td rowspan="7" style="width: 30%;" valign="top">
                    <div class="hideFromFirstTimers" style="display:none;">

                        <div style="height:100px;width:100px;float:left;margin-right:15px;text-align:center;border:solid 1px silver;vertical-align:middle; border-radius: 5px;">
                        
                        <?php 
						if($row["photo"]!='')
							$profile_photo = $ADMIN_URL."/Uploads/user/".$row["photo"];
						else
							$profile_photo = $ADMIN_URL."/Uploads/user/big_user_icon.png";
						?>
                        
                           <img src="<?=$profile_photo?>" alt="logo" style="height:100%; width:100%;" />
                        </div>

                        <input type="file" name="photo" id="photo" /><br /><br />

                                            </div>

                </td>
                <td style="width: 17%;"><label>First Name / Last Name</label></td>
                <td style="width: 30%;"><input name="name" type="text" class="required" id="name" value="<?=$row["name"]?>" style="width:152px;" />
                <input name="lname" type="text" class="required" id="lname" value="<?=$row["lname"]?>" style="width:152px;" />
                </td>
                <td style="width: 25%;"></td>
            </tr>
            <tr>
                <td><label>Email Address</label><br />
                    <span style="font-size: xx-small; color:gray;"> Changing this changes your login.</span>
                </td>
                <td colspan="2"><input name="email" type="text" class="required" id="email" value="<?=$row["email"]?>" /></td>
            </tr>
            <tr>
                <td><label>Phone Number</label></td>
                <td colspan="2"><input name="contact" type="text" class="required" id="contact" value="<?=$row["contact"]?>" /></td>
            </tr>
            <tr>
                <td><label>Address</label></td>
                <td colspan="2"><input name="address" type="text" id="address" value="<?=$row["address"]?>" /></td>
            </tr>
            <tr>
                <td><label>City</label></td>
                <td colspan="2"><input name="city" type="text" id="city" value="<?=$row["city"]?>" /></td>
            </tr>
            <tr>
                <td><label>State</label></td>
                <td><input name="state" type="text" id="state" value="<?=$row["state"]?>" style="width:152px;"/>
                <label style="margin-left:7px;">Postal Code</label> 
                <input name="zip_code" type="text" id="zip_code" value="<?=$row["zip_code"]?>" style="width:75px;" /></td>
            </tr>
            <tr>
                <td><label>Country</label></td>
                <td colspan="2">
                <select name="country" id="country">
                <option value="0">---- Select Country ----</option>
                <?php 
				$res_country = $common_obj->GET_COUNTRY();
				while($row_country = mysql_fetch_array($res_country)){ ?>
                <option value="<?=$row_country["id"]?>" <?php if($row["country"]==$row_country["id"]){?>selected="selected"<?php } ?>><?=$row_country["name"]?></option>
                <?php } ?>
                </select></td>
            </tr>

            <tr>
                <td colspan="4">
                    <hr class="profileHR" />
                </td>
            </tr>

            <tr class="passwordEditTools">
                <td rowspan="<?php if($_GET['id']!='')echo '3'; else echo '1';?>" valign="top">
                    <h1>Password</h1>
                    <span style="font-size:10px;color:gray;">If you would like to change your password enter a new password twice.</span>
                </td>
                <td><label>Password</label></td>
                <td colspan="2"><input name="new_password" type="password" class="profileInput" id="new_password" maxlength="250" />
                </td>
            </tr>
            <?php if($_GET['id']!=''){?>
            <tr class="passwordEditTools">
                <td><label>Confirm New Password</label></td>
                <td colspan="2"><input name="new_password_again" type="password" class="profileInput" id="new_password_again" maxlength="250" /></td>
            </tr>
            <tr class="passwordEditTools">
                <td><label>Current Password</label></td>
                <td colspan="2"><input name="old_password" readonly type="text" id="old_password" value="<?=$row["password"]?>" maxlength="250" class="profileInput" /></td>
            </tr>
            <?php }?>
             <tr>
                <td colspan="4">
                    <hr class="profileHR" />
                </td>
            </tr>
           
            
         
            <tr>
                <td colspan="4">
                    

                    <input class="button  blue-grd3 update-btn1" type="submit" name="save" id="save" value="Save Account" />
                    
                </td>
            </tr>
        </table>
    </form>

  <?php

if($_POST['save']!='' && $_GET['id']!='')
{
	$isValid=1;
	if($_POST['new_password']!='')
	{
		if($_POST['new_password']==$_POST['new_password_again'])
			$password = $_POST['new_password'];
		else
			$isValid=0;
	}
	else
	{
		$password = $_POST['old_password'];
	}
	
	if($isValid==1)
	{
		if($_FILES['photo']['name']!='')
		{
			$filename = $_FILES['photo']['name'];
			$temp="../../Uploads/user/";
			$tmp=$_FILES['photo']['tmp_name'];
			$temp=$temp.basename($filename);
			move_uploaded_file($tmp,$temp);
		}
		else
		$filename = $row["photo"];
		
		$res = UPDATE_PROFILE($_GET['id'],$password,$_POST['name'],$_POST['lname'],$_POST['email'],$_POST['contact'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip_code'],$filename);
		
		if($res>0)
			$_SESSION['msg']="Record Updated Successfully !";
		else
			$_SESSION['msg']="Error in Record Updated !";
	}
	else 
	{
		$_SESSION['msg']="New Password and Confirm Password not match. Please Try Again.";
	}
	
	//$query=mysql_query($sql);
	
	header("Location: edit.php?view=".$_GET['view']."&layout=edit&page=myprofile&id=".$_GET['id']);
}

if($_POST['email']!='' && $_GET['id']=='')
{
	$isValid=1;
	if($_POST['name']=='' && $_POST['lname']=='' && $_POST['email']=='' && $_POST['new_password']=='')
	{
		$isValid=0;
	}
	if($isValid==1)
	{	
		if($_FILES['photo']['name']!='')
		{
			$filename = $_FILES['photo']['name'];
			$temp="../Uploads/user/";
			$tmp=$_FILES['photo']['tmp_name'];
			$temp=$temp.basename($filename);
			move_uploaded_file($tmp,$temp);
		}
		else
		$filename = $row["photo"];
		
		$lastid = INSERT_PROFILE($_POST['new_password'],$_POST['name'],$_POST['lname'],$_POST['email'],$_POST['contact'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip_code'],$filename);
		
		if($lastid>=0)
		{	
			$_SESSION['msg']="Record Saved Successfully !";
			header("Location: edit.php?view=user&layout=edit&page=myprofile&id=".$lastid);	
		}
		else
		{
			$_SESSION['msg']="Error in Record saved!";
			header("Location: edit.php?view=user&layout=edit&page=myprofile");
		}
	}
	else
	{
		$_SESSION['msg']="Please Enter First Name, Last Name, Email and Password.";
		header("Location: edit.php?view=user&layout=edit&page=myprofile");
	}
}


function UPDATE_PROFILE($id,$password,$name,$lname,$email,$contact,$address,$city,$state,$country,$zip_code,$photo,$industry,$industry_company,$org_name,$website_url,$logo_pic,$timezone)
	{	
		$sql="UPDATE yr15_user set password='".$password."',name='".addslashes($name)."',lname='".addslashes($lname)."',email='".$email."',contact='".$contact."',address='".$address."',city='".$city."',state='".$state."',country='".$country."',zip_code='".$zip_code."',photo='".$photo."' where id='".$id."' ";
		$query=mysql_query($sql);
		return $query;
	}	
	
function INSERT_PROFILE($password,$name,$lname,$email,$contact,$address,$city,$state,$country,$zip_code,$photo,$industry,$industry_company,$org_name,$website_url,$logo_pic,$timezone,$plan,$cardNo,$CCMonth,$CCYear,$cc_cvv,$payment_method)
	{	
		$sql="INSERT INTO yr15_user set password='".$password."',name='".addslashes($name)."',lname='".addslashes($lname)."',email='".$email."',contact='".$contact."',address='".$address."',city='".$city."',state='".$state."',country='".$country."',zip_code='".$zip_code."',photo='".$photo."',reg_date='".date("Y-m-d H:i:s")."'"; 
		$query=mysql_query($sql);
		return mysql_insert_id();
	}	

?>

