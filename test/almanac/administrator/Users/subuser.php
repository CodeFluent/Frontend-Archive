<?php 
if($_GET['sub_action']=='delete')
{
	$del = $setting_obj->DELETE_SUB_USER($_GET['suid']);
	$_SESSION['msg']="Record deleted successfully !";
	header("Location: edit.php?view=user&layout=edit&page=subuser&id=".$_GET['id']);
}

if($_GET['sub_action']=='status')
{
	$status = $setting_obj->UPDATE_SUB_USER_STATUS($_GET['suid'],$_GET['status']);
	$_SESSION['msg']="Record Status Updated successfully !";
	header("Location: edit.php?view=user&layout=edit&page=subuser&id=".$_GET['id']);
}


?>

<div class="clear"></div>

<div style="font-size: 16px; font-weight: bold; margin-right: 60px; text-align: right;"><a href=" edit.php?view=user&layout=edit&page=add-user&id=<?=$_GET['id']?>">Add User</a></div>

    <table class="vdDiscription">

<thead>

        <tr class="vdDiscriptionHedings">



            <th class="vdDis01 vdDisText">



            <!--<input name="checkAll" class="vdInput01" id="checkAll" type="checkbox" />-->



            Description</th>



            <th class="vdDis06 vdDisText">Created</th>

            

            <th class="vdDis04 vdDisText">privileges</th>



            <th class="vdDis04 vdDisText">Country</th>



            <th class="vdDis04 vdDisText">Status</th>



            <th class="vdDis05 vdDisText">Delete</th>



        </tr>

</thead>

<tbody>

<?php
$res_subuser = mysql_query("SELECT * FROM yr15_sub_user WHERE userid='".$recordId."'");
while($row_subuser = mysql_fetch_array($res_subuser)) { ?>

<?php 
if($row_subuser["photo"]!='')
$profile_photo = $APP_URL."/Uploads/user/".$row_subuser["photo"];
else
$profile_photo = $APP_URL."/Uploads/user/big_user_icon.png";
?>

        <tr class="vdDiscriptionHedings vdAddpadding">



            <td class="vdDis01">

            <?php /*?><input name="chk[]" class="vdInput01" type="radio" value="<?=$row_subuser['id']?>" /><?php */?>

			<div style="overflow:hidden;">

            <img class="vdinputImg" style="margin-top:6px;" src="<?=$profile_photo?>" width="30" height="auto" alt="" border="0">



            <span class="vdcheckBtext"><a href="edit.php?view=user&layout=edit&page=add-user&id=<?=$_GET['id']?>&suid=<?=$row_subuser['id']?>"><?=$row_subuser['name']." ".$row_subuser['lname']?></a><br><?=$row_subuser['email'];?>
			</span>

			</div>

            </td>



<td class="vdDis06"><span class="vdcheckBtext"><?=date("d M, Y",strtotime($row_subuser['reg_date']))?><br>

            

<span class="vdcheckBtext01"><?=date("G:i",strtotime($row_subuser['reg_date']))?></span></span></td>

<?php
$var = explode("|",$row_subuser["privileges"]);
$privileges='';
for($i=0;$i<sizeof($var);$i++)
{
	if($var[$i]!='')
	$privileges.=$var[$i].", ";
}
$privileges = substr($privileges,0,-2);
?>

<td class="vdDis04" align="center"><strong class="capitalize"><?=$privileges?></strong></td>

<td class="vdDis04" align="center"><?=$row_subuser['country']?></td>

 <td class="vdDis04" align="center"><?php
					if($row_subuser['status']==1) {  ?>
        <a href="edit.php?view=user&layout=edit&page=subuser&id=<?=$_GET['id']?>&sub_action=status&suid=<?=$row_subuser['id']?>&status=0"><img src="../images/enable.png" border="0" alt="Active" /></a>
        <?php } else { ?>
        <a href="edit.php?view=user&layout=edit&page=subuser&id=<?=$_GET['id']?>&sub_action=status&suid=<?=$row_subuser['id']?>&status=1"><img src="../images/disable.png" border="0" alt="De-Active" /></a>
        <?php } ?></td>

<td class="vdDis05" align="center">
      <a href="edit.php?view=user&layout=edit&page=subuser&id=<?=$_GET['id']?>&sub_action=delete&suid=<?=$row_subuser['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}"><img src="../images/icon_del1.png" width="28" height="24" border="0" alt="Delete" /></a> </td>


             



        </tr>



        <?php } ?> </tbody>   



    </table>
