<?php include("../header.php"); 
include_once("../../fckeditor/fckeditor.php") ;


if($_GET['action']=='delete_content' && $_GET['content_id']!='')
{
	$sql_delete = mysql_query("DELETE FROM yr15_contents_index WHERE id='".$_GET['content_id']."'");
	header("Location: edit.php?view=image&layout=edit&id=".$_GET['id']);
}


if($recordId!='')

{

	$row = mysql_fetch_array($res);
	$almanac_id = $row["almanac_id"];
	$year = $row["year"];
	$library_id = $row['library_id'];
	$callnumber = $row['callnumber'];
	$issue_id = $_SESSION['issue_id'];
	$image_id = $row['id'];
	$filename = $row['filename'];
}
else
{
	$almanac_id = $_SESSION["almanac_id"];
	$year = $_SESSION["year"];
	$issue_id = $_SESSION['issue_id'];
	$library_id = $_SESSION['library_id'];
	$callnumber = $_SESSION['callnumber'];
	$filename = $_SESSION['filename'];
	$digital_format = $_SESSION['digital_format'];
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
            

            	<img src="<?=$filename?>" width="500" height="400" />
               
            

             </td>

        </tr>
        
        
        <tr>

        	<td>

            	<div class="txtLabel">File Name:</div>

                <input type="text" id="filename" name="filename" value="<?=$filename?>">

             </td>

        </tr>
        
        <tr>

        	<td>


            	<div class="txtLabel">Annotation Type?:</div>

                <div style="float:left; width:100px;">Text&nbsp;<input name="annotation_type" <?php if($row['annotation_type']=='Text'){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="Text" /></div>
                
                <div style="float:left; width:100px;">Drawing&nbsp;<input name="annotation_type" <?php if($row['annotation_type']=='Drawing'){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="Drawing" /></div>
                
                <div style="float:left; width:100px;">Mark&nbsp;<input name="annotation_type" <?php if($row['annotation_type']=='Mark'){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="Mark" /></div>

             </td>

        </tr>
        
        <?php if($row['id']==''){ ?>
        <tr>

          <td height="40"><input type="submit" name="update" value="Submit" class="button blue-grd3 submit-btn1">
          </td>

        </tr>
        <?php } ?>
        
        <?php if($row['annotation_type']=='Mark'){ 
		
		$res_mark = mysql_query("SELECT * FROM yr15_annotation_mark WHERE annotation_id='".$row['id']."'");
		$row_mark = mysql_fetch_array($res_mark);
		$mark_id = $row_mark['id'];
		?>
 
        <tr>

        	<td>

            	<div class="txtLabel">Description:</div>

                <textarea name="description"><?=$row_mark['description']?></textarea>

             </td>

        </tr>
        
        <?php } ?>
        
        <?php if($row['annotation_type']=='Text' || $row['annotation_type']=='Drawing'){ 
		
		$res_drawtext = mysql_query("SELECT * FROM yr15_annotation_drawtext WHERE annotation_id='".$row['id']."'");
		$row_drawtext = mysql_fetch_array($res_drawtext);
		$drawtext_id = $row_drawtext['id'];
		$annotation_category = $row_drawtext['annotation_category'];
		
		$var = explode(",",$annotation_category);
		for($x=0; $x<sizeof($var); $x++)
		{
			$catArray[] = $var[$x];
		}
		
		?>
        <tr>

        	<td>

            	<div class="txtLabel">Description/transcription:</div>

                <textarea name="description"><?=$row_drawtext['description']?></textarea>

             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Annotation Category:</div>

               <table>
               <tr>
               	<td width="150">Agriculture&nbsp;<input name="annotation_category[]" <?php if(in_array('Agriculture',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Agriculture" /></td>
                <td width="150">Historical event&nbsp;<input name="annotation_category[]" <?php if(in_array('Historical event',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Historical event" /></td>
                <td width="150">Natural event&nbsp;<input name="annotation_category[]" <?php if(in_array('Natural event',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Natural event" /></td>
                <td width="150">Schedule&nbsp;<input name="annotation_category[]" <?php if(in_array('Schedule',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Schedule" /></td>
               </tr>
               
               <tr>
               	<td>Weather&nbsp;<input name="annotation_category[]" <?php if(in_array('Weather',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Weather" /></td>
                <td>Music&nbsp;<input name="annotation_category[]" <?php if(in_array('Music',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Music" /></td>
                <td>Signature&nbsp;<input name="annotation_category[]" <?php if(in_array('Signature',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Signature" /></td>
                <td>Personal event/info&nbsp;<input name="annotation_category[]" <?php if(in_array('Personal event/info',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Personal event/info" /></td>
               </tr>
               
               <tr>
               	<td>Finances&nbsp;<input name="annotation_category[]" <?php if(in_array('Finances',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Finances" /></td>
                <td>Other calculations&nbsp;<input name="annotation_category[]" <?php if(in_array('Other calculations',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Other calculations" /></td>
 		<td>Other&nbsp;<input name="annotation_category[]" <?php if(in_array('Other',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Other" /></td>
		<td>Unknown&nbsp;<input name="annotation_category[]" <?php if(in_array('Unknown',$catArray)){?>checked="checked"<?php } ?> class="vdInput01" type="checkbox" value="Unknown" /></td>
                <td>&nbsp;</td>
               </tr>
               </table>

             </td>

        </tr>
        
        <tr>

        	<td>


            	<div class="txtLabel">Child Annotator?:</div>

                <div style="float:left; width:100px;">Yes&nbsp;<input name="child_annotator" <?php if($row_drawtext['child_annotator']=='Yes'){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="Yes" /></div>
                
                <div style="float:left; width:100px;">No&nbsp;<input name="child_annotator" <?php if($row_drawtext['child_annotator']=='No'){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="No" /></div>

             </td>

        </tr>
        
        <?php } ?>
        <tr>

          <td height="40"></td>

        </tr>

       <?php if($row['annotation_type']!=''){ ?>
        <tr>

          <td height="40"><input type="submit" name="add_type" value="Submit and add New annotation" class="button blue-grd3 submit-btn1">
          
          <input type="submit" name="add_type" value="Submit without further annotation" class="button blue-grd3 submit-btn1">

          </td>

        </tr>
        <?php } ?>

      </table>

    </form>    

</div>



<?php

$descp=$_POST['description'];

$descp=str_replace ("'","''",$descp);

if($_POST['update']!='')
{
	
	$sql = "INSERT INTO ".TABLE."(almanac_id,year,library_id,callnumber,filename,annotation_type)values('".$_POST['almanac_id']."','".$_POST['year']."','".$_POST['library_id']."','".$_POST['callnumber']."','".$_POST['filename']."','".$_POST['annotation_type']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
		
	
	if($query>0)

		{
			$_SESSION['msg']="Record Updated Successfully !";
		}

	else
		{	

			$_SESSION['msg']="Error in Record Updated !";
		
		}
		
		header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);

}


if($_POST['add_type']!='')

{
	if($row['annotation_type']=='Mark')
	{
		if($mark_id!='')
		{	
			$sql="UPDATE yr15_annotation_mark SET annotation_id='".$_POST['recordId']."',description='".$descp."' WHERE id='".$mark_id."' "; 
			$query=mysql_query($sql);
		}
		else
		{
			$sql = "INSERT INTO yr15_annotation_mark(annotation_id,description)values('".$_POST['recordId']."','".$descp."')";
			$query=mysql_query($sql);
		}
	}
	
	if($row['annotation_type']=='Text' || $row['annotation_type']=='Drawing')
	{
		for($x=0; $x<sizeof($_POST['annotation_category']); $x++)
		{
			$annotation_category .= $_POST['annotation_category'][$x].",";
		}
		$annotation_category = substr($annotation_category,0,-1);
		if($drawtext_id!='')
		{	
			$sql="UPDATE yr15_annotation_drawtext SET annotation_id='".$_POST['recordId']."',description='".$descp."',annotation_category='".$annotation_category."',child_annotator='".$_POST['child_annotator']."' WHERE id='".$drawtext_id."' "; 
			$query=mysql_query($sql);
		}
		else
		{
			$sql = "INSERT INTO yr15_annotation_drawtext(annotation_id,description,annotation_category,child_annotator)values('".$_POST['recordId']."','".$descp."','".$annotation_category."','".$_POST['child_annotator']."')";
			$query=mysql_query($sql);
		}
	}

	if($query>0)

		{
			if($_POST['add_type']=='Submit and add New annotation')
			{
				header("Location: edit.php?view=".$_GET['view']."&layout=edit");
			}
			if($_POST['add_type']=='Submit withour further annotation')
			{
				header("Location: ../Image_info/edit.php?view=image&layout=edit");
			}

			$_SESSION['msg']="Record Updated Successfully !";

		}

	else
		{	

			$_SESSION['msg']="Error in Record Updated !";
		
			header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);
		}

}

?>
 

</div>

<?php include("../footer.php"); ?>

