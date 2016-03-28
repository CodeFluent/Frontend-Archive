<?php

if($_SESSION['adminid']==''){
	$return_url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	header("Location: ../index.php?return=".$return_url);
}

$adminId=$_SESSION['adminid'];

$privileges = $_SESSION['privileges'];
$subadminid=$_SESSION['subadminid'];

$view = $_GET['view'];

// Sub User Url Validaton ............................

if (in_array($view, $privileges) || $subadminid=='') {
	// exit
}
else
{
	if (in_array("user", $privileges))
		header("Location: ../Users/index.php?view=user");
	elseif (in_array("pages", $privileges))
		header("Location: ../Pages/index.php?view=page");	
	elseif (in_array("almanac", $privileges))
		header("Location: ../Almanac/index.php?view=almanac");		
}

//....................................................

include("define.php");
include("common-class.php");


$recordId = $_GET['id'];
$field = $_GET['field'];
$search = $_GET['search'];
$status = $_GET['status'];
$option = $_GET['option'];
$optionid = $_GET['optionid'];

if($option!=''){
	$INDEX_URL = "index.php?view=".$view."&option=".$option."&optionid=".$optionid;
	$EDIT_URL = "edit.php?view=".$view."&layout=edit&option=".$option."&optionid=".$optionid;
} else {
	$INDEX_URL = "index.php?view=".$view;
	$EDIT_URL = "edit.php?view=".$view."&layout=edit";
}

$common_obj = new common();

$res = $common_obj->GET_RECORD($recordId,$field,$search,$view); 

if($_GET['action']=='delete')
{
$del = $common_obj->DELETE_RECORD($recordId);
$_SESSION['msg']="Record deleted successfully !";
header("Location: index.php?view=".$_GET['view']);
}

if($_GET['action']=='status')
{
$status = $common_obj->UPDATE_RECORD_STATUS($recordId,$status);
$_SESSION['msg']="Record Status Updated successfully !";
header("Location: index.php?view=".$_GET['view']);
}
?>