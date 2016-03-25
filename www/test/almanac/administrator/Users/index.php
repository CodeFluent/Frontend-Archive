<?php include("../header.php"); ?>

<div class="clear"></div>

    <table class="vdDiscription">

<thead>

        <tr class="vdDiscriptionHedings">



            <th class="vdDis01 vdDisText">



            <!--<input name="checkAll" class="vdInput01" id="checkAll" type="checkbox" />-->



            Description</th>



            <th class="vdDis06 vdDisText">Created</th>
            
            
            <th class="vdDis04 vdDisText">Status</th>



            <th class="vdDis05 vdDisText">Delete</th>



        </tr>

</thead>

<tbody>

<?php while($row = mysql_fetch_array($res)) { ?>

<?php 
if($row["photo"]!='')
$profile_photo = $SITE_URL."/Uploads/user/".$row["photo"];
else
$profile_photo = $SITE_URL."/Uploads/user/big_user_icon.png";
?>

        <tr class="vdDiscriptionHedings vdAddpadding">



            <td class="vdDis01">

            <input name="chk[]" class="vdInput01" type="checkbox" value="<?=$row['id']?>" />

			<div style="overflow:hidden;">

           <?php /*?> <img class="vdinputImg" style="margin-top:6px;" src="<?=$profile_photo?>" width="50" height="auto" alt="" border="0"><?php */?>



            <span class="vdcheckBtext"><a href="<?=$EDIT_URL?>&page=myprofile&id=<?=$row['id']?>"><?=$row['name']." ".$row['lname']?></a><br><?=$row['email'];?>
			</span>

			</div>

            </td>



<td class="vdDis06"><span class="vdcheckBtext"><?=date("d M, Y",strtotime($row['reg_date']))?><br>
<span class="vdcheckBtext01"><?=date("G:i",strtotime($row['reg_date']))?></span></span></td>



 <td class="vdDis04" align="center"><?php
					if($row['status']==1) {  ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=status&id=<?=$row['id']?>&status=0"><img src="../images/enable.png" border="0" alt="Active" /></a>
        <?php } else { ?>
        <a href="index.php?view=<?=$_GET['view']?>&action=status&id=<?=$row['id']?>&status=1"><img src="../images/disable.png" border="0" alt="De-Active" /></a>
        <?php } ?></td>

<td class="vdDis05" align="center">
      <a href="index.php?view=<?=$_GET['view']?>&action=delete&id=<?=$row['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}"><img src="../images/icon_del1.png" width="28" height="24" border="0" alt="Delete" /></a> </td>


             



        </tr>



        <?php } ?> </tbody>   



    </table>

    


<?php include("../footer.php"); ?>
