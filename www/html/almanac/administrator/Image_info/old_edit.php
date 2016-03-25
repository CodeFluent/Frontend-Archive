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

            	<div class="txtLabel">File Name:</div>

                <input type="text" id="filename" name="filename" value="<?=$row['filename']?>">

             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Title:</div>

                <input type="text" id="title" name="title" value="<?=$row['title']?>">

             </td>

        </tr>
        
      <?php /*?>  <tr>

        	<td>

            	<div class="txtLabel">Digital Formate:</div>

                <input type="text" id="digital_format" name="digital_format" value="<?=$row['digital_format']?>">

             </td>

        </tr><?php */?>
        
        <tr>

        	<td>

            	<div class="txtLabel">Digital Formate:</div>
                
                <input type="text" id="digital_format" name="digital_format">

                <?php /*?><input type="file" id="digital_format" name="digital_format">
                <?php if($row['digital_format']!=''){ ?>
					<img src="<?=$ADMIN_URL?>/Uploads/images/<?=$row['digital_format']?>" width="200" height="150" />
                    <input type="hidden" name="imagename" value="<?=$row['digital_format']?>" />
					<?php } */?>

             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Contents of Page:</div>

                Select Description: <select id="content_index" name="content_index" style="width:175px;">
                <option value="">Select Description</option>
                <?php 
				$sql_content = mysql_query("SELECT * FROM yr15_contents");
				while($row_content = mysql_fetch_array($sql_content)){
				?>
                <option value="<?=$row_content['id']?>"><?=$row_content['description']?></option>
                <?php } ?>
                </select>
                 &nbsp;&nbsp;OR&nbsp;&nbsp;
                Add New Description: <input type="text" id="txtcontent_index" name="txtcontent_index" style="width:175px;">
                
                <?php if($_GET['id']!=''){?>
				<input type="submit" name="add_content" value="Add additional content field "><br /><br />
                <?php $res1 = getContent($_GET['id']); 
				if(mysql_num_rows($res1)>0){?>
                
                <div class="sepLine"></div>
                <table>
                <tr>
                <td width="200"><strong>Content Field</strong></td>
                <td width="200"><strong>Delete</strong></td>
                </tr>
                
                <?php while($row_res1 = mysql_fetch_array($res1)){ ?>
                
                 <tr>
                <td><?php 
				$sql_content_index = mysql_query("SELECT * FROM yr15_contents WHERE id='".$row_res1['content_id']."'");
				echo mysql_result($sql_content_index,0,'description');?></td>
                <td><a href="edit.php?view=image&layout=edit&id=<?=$_GET['id']?>&action=delete_content&content_id=<?=$row_res1['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}">Delete</a></td>
                </tr>
                
                <?php } ?>
                
                </table>
                
				<?php }?>
<div class="sepLine"></div>
             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Page Location:</div>

                <input type="text" id="page_location" name="page_location" value="<?=$row['page_location']?>">

             </td>

        </tr>
        
        <tr>

        	<td>


            	<div class="txtLabel">Annotations?:</div>

                <div style="float:left; width:100px;">Yes&nbsp;<input name="annotations" <?php if($row['annotations']=='yes'){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="yes" /></div>
                
                <div style="float:left; width:100px;">No&nbsp;<input name="annotations" <?php if($row['annotations']=='no'){?>checked="checked"<?php } ?> class="vdInput01" type="radio" value="no" /></div>

             </td>

        </tr>
 
        
        <tr>

          <td height="40"></td>

        </tr>

       
        <tr>

          <td height="40"><input type="submit" name="update" value="Submit and add additional image or annotation information" class="button blue-grd3 submit-btn1">
          
          <input type="submit" name="update" value="Submit and return to home page" class="button blue-grd3 submit-btn1">

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

if($_POST['add_content']!='')
{
	if($_POST['content_index']!='')
	{
		$sql1 = "INSERT INTO yr15_contents_index(content_id,image_id)values('".$_POST['content_index']."','".$image_id."')";
		$query1=mysql_query($sql1);
	}
	else
	{
		if($_POST['txtcontent_index']!='')
		{
			$sql1 = "INSERT INTO yr15_contents(description)values('".$_POST['txtcontent_index']."')";
			$query1=mysql_query($sql1);
			$contentid = mysql_insert_id();
			
			$sql2 = "INSERT INTO yr15_contents_index(content_id,image_id)values('".$contentid."','".$image_id."')";
			$query2=mysql_query($sql2);
		}
	}
	header("Location: edit.php?view=image&layout=edit&id=".$_GET['id']);
}

function getContent($image_id)
{
	$sql = mysql_query("SELECT * FROM yr15_contents_index WHERE image_id='".$image_id."'");
	return $sql;	
}


if($_POST['update']!='')

{
	if($_FILES['digital_format']['name']!='')
	{
		$filename = date("dmYHis")."_".$_FILES['digital_format']['name'];
		$temp="../Uploads/images/";
		$tmp=$_FILES['digital_format']['tmp_name'];
		$temp=$temp.basename($filename);
		move_uploaded_file($tmp,$temp);
	}
	else
	$filename = $_POST['imagename'];	
	
	if($recordId!='')
	{	
		$sql="UPDATE ".TABLE." SET almanac_id='".$_POST['almanac_id']."',year='".$_POST['year']."',library_id='".$_POST['library_id']."',callnumber='".$_POST['callnumber']."',filename='".$_POST['filename']."',title='".$_POST['title']."',digital_format='".$filename."',page_location='".$_POST['page_location']."',annotations='".$_POST['annotations']."' WHERE id='".$recordId."' "; 
		$query=mysql_query($sql);
		$id = $_GET['id'];
	}
	else
	{
		$sql = "INSERT INTO ".TABLE."(almanac_id,year,library_id,callnumber,filename,title,digital_format,page_location,annotations)values('".$_POST['almanac_id']."','".$_POST['year']."','".$_POST['library_id']."','".$_POST['callnumber']."','".$_POST['filename']."','".$_POST['title']."','".$filename."','".$_POST['page_location']."','".$_POST['annotations']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
		
		if($id!='' && $id!='0')
		{
			if($_POST['content_index']!='')
			{
				$sql1 = "INSERT INTO yr15_contents_index(content_id,image_id)values('".$_POST['content_index']."','".$id."')";
				$query1=mysql_query($sql1);
			}
			else
			{
				if($_POST['txtcontent_index']!='')
				{
					$sql1 = "INSERT INTO yr15_contents(description)values('".$_POST['txtcontent_index']."')";
					$query1=mysql_query($sql1);
					$contentid = mysql_insert_id();
					
					$sql2 = "INSERT INTO yr15_contents_index(content_id,image_id)values('".$contentid."','".$id."')";
					$query2=mysql_query($sql2);
				}
			}
		}
		
	}
	

	if($query>0)

		{
			$_SESSION['filename'] = $_POST['filename'];
			$_SESSION['digital_format'] = $filename;
			if($_POST['update']=='Submit and add additional image or annotation information')
			{
				if($_POST['annotations']=='yes')
				{
					header("Location: ../Annotation/edit.php?view=annotation&layout=edit");
				}
				else
				{
					header("Location: edit.php?view=".$_GET['view']."&layout=edit");
				}
			}
			if($_POST['update']=='Submit and return to home page')
			{
				header("Location: ../Dataentry/index.php?view=dataentry");
			}

			$_SESSION['msg']="Record Updated Successfully !";

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

