<?php include("../header.php"); 
include_once("../../fckeditor/fckeditor.php") ;
?>

<?php 

if($recordId!='')

{

	$row = mysql_fetch_array($res);

}
?>

<div class="vdDiscription left">

    

    <form name="form" id="form" method="post" action="" enctype="multipart/form-data">

	<input type="hidden" name="recordId" value="<?=$recordId?>">
    <input type="hidden" name="TABLE" value="<?=TABLE?>">
    
      <table width="100%" cellpadding="5" cellspacing="5">
		
        <tr>

        	<td>

            	<div class="txtLabel">Library Name:</div>

                <input type="text" id="library_name" name="library_name" value="<?=$row["library_name"]?>">

             </td>

        </tr>
        
        
        <tr>

        	<td>

            	<div class="txtLabel">Location(city, country):</div>

                <input type="text" id="location" name="location" value="<?=$row["location"]?>" >
             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Library Home Page URL:</div>

                <input type="text" id="library_url" name="library_url" value="<?=$row["library_url"]?>" >
             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Rights:</div>

                <input type="text" id="rights" name="rights" value="<?=$row["rights"]?>" >
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
		$sql="UPDATE ".TABLE." SET library_name='".$_POST['library_name']."',location='".$_POST['location']."',library_url='".$_POST['library_url']."',rights='".$_POST['rights']."' WHERE id='".$recordId."' "; 
		$query=mysql_query($sql);
		$id = $_GET['id'];
	}
	else
	{
		$sql = "INSERT INTO ".TABLE."(library_name,location,library_url,rights)values('".$_POST['library_name']."','".$_POST['location']."','".$_POST['library_url']."','".$_POST['rights']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
	}
	

	if($query>0)

		{

			$_SESSION['msg']="Record Updated Successfully !";

		}

	else

	$_SESSION['msg']="Error in Record Updated !";

	if($_GET['id']!='')
		header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);
	else	
	header("Location: ../Addlibrary/edit.php?view=addlibrary&layout=edit");
	

}
?>   

 

</div>

<?php include("../footer.php"); ?>

