<?php include("../header.php"); ?>		                       

<div class="clear"></div>

    <table class="vdDiscription">

<thead>

        <tr class="vdDiscriptionHedings">



            <th class="vdDis01 vdDisText">



            <!--<input name="checkAll" class="vdInput01" id="checkAll" type="checkbox" />-->



            Issue Title</th>



            <th class="vdDis06 vdDisText">Created</th>

           <th class="vdDis04 vdDisText">Almanac Title</th> 
           <th class="vdDis04 vdDisText">Year</th> 

           <th class="vdDis04 vdDisText">Status</th>


	        <th class="vdDis05 vdDisText">Delete</th>



        </tr>

</thead>

<tbody>

        <?php while($row = mysql_fetch_array($res)) { ?>



        <tr class="vdDiscriptionHedings vdAddpadding">



            <td class="vdDis01">

            <input name="chk[]" class="vdInput01" type="checkbox" value="<?=$row['id']?>" />

			<div style="overflow:hidden;">

           


            <span class="vdcheckBtext"><a href="<?=$EDIT_URL?>&id=<?=$row['id']?>"><?=$row['title']?></a>
			</span>

			</div>

            </td>



<td class="vdDis06"><span class="vdcheckBtext"><?=date("d M, Y",strtotime($row['created_date']))?><br>

            

<span class="vdcheckBtext01"><?=date("G:i",strtotime($row['created_date']))?></span></span></td>


<td class="vdDis04" align="center"><span class="vdcheckBtext">
<?php
$sql_get_almanac = mysql_query("SELECT * FROM yr15_almanac WHERE id='".$row['almanac_id']."'");
$row_get_almanac = mysql_fetch_array($sql_get_almanac);
echo $row_get_almanac['title'];
?></span></td>

<td class="vdDis04" align="center"><span class="vdcheckBtext">
<?=$row['year']?></span></td>

<td class="vdDis04" align="center">
<?php if($row['status']==1) {  ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=status&status=0&id=<?=$row['id']?>"><img src="../images/enable.png" border="0" alt="Active" /></a>
        <?php } else { ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=status&status=1&id=<?=$row['id']?>"><img src="../images/disable.png" border="0" alt="De-Active" /></a>
        <?php } ?>
</td>

<td class="vdDis05" align="center">

			
            
             <a href="<?=$INDEX_URL?>&action=delete&id=<?=$row['id']?>&trash=1" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}"><img src="../images/icon_del1.png" width="28" height="24" border="0" alt="Delete" title="Delete" /></a>
            


            </td>



             



        </tr>



        <?php } ?> </tbody>   



    </table>
<?php
function GET_CATEGORY_BYID($id)
{
	$sql=" SELECT * FROM yr14_category where id='".$id."' ";
	$query=mysql_query($sql);
	return $query;
}
?>

<?php include("../footer.php"); ?>