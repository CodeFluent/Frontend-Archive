<?php include("../header.php"); 
include_once("../../fckeditor/fckeditor.php") ;


if($_GET['action']=='delete_agent' && $_GET['agent_id']!='')
{
	$sql_delete = mysql_query("DELETE FROM yr15_agent WHERE id='".$_GET['agent_id']."'");
	header("Location: edit.php?view=issue&layout=edit&id=".$_GET['id']);
}


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
          		<input type="text" id="year" name="year" value="<?=$year?>">
             </td>

        </tr>

        <tr>

        	<td>

            	<div class="txtLabel">Full Title:</div>

                <input type="text" id="title" name="title" value="<?=$row["title"]?>">

             </td>

        </tr>
 
        <tr>

        	<td>

            	<div class="txtLabel">Printer:</div>

                First Name : <input type="text" id="printer_first_name" name="printer_first_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Last Name : <input type="text" id="printer_last_name" name="printer_last_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp; OR &nbsp;&nbsp;&nbsp;&nbsp;
                Corporate Name : <input type="text" id="printer_corporate_name" name="printer_corporate_name" style="width:175px;">
                
                <?php if($_GET['id']!=''){?>
				<input type="submit" name="add_printer" value="Add additional printer"><br /><br />
                <?php $res1 = getAgent($_GET['id'],'Printer'); 
				if(mysql_num_rows($res1)>0){?>
                
                <div class="sepLine"></div>
                
                <table>
                <tr>
                <td width="200"><strong>First Name</strong></td>
                <td width="200"><strong>Last Name</strong></td>
                <td width="200"><strong>Corporate Name</strong></td>
                <td width="200"><strong>Delete</strong></td>
                </tr>
                
                <?php while($row_res1 = mysql_fetch_array($res1)){ ?>
                
                 <tr>
                <td><?=$row_res1['first_name']?></td>
                <td><?=$row_res1['last_name']?></td>
                <td><?=$row_res1['corporate_name']?></td>
                <td><a href="edit.php?view=issue&layout=edit&id=<?=$_GET['id']?>&action=delete_agent&agent_id=<?=$row_res1['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}">Delete</a></td>
                </tr>
                
                <?php } ?>
                
                </table>
                
				<?php }}?>
<div class="sepLine"></div>
             </td>

        </tr>
        
         <tr>

        	<td>

            	<div class="txtLabel">Publisher:</div>

                First Name : <input type="text" id="publisher_first_name" name="publisher_first_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Last Name : <input type="text" id="publisher_last_name" name="publisher_last_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp; OR &nbsp;&nbsp;&nbsp;&nbsp;
                Corporate Name : <input type="text" id="publisher_corporate_name" name="publisher_corporate_name" style="width:175px;">
                
                
                <?php if($_GET['id']!=''){?>
				<input type="submit" name="add_publisher" value="Add additional Publisher"><br /><br />
                <?php $res1 = getAgent($_GET['id'],'Publisher'); 
				if(mysql_num_rows($res1)>0){?>
                <div class="sepLine"></div>
                <table>
                <tr>
                <td width="200"><strong>First Name</strong></td>
                <td width="200"><strong>Last Name</strong></td>
                <td width="200"><strong>Corporate Name</strong></td>
                <td width="200"><strong>Delete</strong></td>
                </tr>
                
                <?php while($row_res1 = mysql_fetch_array($res1)){ ?>
                
                 <tr>
                <td><?=$row_res1['first_name']?></td>
                <td><?=$row_res1['last_name']?></td>
                <td><?=$row_res1['corporate_name']?></td>
                <td><a href="edit.php?view=issue&layout=edit&id=<?=$_GET['id']?>&action=delete_agent&agent_id=<?=$row_res1['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}">Delete</a></td>
                </tr>
                
                <?php } ?>
                
                </table>
                
				<?php }}?>
<div class="sepLine"></div>
             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Author:</div>

                First Name : <input type="text" id="author_first_name" name="author_first_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Last Name : <input type="text" id="author_last_name" name="author_last_name" style="width:175px;">
                &nbsp;&nbsp;&nbsp;&nbsp; OR &nbsp;&nbsp;&nbsp;&nbsp;
                Corporate Name : <input type="text" id="author_corporate_name" name="author_corporate_name" style="width:175px;">
                
                <?php if($_GET['id']!=''){?>
				<input type="submit" name="add_author" value="Add additional Author"><br /><br />
                <?php $res1 = getAgent($_GET['id'],'Author'); 
				if(mysql_num_rows($res1)>0){?>
                
                <div class="sepLine"></div>
                <table>
                <tr>
                <td width="200"><strong>First Name</strong></td>
                <td width="200"><strong>Last Name</strong></td>
                <td width="200"><strong>Corporate Name</strong></td>
                <td width="200"><strong>Delete</strong></td>
                </tr>
                
                <?php while($row_res1 = mysql_fetch_array($res1)){ ?>
                
                 <tr>
                <td><?=$row_res1['first_name']?></td>
                <td><?=$row_res1['last_name']?></td>
                <td><?=$row_res1['corporate_name']?></td>
                <td><a href="edit.php?view=issue&layout=edit&id=<?=$_GET['id']?>&action=delete_agent&agent_id=<?=$row_res1['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}">Delete</a></td>
                </tr>
                
                <?php } ?>
                
                </table>
                
				<?php }}?>
