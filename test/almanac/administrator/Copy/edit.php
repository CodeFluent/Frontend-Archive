<?php include("../header.php"); 
include_once("../../fckeditor/fckeditor.php") ;


if($_GET['action']=='delete_agent' && $_GET['agent_id']!='')
{
	$sql_delete = mysql_query("DELETE FROM yr15_agent WHERE id='".$_GET['agent_id']."'");
	header("Location: edit.php?view=copy&layout=edit&id=".$_GET['id']);
}

if($_GET['action']=='delete_owner' && $_GET['owner_id']!='')
{
	$sql_delete = mysql_query("DELETE FROM yr15_owner WHERE id='".$_GET['owner_id']."'");
	header("Location: edit.php?view=copy&layout=edit&id=".$_GET['id']);
}


if($recordId!='')

{

	$row = mysql_fetch_array($res);
	$almanac_id = $row["almanac_id"];
	$year = $row["year"];
	$library_id = $row['library_id'];
	$callnumber = $row['callnumber'];
	$issue_id = $_SESSION['issue_id'];
	$copy_id = $row['id'];
}
else
{
	$almanac_id = $_SESSION["almanac_id"];
	$year = $_SESSION["year"];
	$issue_id = $_SESSION['issue_id'];
	$library_id = $_SESSION['library_id'];
	$callnumber = $_SESSION['callnumber'];
}
?>

<style>
.sepLine{ 
border: 1px solid #efefef;
margin: 10px 0;
width: 85%;}
</style>       

<div class="vdDiscription left">

    

    <form name="form" id="form" method="post" action="" enctype="multipart/form-data">

	<input type="hidden" name="recordId" value="<?=$recordId?>">
    <input type="hidden" name="TABLE" value="<?=TABLE?>">
    
    
      <table width="100%" cellpadding="5" cellspacing="5">
		
       <tr>

        	<td>

          		<div class="txtLabel">Almanac Title:</div>
          		<select name="almanac_id" id="almanac_id" onchange="show_library()">
                <option value="">---- Select ----</option>
                <?php
				$sql_get_almanac = mysql_query("SELECT * FROM yr15_almanac WHERE status=1");
				while($row_get_almanac = mysql_fetch_array($sql_get_almanac))
				{
					?>
                    <option value="<?=$row_get_almanac['id']?>" <?php if($row_get_almanac['id']==$almanac_id){?>selected="selected"<?php } ?>><?=$row_get_almanac['title']?></option>
                    <?php
				}
				?>
                </select>

             </td>

        </tr>
        
         <tr>

        	<td>

          		<div class="txtLabel">Year:</div>

          		<select name="year" id="year" onchange="show_library()">
                <option value="">---- Select ----</option>
                <?php
				for($i=1750; $i<=1850; $i++)
				{
					?>
                    <option value="<?=$i?>" <?php if($i==$year){?>selected="selected"<?php } ?>><?=$i?></option>
                    <?php
				}
				?>
                </select>

             </td>

        </tr>
        
         <tr>

        	<td>

            	<div class="txtLabel">Library Name:</div>
<div id="show_lib">
<?php 
	
	$sql1="Select * from yr15_library where id='".$library_id."'";
	$res1=mysql_query($sql1);
		
		?>
        <input type="text" readonly="readonly" name="library_name" value="<?=mysql_result($res1,0,'library_name')?>" />
        
        <input type="hidden" name="library_id" value="<?=$library_id?>" />
		
	
   

               
</div>
             </td>

        </tr>

        <tr>

        	<td>

            	<div class="txtLabel">Call Number:</div>

                <input type="text" id="callnumber" name="callnumber" value="<?=$callnumber?>">

             </td>

        </tr>
 
        <tr>

        	<td>

            	<div class="txtLabel">Bookseller:</div>

                First Name : <input type="text" id="bookseller_first_name" name="bookseller_first_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Last Name : <input type="text" id="bookseller_last_name" name="bookseller_last_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp; OR &nbsp;&nbsp;&nbsp;&nbsp;
                Corporate Name : <input type="text" id="bookseller_corporate_name" name="bookseller_corporate_name" style="width:175px;">
                
                &nbsp;&nbsp;&nbsp;&nbsp;
                Bookseller Location : <input type="text" id="bookseller_location" name="bookseller_location" style="width:175px;">
                
                <?php if($_GET['id']!=''){?>
				<input type="submit" name="add_bookseller" value="Add additional Bookseller"><br /><br />
                <?php $res1 = getAgent($copy_id,'Bookseller'); 
				if(mysql_num_rows($res1)>0){?>
                
                <div class="sepLine"></div>
                
                <table>
                <tr>
                <td width="200"><strong>First Name</strong></td>
                <td width="200"><strong>Last Name</strong></td>
                <td width="200"><strong>Corporate Name</strong></td>
                <td width="200"><strong>Bookseller Location</strong></td>
                <td width="200"><strong>Delete</strong></td>
                </tr>
                
                <?php while($row_res1 = mysql_fetch_array($res1)){ ?>
                
                 <tr>
                <td><?=$row_res1['first_name']?></td>
                <td><?=$row_res1['last_name']?></td>
                <td><?=$row_res1['corporate_name']?></td>
                <td><?=$row_res1['bookseller_location']?></td>
                <td><a href="edit.php?view=copy&layout=edit&id=<?=$_GET['id']?>&action=delete_agent&agent_id=<?=$row_res1['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}">Delete</a></td>
                </tr>
                
                <?php } ?>
                
                </table>
                
				<?php }}?>
