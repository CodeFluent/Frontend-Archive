<?php 
if($_GET['sub_action']=='delete')
{
	$del = $setting_obj->DELETE_EMAIL_ADDRESS($_GET['suid']);
	$_SESSION['msg']="Record deleted successfully !";
	header("Location: edit.php?view=user&layout=edit&page=email-addresses&id=".$_GET['id']);
}

if($_GET['sub_action']=='status')
{
	$status = $setting_obj->UPDATE_EMAIL_ADDRESS_STATUS($_GET['suid'],$_GET['status']);
	$_SESSION['msg']="Record Status Updated successfully !";
	header("Location: edit.php?view=user&layout=edit&page=email-addresses&id=".$_GET['id']);
}


?>

<div class="clear"></div>

   <table class="vdDiscription">

<thead>

        <tr class="vdDiscriptionHedings">



            <th class="vdDis01 vdDisText"> Description</th>



            <!--<input name="checkAll" class="vdInput01" id="checkAll" type="checkbox" />-->


            <th class="vdDis04 vdDisText">Status</th>



            <th class="vdDis05 vdDisText">Delete</th>



        </tr>

</thead>

<tbody>

<?php
$res_subuser = mysql_query("SELECT * FROM yr15_email_from_address WHERE userid='".$recordId."'");
while($row_subuser = mysql_fetch_array($res_subuser)) { ?>


        <tr class="vdDiscriptionHedings vdAddpadding">



            <td class="vdDis01">

           
            <span class="vdcheckBtext"><?=$row_subuser['email_address'];?>
			</span>

			</div>

            </td>



 <td class="vdDis04" align="center"><?php
					if($row_subuser['status']==1) {  ?>
        <a href="edit.php?view=user&layout=edit&page=email-addresses&id=<?=$_GET['id']?>&sub_action=status&suid=<?=$row_subuser['id']?>&status=0" style="color:green; font-size: 14px; font-weight: bold;">Verified</a>
        <?php } else { ?>
        <a href="edit.php?view=user&layout=edit&page=email-addresses&id=<?=$_GET['id']?>&sub_action=status&suid=<?=$row_subuser['id']?>&status=1" style="color:red; font-size: 14px; font-weight: bold;">Unverified</a>
        <?php } ?></td>

<td class="vdDis05" align="center">
      <a href="edit.php?view=user&layout=edit&page=email-addresses&id=<?=$_GET['id']?>&sub_action=delete&suid=<?=$row_subuser['id']?>" onClick="if(!confirm('Are you sure, You want delete this record?')){return false;}"><img src="../images/icon_del1.png" width="28" height="24" border="0" alt="Delete" /></a> </td>


             



        </tr>



        <?php } ?> </tbody>   



    </table>
