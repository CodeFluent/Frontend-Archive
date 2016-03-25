<?php include("../header.php"); 
include_once("../../fckeditor/fckeditor.php") ;
?>

<?php 

if($recordId!='')

{

	$row = mysql_fetch_array($res);
	$almanac_id = $row["almanac_id"];
	$year = $row["year"];

}
else
{
	$almanac_id = $_SESSION["almanac_id"];
	$year = $_SESSION["year"];
}
?>


<div class="vdDiscription left">

    

    <form name="form" id="form" method="post" action="" enctype="multipart/form-data">

	<input type="hidden" name="recordId" value="<?=$recordId?>">
    <input type="hidden" name="TABLE" value="<?=TABLE?>">
    
      <table width="100%" cellpadding="5" cellspacing="5">
		
          <tr>

        	<td>

          		<div class="txtLabel">Almanac Title:</div>

          		<select name="almanac_id">
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

          		<select name="year">
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

                <select name="library_id">
                <option value="">---- Select ----</option>
                <?php
				$sql_get_library = mysql_query("SELECT * FROM yr15_library WHERE status=1");
				while($row_get_library = mysql_fetch_array($sql_get_library))
				{
					?>
                    <option value="<?=$row_get_library['id']?>" <?php if($row_get_library['id']==$row["library_id"]){?>selected="selected"<?php } ?>><?=$row_get_library['library_name']?></option>
                    <?php
				}
				?>
                </select><br /><br />
<div><a href="../Library/edit.php?view=library&layout=edit">Add New Library</a></div>
             </td>

        </tr>
        
        
        
        <tr>

          <td height="40"></td>

        </tr>

       
        <tr>

          <td height="40"><input type="submit" name="update" value="Save" class="button blue-grd3 submit-btn1">

          </td>

        </tr>

      </table>

    </form>    

</div>

<?php



if($_POST['update']!='')

{
	$description = htmlentities(($_POST['description']), ENT_QUOTES);	
	
	if($recordId!='')
	{	
		$sql="UPDATE ".TABLE." SET almanac_id='".$_POST['almanac_id']."',year='".$_POST['year']."',library_id='".$_POST['library_id']."' WHERE id='".$recordId."' "; 
		$query=mysql_query($sql);
		$id = $_GET['id'];
	}
	else
	{
		$sql = "INSERT INTO ".TABLE."(almanac_id,year,library_id)values('".$_POST['almanac_id']."','".$_POST['year']."','".$_POST['library_id']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
	}
	

	if($query>0)

		{
			$_SESSION['library_id'] = $_POST['library_id'];

			$_SESSION['msg']="Record Updated Successfully !";

		}

	else

	$_SESSION['msg']="Error in Record Updated !";
	
	if($_GET['id']!='')
		header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);
	else	
		header("Location: ../Callnumber/edit.php?view=callnumber&layout=edit");

}
?>   

 

</div>

<?php include("../footer.php"); ?>

