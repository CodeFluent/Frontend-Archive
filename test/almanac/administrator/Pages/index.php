<?php include("../header.php"); ?>		                       

<?php
if($_GET['action']=='header')
{
	$sql = "UPDATE yr15_page SET header='".$_GET['header']."' WHERE id='".$_GET['id']."'";
	$query = mysql_query($sql);
	header("Location: ".$INDEX_URL);
}
if($_GET['action']=='footer')
{
	$sql = "UPDATE yr15_page SET footer='".$_GET['footer']."' WHERE id='".$_GET['id']."'";
	$query = mysql_query($sql);
	header("Location: ".$INDEX_URL);
}
?>
<div class="clear"></div>

    <table class="vdDiscription">

<thead>

        <tr class="vdDiscriptionHedings">



            <th class="vdDis01 vdDisText">



            <!--<input name="checkAll" class="vdInput01" id="checkAll" type="checkbox" />-->



            Tital</th>



            <th class="vdDis06 vdDisText">Created</th>

            

            <th class="vdDis04 vdDisText">Parent</th>



            <th class="vdDis04 vdDisText">Header</th>



            <th class="vdDis04 vdDisText">Footer</th>



            <th class="vdDis05 vdDisText">Delete</th>



        </tr>

</thead>

<tbody>

        <?php while($row = mysql_fetch_array($res)) { ?>



        <tr class="vdDiscriptionHedings vdAddpadding">



            <td class="vdDis01">

            <input name="chk[]" class="vdInput01" type="radio" value="<?=$row['id']?>" />

			<div style="overflow:hidden;">

            <img class="vdinputImg" style="margin-top:6px;" src="<?=$APP_URL?>/images/leftEmail.png" width="22" height="auto" alt="" border="0">



            <span class="vdcheckBtext"><a href="<?=$EDIT_URL?>&id=<?=$row['id']?>"><?=$row['title']?></a>
			</span>

			</div>

            </td>



<td class="vdDis06"><span class="vdcheckBtext"><?=date("d M, Y",strtotime($row['created_date']))?><br>

            

<span class="vdcheckBtext01"><?=date("G:i",strtotime($row['created_date']))?></span></span></td>



<td class="vdDis04" align="center">
<?php
if($row['parentid']!=0) { 
					$res_parent=GET_PAGE_BYID($row['parentid']);
					$row_parent=mysql_fetch_array($res_parent);
					$parent=$row_parent['title'];
					 } else { $parent="None"; }
                    echo $parent;?>
</td>

<td class="vdDis04" align="center">
<?php if($row['header']==1) {  ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=header&id=<?=$row['id']?>&header=0"><img src="../images/enable.png" border="0" alt="Active" /></a>
        <?php } else { ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=header&id=<?=$row['id']?>&header=1"><img src="../images/disable.png" border="0" alt="De-Active" /></a>
        <?php } ?>
</td>

<td class="vdDis04" align="center">
<?php if($row['footer']==1) {  ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=footer&id=<?=$row['id']?>&footer=0"><img src="../images/enable.png" border="0" alt="Active" /></a>
        <?php } else { ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=footer&id=<?=$row['id']?>&footer=1"><img src="../images/disable.png" border="0" alt="De-Active" /></a>
        <?php } ?>
</td>

<td class="vdDis05" align="center">

			<?php if($_GET['status']=='0'){ ?>
            
            <a href="<?=$INDEX_URL?>&action=status&status=1&id=<?=$row['id']?>&trash=1" onClick="if(!confirm('Are you sure, You want Restore this record?')){return false;}"><img src="../images/Share.png" width="28" height="24" border="0" alt="Restore" title="Restore" /></a>
            
             <a href="<?=$INDEX_URL?>&action=delete&id=<?=$row['id']?>&trash=1" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}"><img src="../images/icon_del1.png" width="28" height="24" border="0" alt="Delete" title="Delete" /></a>
            
            <?php } else {?>
            
               <a href="<?=$INDEX_URL?>&action=status&status=0&id=<?=$row['id']?>" onClick="if(!confirm('Are you sure, move to trash this record?')){return false;}"><img src="../images/icon_del1.png" width="28" height="24" border="0" alt="Delete" /></a>
			<?php } ?>


            </td>



             



        </tr>



        <?php } ?> </tbody>   



    </table>
<?php
function GET_PAGE_BYID($id)
{
	$sql=" SELECT * FROM yr15_page where id='".$id."' ";
	$query=mysql_query($sql);
	return $query;
}
?>

<?php include("../footer.php"); ?>