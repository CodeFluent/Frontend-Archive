<?php
include("../header.php");
include("class.php");
$setting_obj = new settings();

$get_profile = $setting_obj->GET_PROFILE($_SESSION['adminid']);
$row = mysql_fetch_array($get_profile);


$layout = $_GET['layout'];

?>
<style>
.submenu{
	 border-bottom: 1px solid #CCCCCC;
    font-size: 14px;
    font-weight: bold;
    margin: 5px;
    padding: 5px;
    text-align: center;
    width: 97%;
}
</style>
<script>
$(document).ready(function(){
$("#form1").validate();
});
$(document).ready(function(){
$("#form2").validate();
});
</script>


<div class="vdVideoCont">
	<div class="vd-Vprop01">
		<img src="<?=$ADMIN_URL?>/images/videoList.png" alt=""><span class="vdListText">Setting<span class="vdListText01 capitalize"><?=$layout?></span></span>
	</div>
									
</div>
<div class="vdDiscription left">

<div class="submenu">
<?php if($layout=='myprofile'){?>My Profile<?php } else { ?>
<a href="index.php?layout=myprofile">My Profile</a><?php } ?>


</div>



<?php 
if($layout=='myprofile')         
{
	include("myprofile.php");
}

if($layout=='subuser')         
{
	include("subuser.php");
}
if($layout=='add-user')         
{
	include("add-user.php");
}
?>                  
          
</div>      	  
        
        
<?php include("../footer.php"); ?>