<div class="sepLine"></div>
             </td>

        </tr>
    
        <tr>

        	<td>

            	<div class="txtLabel">Owner/annotator:</div>

                First Name : <input type="text" id="owner_first_name" name="owner_first_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Last Name : <input type="text" id="owner_last_name" name="owner_last_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Gender : <input type="text" id="owner_gender" name="owner_gender" style="width:175px;">
                <br /><br />
                Occupation : <input type="text" id="owner_occupation" name="owner_occupation" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Location : <input type="text" id="owner_location" name="owner_location" style="width:175px;">
                
                
                <?php if($_GET['id']!=''){?>
				<input type="submit" name="add_owner" value="Add additional Owner/annotator"><br /><br />
                <?php $res1 = getOwner($_GET['id']); 
				if(mysql_num_rows($res1)>0){?>
                
                <div class="sepLine"></div>
                <table>
                <tr>
                <td width="200"><strong>First Name</strong></td>
                <td width="200"><strong>Last Name</strong></td>
                <td width="200"><strong>Gender</strong></td>
                <td width="200"><strong>Occupation</strong></td>
                <td width="200"><strong>Location</strong></td>
                <td width="200"><strong>Delete</strong></td>
                </tr>
                
                <?php while($row_res1 = mysql_fetch_array($res1)){ ?>
                
                 <tr>
                <td><?=$row_res1['first_name']?></td>
                <td><?=$row_res1['last_name']?></td>
                <td><?=$row_res1['gender']?></td>
                <td><?=$row_res1['occupation']?></td>
                <td><?=$row_res1['location']?></td>
                <td><a href="edit.php?view=copy&layout=edit&id=<?=$_GET['id']?>&action=delete_owner&owner_id=<?=$row_res1['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}">Delete</a></td>
                </tr>
                
                <?php } ?>
                
                </table>
                
				<?php }}?>