<div class="sepLine"></div>
             </td>

        </tr>
                
        <tr>

        	<td>

            	<div class="txtLabel">Place of publication:</div>

                <input type="text" id="place_of_publication" name="place_of_publication" value="<?=$row["place_of_publication"]?>" >
             </td>

        </tr>
        
                
        <tr>

        	<td>

            	<div class="txtLabel">Region:</div>

                <input type="text" id="region" name="region" value="<?=$row["region"]?>" >
             </td>

        </tr>
        
        <tr>

        	<td>

            	<div class="txtLabel">Price:</div>

                Pounds (l.) : <input type="text" id="price_pounds" name="price_pounds" value="<?=$row["price_pounds"]?>" style="width:125px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Shillings (s.) : <input type="text" id="price_shillings" name="price_shillings" value="<?=$row["price_shillings"]?>" style="width:125px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Pence (d.) : <input type="text" id="price_pence" name="price_pence" value="<?=$row["price_pence"]?>" style="width:125px;">
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

if($_POST['add_printer']!='')
{
	$res = insertAgent($_GET['id'],"Printer",$_POST['printer_first_name'],$_POST['printer_last_name'],$_POST['printer_corporate_name']);
	header("Location: edit.php?view=issue&layout=edit&id=".$_GET['id']);
}

if($_POST['add_publisher']!='')
{
	$res = insertAgent($_GET['id'],"Publisher",$_POST['publisher_first_name'],$_POST['publisher_last_name'],$_POST['publisher_corporate_name']);
	header("Location: edit.php?view=issue&layout=edit&id=".$_GET['id']);
}

if($_POST['add_author']!='')
{
	$res = insertAgent($_GET['id'],"Author",$_POST['author_first_name'],$_POST['author_last_name'],$_POST['author_corporate_name']);
	header("Location: edit.php?view=issue&layout=edit&id=".$_GET['id']);
}

if($_POST['add_editor']!='')
{
	$res = insertAgent($_GET['id'],"Editor",$_POST['editor_first_name'],$_POST['editor_last_name'],$_POST['editor_corporate_name']);
	header("Location: edit.php?view=issue&layout=edit&id=".$_GET['id']);
}


if($_POST['update']!='')

{
	$description = htmlentities(($_POST['description']), ENT_QUOTES);	
	if($recordId!='')
	{	
		$sql="UPDATE ".TABLE." SET almanac_id='".$_POST['almanac_id']."',year='".$_POST['year']."',title='".$_POST['title']."',place_of_publication='".$_POST['place_of_publication']."',format='".$_POST['format']."',region='".$_POST['region']."',price_pounds='".$_POST['price_pounds']."',price_shillings='".$_POST['price_shillings']."',price_pence='".$_POST['price_pence']."' WHERE id='".$recordId."' "; 
		$query=mysql_query($sql);
		$id = $_GET['id'];
	}
	else
	{
		$sql = "INSERT INTO ".TABLE."(almanac_id,year,title,place_of_publication,format,region,price_pounds,price_shillings,price_pence)values('".$_POST['almanac_id']."','".$_POST['year']."','".$_POST['title']."','".$_POST['place_of_publication']."','".$_POST['format']."','".$_POST['region']."','".$_POST['price_pounds']."','".$_POST['price_shillings']."','".$_POST['price_pence']."')";
		$query=mysql_query($sql);
		$id = mysql_insert_id();
		
		if($id!='' && $id!='0')
		{
			if($_POST['printer_first_name']!='' || $_POST['printer_corporate_name']!='')
			{
				$sql1 = "INSERT INTO yr15_agent(issue_id,role,first_name,last_name,corporate_name)values('".$id."','Printer','".$_POST['printer_first_name']."','".$_POST['printer_last_name']."','".$_POST['printer_corporate_name']."')";
				$query1=mysql_query($sql1);
			}
			
			if($_POST['publisher_first_name']!='' || $_POST['publisher_corporate_name']!='')
			{
				$sql2 = "INSERT INTO yr15_agent(issue_id,role,first_name,last_name,corporate_name)values('".$id."','Publisher','".$_POST['publisher_first_name']."','".$_POST['publisher_last_name']."','".$_POST['publisher_corporate_name']."')";
				$query2=mysql_query($sql2);
			}
			
			if($_POST['author_first_name']!='' || $_POST['author_corporate_name']!='')
			{
				$sql3 = "INSERT INTO yr15_agent(issue_id,role,first_name,last_name,corporate_name)values('".$id."','Author','".$_POST['author_first_name']."','".$_POST['author_last_name']."','".$_POST['author_corporate_name']."')";
				$query3=mysql_query($sql3);
			}
			
			if($_POST['editor_first_name']!='' || $_POST['editor_corporate_name']!='')
			{
				$sql4 = "INSERT INTO yr15_agent(issue_id,role,first_name,last_name,corporate_name)values('".$id."','Editor','".$_POST['editor_first_name']."','".$_POST['editor_last_name']."','".$_POST['editor_corporate_name']."')";
				$query4=mysql_query($sql4);
			}
		}
		
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
		header("Location: ../Dataentry/index.php?view=dataentry");

}


function insertAgent($issue_id,$role,$first_name,$last_name,$corporate_name)
{
	$sql1 = "INSERT INTO yr15_agent(issue_id,role,first_name,last_name,corporate_name)values('".$issue_id."','".$role."','".$first_name."','".$last_name."','".$corporate_name."')";
	$query1=mysql_query($sql1);
}

function getAgent($issue_id,$role)
{
	$sql = mysql_query("SELECT * FROM yr15_agent WHERE issue_id='".$issue_id."' AND role='".$role."'");
	return $sql;	
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

