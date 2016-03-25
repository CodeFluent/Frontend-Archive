<?php
error_reporting(0);
ob_start();
session_start();

mysql_connect("localhost","root","");
mysql_select_db("almanac");
$SITE_URL = "http://localhost/almanac";




$PREFIX = "yr15_";
?>