<div class="sepLine"></div>
             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Notes:</div>

                <textarea id="notes" rows="5" cols="10" name="notes"><?=$row["notes"]?></textarea> 
             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Stamp?:</div>

                <div style="float:left; width:100px;">Yes&nbsp;<input name="stamp" <?php if($row['stamp']==1){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="1" /></div>
                
                <div style="float:left; width:100px;">No&nbsp;<input name="stamp" <?php if($row['stamp']==0){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="0" /></div>
             </td>

        </tr>
        
        
        
       
        	
        <tr>

          <td height="40"></td>

        </tr>

       
        <tr>

          <td height="40"><input type="submit" name="update" value="Save" class="button blue-grd3 submit-btn1">
          <input type="submit" name="update" value="Save and go to image info" class="button blue-grd3 submit-btn1">

          </td>

        </tr>

      </table>

    </form>    

</div>

<script>
function show_library()
{
	var almanac_id = document.getElementById('almanac_id').value;
	var year = document.getElementById('year').value;
	var formData1 = {
	'almanac_id' : almanac_id,
	'year' : year,
	'action' : 'getLibrary'
	};
	$.ajax({
		type: "POST",
		url: '../getData.php',
		data: formData1,
		cache: false,
		success: function(data1) { 
			if ( data1 ) { 
				$('#show_lib').html(data1);
			} 
		},
	});
}
</script>

<?php

if($_POST['add_bookseller']!='')
{
	$res = insertAgent($copy_id,"Bookseller",$_POST['bookseller_first_name'],$_POST['bookseller_last_name'],$_POST['bookseller_corporate_name'],$_POST['bookseller_location']);
	header("Location: edit.php?view=copy&layout=edit&id=".$_GET['id']);
}

function insertAgent($copy_id,$role,$first_name,$last_name,$corporate_name,$bookseller_location)
{
	$sql1 = "INSERT INTO yr15_agent(copy_id,role,first_name,last_name,corporate_name,bookseller_location)values('".$copy_id."','".$role."','".$first_name."','".$last_name."','".$corporate_name."','".$bookseller_location."')";
	$query1=mysql_query($sql1);
}

if($_POST['add_owner']!='')
{
	$res = insertOwner($copy_id,$_POST['owner_first_name'],$_POST['owner_last_name'],$_POST['owner_gender'],$_POST['owner_occupation'],$_POST['owner_location']);
	header("Location: edit.php?view=copy&layout=edit&id=".$_GET['id']);
}

function insertOwner($copy_id,$first_name,$last_name,$gender,$occupation,$location)
{
	$sql1 = "INSERT INTO yr15_owner(copy_id,first_name,last_name,gender,occupation,location)values('".$copy_id."','".$first_name."','".$last_name."','".$gender."','".$occupation."','".$location."')";
	$query1=mysql_query($sql1);
	
	
}

function getAgent($copy_id,$role)
{
	$sql = mysql_query("SELECT * FROM yr15_agent WHERE copy_id='".$copy_id."' AND role='".$role."'");
	return $sql;	
}

function getOwner($copy_id)
{
	$sql = mysql_query("SELECT * FROM yr15_owner WHERE copy_id='".$copy_id."'");
	return $sql;	
}


if($_POST['update']!='')

{
	$description = htmlentities(($_POST['description']), ENT_QUOTES);	
	if($recordId!='')
	{	
		$sql="UPDATE ".TABLE." SET almanac_id='".$_POST['almanac_id']."',year='".$_POST['year']."',library_id='".$_POST['library_id']."',callnumber='".$_POST['callnumber']."',notes='".$_POST['notes']."',stamp='".$_POST['stamp']."' WHERE id='".$recordId."' "; 
		$query=mysql_query($sql);
		$id = $_GET['id'];
	}
	else
	{
		$sql = "INSERT INTO ".TABLE."(almanac_id,year,library_id,callnumber,notes,stamp)values('".$_POST['almanac_id']."','".$_POST['year']."','".$_POST['library_id']."','".$_POST['callnumber']."','".$_POST['notes']."','".$_POST['stamp']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
		
		if($id!='' && $id!='0')
		{
			if($_POST['bookseller_first_name']!='' || $_POST['bookseller_corporate_name']!='')
			{
				$sql1 = "INSERT INTO yr15_agent(copy_id,role,first_name,last_name,corporate_name,bookseller_location)values('".$id."','Bookseller','".$_POST['bookseller_first_name']."','".$_POST['bookseller_last_name']."','".$_POST['bookseller_corporate_name']."','".$_POST['bookseller_location']."')";
				$query1=mysql_query($sql1);
			}
		}
		
		if($id!='' && $id!='0')
		{
			if($_POST['owner_first_name']!='')
			{
				$sql1 = "INSERT INTO yr15_owner(copy_id,first_name,last_name,gender,occupation,location)values('".$id."','".$_POST['owner_first_name']."','".$_POST['owner_last_name']."','".$_POST['owner_gender']."','".$_POST['owner_occupation']."','".$_POST['owner_location']."')";
				$query1=mysql_query($sql1);
			}
		}
		
	}
	

	if($query>0)

		{
			$_SESSION['msg']="Record Updated Successfully !";
			if($_POST['update']=="Save and go to image info")
			{
				header("Location: ../Image_info/edit.php?view=image");
			}
			else
			{
				header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);
			}

		}

	else
{
	$_SESSION['msg']="Error in Record Updated !";

	header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);
}
}


//start function for Category dropdown.............................................

function load_category($parent)
{
$sql="SELECT * from yr14_category where parentid='".$parent."' order by id";
$result=mysql_query($sql);
if(!$result || mysql_num_rows($result)<=0)
return 0;
else
return $result;
}

function GetCategory_Dropdown($cat_id,$flag,$parentid)
{
		$res_cat=load_category($cat_id);
		if(mysql_num_rows($res_cat)>0)
		{ 
				$flag++;
				for($j=0;$j<mysql_num_rows($res_cat);$j++)
				{  
						$cat_id1=mysql_result($res_cat,$j,'id');
						$parent_id1=mysql_result($res_cat,$j,'parentid');
						$cat_name1=mysql_result($res_cat,$j,'title'); 
						if($flag!=0)
						     		{ $das="";
									for($k=1;$k<$flag;$k++) { $das .="&nbsp;-&nbsp;"; }
									}
						
						?>
						<option value="<?php echo $cat_id1; ?>" <?php if($parentid==$cat_id1){?>selected="selected"<?php } ?>><?php  echo $das.$cat_name1;?></option>  
						<?php echo GetCategory_Dropdown($cat_id1,$flag);
								
			    } 
				
		}		 
 } 

//End Function .......................................................................................
?>   

 

</div>

<?php include("../footer.php"); ?>

