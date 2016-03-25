<?php
error_reporting(0);
ob_start();
session_start();

//$link = mysql_connect('localhost', 'root', 'SIFtemp@92');
//if (!$link) {
  //  die('Could not connect: ' . mysql_error());
//}
//echo 'Connected successfully';
//mysql_close($link);



mysql_connect("localhost","root","SIFsql");
mysql_select_db("almanac");
//$SITE_URL = "localhost/almanac";
$SITE_URL = "http://sifarchive.cloudapp.net/almanac";



$PREFIX = "yr15_";
?>
