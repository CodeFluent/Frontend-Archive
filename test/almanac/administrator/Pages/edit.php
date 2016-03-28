<?php include("../header.php"); ?>

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

            	<div class="txtLabel">Parent:</div>

               			<select name="parentid" id="parentid">
                        <option value="0">Select Parent</option>
                        <?php echo GetCategory_Dropdown(0,0,$row["parentid"]); ?>
                        </select>

             </td>

        </tr>

		<tr>

        	<td>

          		<div class="txtLabel">Page Title:</div>

          		<input type="text" name="title" id="title" class="required" value="<?=$row["title"]?>" />

             </td>

        </tr>

        <tr>

        	<td>

            	<div class="txtLabel">Page Heading:</div>

                <input type="text" id="heading" name="heading" value="<?=$row["heading"]?>">

             </td>

        </tr>

        <tr>

        	<td valign="top" height="900">


            <div id="mce_holder" style="width:675px;">

          		<textarea class="ckeditor" name="description" id="description" rows="5" cols="30"><?=$row["description"]?></textarea>

            </div>    

                <style>

				.cke_reset{width: 650px !important; min-height: 650px !important;}

				</style>

                

             </td>

        </tr>
		
        <tr>

        	<td>

            	<div class="txtLabel">Set Order:</div>

                <input type="text" id="show_order" name="show_order" value="<?=$row["show_order"]?>" style="width:60px;">

             </td>

        </tr>
        	
        <tr>

          <td height="40">
          	<input name="header" type="checkbox" value="1" <?php if($row["header"]==1){ ?>checked<?php } ?>> Set Menu on Header<br>
			<input name="footer" type="checkbox" value="1" <?php if($row["footer"]==1){ ?>checked<?php } ?>> Set Menu on Footer
          </td>

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
		$sql="UPDATE ".TABLE." SET title='".$_POST['title']."',heading='".$_POST['heading']."',description='".$description."',header='".$_POST['header']."',footer='".$_POST['footer']."',parentid='".$_POST['parentid']."',show_order='".$_POST['show_order']."' WHERE id='".$recordId."' "; 
		$query=mysql_query($sql);
		$id = $_GET['id'];
	}
	else
	{
		$sql = "INSERT INTO ".TABLE."(title,heading,description,header,footer,parentid,show_order)values('".$_POST['title']."','".$_POST['heading']."','".$description."','".$_POST['header']."','".$_POST['footer']."','".$_POST['parentid']."','".$_POST['show_order']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
	}
	

	if($query>0)

		{

			$_SESSION['msg']="Record Updated Successfully !";

		}

	else

	$_SESSION['msg']="Error in Record Updated !";

	header("Location: edit.php?view=".$_GET['view']."&layout=edit&id=".$id);

}

//start function for Category dropdown.............................................

function load_category($parent)
{
$sql="SELECT * from yr15_page where parentid='".$parent."' order by id";
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

