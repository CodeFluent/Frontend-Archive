<?php include("../header.php"); 
include_once("../../fckeditor/fckeditor.php") ;
?>

<?php 

if($recordId!='')

{

	$row = mysql_fetch_array($res);
	$almanac_id = $row["almanac_id"];
	$year = $row["year"];
	$library_id = $row['library_id'];

}
else
{
	$almanac_id = $_SESSION["almanac_id"];
	$year = $_SESSION["year"];
	$issue_id = $_SESSION['issue_id'];
	$library_id = $_SESSION['library_id'];
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
                <?php 
				$sql1="Select * from yr15_library where id='".$library_id."'";
				$res1=mysql_query($sql1);
				$lib_id=mysql_result($res1,0,'id');
				$lib_name=mysql_result($res1,0,'library_name');
				?>
                <input type="text" name="library_name" value="<?=$lib_name?>" />
                <input type="hidden" name="library_id" value="<?=$library_id?>" />

             </td>

        </tr>
        
         <tr>

        	<td>

            	<div class="txtLabel">Call Number:</div>
                
                <input type="text" name="callnumber" value="<?=$row['callnumber']?>" />

                

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

<script>
function show_library(almanac_id)
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



if($_POST['update']!='')

{
	$description = htmlentities(($_POST['description']), ENT_QUOTES);	
	if($recordId!='')
	{	
		$sql="UPDATE ".TABLE." SET almanac_id='".$_POST['almanac_id']."',year='".$_POST['year']."',library_id='".$_POST['library_id']."',callnumber='".$_POST['callnumber']."' WHERE id='".$recordId."' "; 
		$query=mysql_query($sql);
		$id = $_GET['id'];
	}
	else
	{
		$sql = "INSERT INTO ".TABLE."(almanac_id,year,library_id,callnumber)values('".$_POST['almanac_id']."','".$_POST['year']."','".$_POST['library_id']."','".$_POST['callnumber']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
	}
	

	if($query>0)

		{
			$_SESSION['callnumber'] = $_POST['callnumber'];

			$_SESSION['msg']="Record Updated Successfully !";

		}

	else

	$_SESSION['msg']="Error in Record Updated !";
	
	if($_GET['id']!='')
		header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);
	else
		header("Location: ../Copy/edit.php?view=copy&layout=edit");

}
?>   

 

</div>

<?php include("../footer.php"); ?>

