<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = "../app/Uploads/".$_POST['fileFolder']."/"; // Relative to the root

if($_POST['fileFolder']=='images')
	$fileTypes = array('jpg','jpeg','gif','png');
if($_POST['fileFolder']=='videos')
	$fileTypes = array('mp4','mpg','mov','avi','flv','mpeg','wmv','m4v');	
if($_POST['fileFolder']=='attechments')
	$fileTypes = array('mp3','zip','pdf','doc','docx','xls','xlsx','ppt','pps','pptx','ppts','key','ics');	
	
$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $targetFolder;
	
	$fileName = $verifyToken . "-Y-" . $_FILES['Filedata']['name'];
	
	$fileName = str_replace( " ", "_", $fileName );
	
	$targetFile = rtrim($targetPath,'/') . '/' . $fileName;
	
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo $fileName;
	} else {
		echo 'Invalid file type.';
	}
}
?>