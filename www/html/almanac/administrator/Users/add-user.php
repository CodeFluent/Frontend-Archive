<style>
input[type="text"], input[type="password"] {
    height: 24px;
    padding-left: 5px;
    width: 316px;
}
.profileHR{
	background-color: #D3D3D3;
    border: 0 none;
    color: #D3D3D3;
    height: 1px;
    margin: 40px 0;}
</style>

<?php
$res_subuser = $setting_obj->GET_SUB_USER_BYID($_GET['suid']);
$row_subuser = mysql_fetch_array($res_subuser); ?>

<div class="clear"></div>

<div style="font-size: 16px; font-weight: bold; margin-right: 60px; text-align: right;"><a href="edit.php?view=user&layout=edit&page=subuser&id=<?=$_GET['id']?>">Back</a></div>

<form id='form' name='profile' action='' method='post' enctype='multipart/form-data' autocomplete='off'>
        <table style="width: 100%;" cellspacing="10" cellpadding="10">
            <tr>
                <td colspan="4"><h1>Account Profile</h1></td>
            </tr>
            <tr>
                <td rowspan="9" style="width: 30%;" valign="top">
                    <div class="hideFromFirstTimers">

                        <div style="height:100px;width:100px;float:left;margin-right:15px;text-align:center;border:solid 1px silver;vertical-align:middle; border-radius: 5px;">
                        
                        <?php 
						if($row_subuser["photo"]!='')
							$profile_photo = $APP_URL."/Uploads/user/".$row_subuser["photo"];
						else
							$profile_photo = $APP_URL."/Uploads/user/big_user_icon.png";
						?>
                        
                           <img src="<?=$profile_photo?>" alt="logo" style="max-height:100px;max-width:100px;" />
                        </div>

                        <input type="file" name="photo" id="photo" /><br /><br />

                                            </div>

                </td>
                <td style="width: 17%;"><label>First Name / Last Name</label></td>
                <td style="width: 30%;"><input name="name" type="text" class="required" id="name" value="<?=$row_subuser["name"]?>" style="width:152px;" />
                <input name="lname" type="text" class="required" id="lname" value="<?=$row_subuser["lname"]?>" style="width:152px;" />
                </td>
                <td style="width: 25%;"></td>
            </tr>
            <tr>
                <td><label>Email Address</label><br />
                    <span style="font-size: xx-small; color:gray;"> Changing this changes your login.</span>
                </td>
                <td colspan="2"><input name="email" type="text" class="required email" id="email" value="<?=$row_subuser["email"]?>" /></td>
            </tr>
             <tr>
                <td><label>Password</label></td>
                <td colspan="2"><input name="password" type="text" class="required" id="password" value="<?=$row_subuser["password"]?>" /></td>
            </tr>
            <tr>
                <td><label>Phone Number</label></td>
                <td colspan="2"><input name="contact" type="text" id="contact" value="<?=$row_subuser["contact"]?>" /></td>
            </tr>
            <tr>
                <td><label>Address</label></td>
                <td colspan="2"><input name="address" type="text" id="address" value="<?=$row_subuser["address"]?>" /></td>
            </tr>
            <tr>
                <td><label>City</label></td>
                <td colspan="2"><input name="city" type="text" id="city" value="<?=$row_subuser["city"]?>" /></td>
            </tr>
            <tr>
                <td><label>State</label></td>
                <td><input name="state" type="text" id="state" value="<?=$row_subuser["state"]?>" style="width:152px;"/>
                <label style="margin-left:7px;">Postal Code</label> 
                <input name="zip_code" type="text" id="zip_code" value="<?=$row_subuser["zip_code"]?>" style="width:75px;" /></td>
            </tr>
            <tr>
                <td><label>Country</label></td>
                <td colspan="2"><select name="country" id="country">
                <option value="0">---- Select Country ----</option>
                <?php 
				$res_country = $common_obj->GET_COUNTRY();
				while($row_country = mysql_fetch_array($res_country)){ ?>
                <option value="<?=$row_country["id"]?>" <?php if($row_subuser["country"]==$row_country["id"]){?>selected="selected"<?php } ?>><?=$row_country["name"]?></option>
                <?php } ?>
                </select></td>
            </tr>
<?php
$var = explode("|",$row_subuser["privileges"]);
?>            
             <tr>
                <td><label>Privileges</label></td>
                <td colspan="2">
                	<input type="checkbox" name="eemail" value="email" <?php if($var[0]=='email'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>Email</strong></label>&nbsp;
                    <input type="checkbox" name="form" value="form" <?php if($var[1]=='form'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>Form</strong></label>&nbsp;
                    <input type="checkbox" name="list" value="list" <?php if($var[2]=='list'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>List</strong></label>&nbsp;
                    <input type="checkbox" name="statistics" value="statistics" <?php if($var[3]=='statistics'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>Statistics</strong></label>&nbsp;<br />
                    <input type="checkbox" name="video" value="video" <?php if($var[4]=='video'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>Video</strong></label>&nbsp;
                    <input type="checkbox" name="photo" value="photo" <?php if($var[5]=='photo'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>Photo</strong></label>&nbsp;
                    <input type="checkbox" name="drip" value="drip" <?php if($var[6]=='drip'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>AutoEmail</strong></label>&nbsp;
                    <input type="checkbox" name="lead" value="lead" <?php if($var[7]=='lead'){?>checked="checked"<?php } ?> />&nbsp;<label><strong>Lead</strong></label>
                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <hr class="profileHR" />

                    <input class="button  blue-grd3 update-btn1" type="submit" name="save" id="save" value="Save" />
                    
                </td>
            </tr>
        </table>
	</form>
<?php

if($_POST['save']!='')
{
	$privileges = $_POST['eemail']."|".$_POST['form']."|".$_POST['list']."|".$_POST['statistics']."|".$_POST['video']."|".$_POST['photo']."|".$_POST['drip']."|".$_POST['lead'];			
		
	if($_FILES['photo']['name']!='')
	{
		$filename = $_FILES['photo']['name'];
		$temp="../../app/Uploads/user/";
		$tmp=$_FILES['photo']['tmp_name'];
		$temp=$temp.basename($filename);
		move_uploaded_file($tmp,$temp);
	}
	else
	$filename = $row_subuser["photo"];
	
	if($_GET['suid']!='')
	{
		$res = $setting_obj->UPDATE_SUB_USER($_GET['suid'],$_POST['password'],$_POST['name'],$_POST['lname'],$_POST['email'],$_POST['contact'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip_code'],$filename,$privileges);
		$suid = $_GET['suid'];
	}
	else
	{
		$res = $setting_obj->INSERT_SUB_USER($recordId,$_POST['password'],$_POST['name'],$_POST['lname'],$_POST['email'],$_POST['contact'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip_code'],$filename,$privileges);
		$suid = mysql_insert_id();
	}
	
	if($res>0)
		{
			$_SESSION['msg']="Profile Saved Successfully !";
		}
	else
		$_SESSION['msg']="Error in Profile Saved !";
	
	header("Location: edit.php?view=user&layout=edit&page=add-user&id=".$_GET['id']."&suid=".$suid);
}
?>    
