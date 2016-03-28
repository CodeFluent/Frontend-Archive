<?php include("../header.php"); ?>		                       

<div class="clear"></div>

    <div class="vdDiscription left">

    

    <form name="form" id="form" method="post" action="" enctype="multipart/form-data">

	<input type="hidden" name="recordId" value="<?=$recordId?>">
    <input type="hidden" name="TABLE" value="<?=TABLE?>">
    
    <?php if($_GET['found']=="no"){ ?>
    
    <table width="100%" cellpadding="5" cellspacing="5">
		
        <tr>

        	<td align="center">
            <h1>No information found. Add new issue?</h1><br>

          		<a href="index.php?view=dataentry"><h2>Back</h2></a><br>
                <a href="../Issue/edit.php?view=issue&layout=edit"><h2>Add new issue</h2></a>

             </td>

        </tr>

      </table>
    
    <?php } elseif($_GET['found']=="yes"){ ?>
    
    
    <div align="center"><a href="index.php?view=dataentry"><h2>Back</h2></a></div>
          	
    
    
      <table class="vdDiscription">

<thead>

 

        <tr class="vdDiscriptionHedings">



          
           <th class="vdDis04 vdDisText">Almanac Title</th> 
           <th class="vdDis04 vdDisText">Year</th> 
           
           <th class="vdDis04 vdDisText">Library</th> 
           
           <th class="vdDis04 vdDisText">Call Number</th> 

           <th class="vdDis04 vdDisText">&nbsp;</th>


	       



        </tr>

</thead>

<tbody>
		
        
        
        <?php 
		
		$res_issue = mysql_query("SELECT * FROM yr15_issue WHERE almanac_id='".$_SESSION['almanac_id']."' and year='".$_SESSION['year']."'");
		
		while($row_issue = mysql_fetch_array($res_issue)) { ?>



        <tr class="vdDiscriptionHedings vdAddpadding">



            
<td class="vdDis04" align="center"><span class="vdcheckBtext">
<?php
$sql_get_almanac = mysql_query("SELECT * FROM yr15_almanac WHERE id='".$row_issue['almanac_id']."'");
$row_get_almanac = mysql_fetch_array($sql_get_almanac);
echo $row_get_almanac['title'];
?></span></td>

<td class="vdDis04" align="center"><span class="vdcheckBtext">
<?=$row_issue['year']?></span></td>

<td class="vdDis04" align="center"><span class="vdcheckBtext">
<?php
$sql_get_library = mysql_query("SELECT * FROM yr15_addlibrary WHERE almanac_id='".$_SESSION['almanac_id']."' and year='".$_SESSION['year']."'");
$row_get_library = mysql_fetch_array($sql_get_library);

?>
<input type="hidden" name="library_id" value="<?=$row_get_library['library_id']?>">
<?php

$sql_get_library_name = mysql_query("SELECT * FROM yr15_library WHERE id='".$row_get_library['library_id']."'");
$row_get_library_name = mysql_fetch_array($sql_get_library_name);

echo $row_get_library_name['library_name'];
?></span></td>

<td class="vdDis04" align="center"><span class="vdcheckBtext">
<?php
$sql_get_callnumber = mysql_query("SELECT * FROM yr15_callnumber WHERE almanac_id='".$_SESSION['almanac_id']."' and year='".$_SESSION['year']."'");
$row_get_callnumber = mysql_fetch_array($sql_get_callnumber);
echo $row_get_callnumber['callnumber'];
?>
<input type="hidden" name="callnumber" value="<?=$row_get_callnumber['callnumber']?>">
</span></td>

<td class="vdDis04" align="center">
<input name="chk" class="vdInput01" type="radio" value="<?=$row_issue['id']?>" /></td>

        </tr>



        <?php } ?> 
        
        <tr align="center">
        <td colspan="5"> &nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        
        <tr align="center">
        <td colspan="5">
        <input class="button blue-grd3 submit-btn1" type="submit" value="Submit" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="button blue-grd3 submit-btn1" type="submit" value="Add New Copy" name="submit"></td>
        </tr>
        
       
        
        
        </tbody>   



    </table>
    
    <?php
	if($_POST['submit']=="Submit")
	{
		$issue_id = $_POST['chk'];
		$_SESSION['issue_id'] = $issue_id;
		$_SESSION['library_id'] = $_POST['library_id'];
		$_SESSION['callnumber'] = $_POST['callnumber'];
		
		if($issue_id!='')
		{
			header("Location: ../Copy/edit.php?view=copy&layout=edit");
		}
		else
		{
			$_SESSION['msg']="Please Select Issue.";
			header("Location: index.php?view=".$_GET['view']."&found=yes");
		}
	}
	
	if($_POST['submit']=="Add New Copy")
	{
		$issue_id = $_POST['chk'];
		$_SESSION['issue_id'] = $issue_id;
		
			header("Location: ../Addlibrary/edit.php?view=addlibrary&layout=edit");
		
	}
	?>
    
    
    
    <?php }else {?>
    
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
                    <option value="<?=$row_get_almanac['id']?>"><?=$row_get_almanac['title']?></option>
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
                    <option value="<?=$i?>"><?=$i?></option>
                    <?php
				}
				?>
                </select>

             </td>

        </tr>




        	
        <tr>

          <td height="40"><input type="submit" name="update" value="Save" class="button blue-grd3 submit-btn1">

          </td>

        </tr>

      </table>
      
	<?php } ?>
    </form>    

</div>

<?php



if($_POST['update']!='')

{
	$_SESSION['almanac_id'] = $_POST['almanac_id'];
	$_SESSION['year'] = $_POST['year'];
	
	$sql=" SELECT * FROM yr15_issue where almanac_id='".$_POST['almanac_id']."' and year='".$_POST['year']."'";
	$query=mysql_query($sql);
	if(mysql_num_rows($query)<=0)
	{
		//$_SESSION['msg']="No information found. Add new issue?";
		header("Location: index.php?view=".$_GET['view']."&found=no");
	}
	else
	{
		header("Location: index.php?view=".$_GET['view']."&found=yes");
	}
}

?>   
<?php
function GET_CATEGORY_BYID($id)
{
	$sql=" SELECT * FROM yr14_category where id='".$id."' ";
	$query=mysql_query($sql);
	return $query;
}
?>

<?php include("../footer.php"); ?>