<?php include("../header.php"); ?>

<?php
include("class.php");

$page = $_GET['page'];

$setting_obj = new settings();

?>

<style>
input[type="text"], input[type="password"] {
    height: 24px;
    padding-left: 5px;
    width: 316px;
}

select{
	height: 30px;
    width: 323px;
}
textarea {
    height: 70px;
    width: 319px;
	font-size: 15px;
    outline: medium none;
    padding: 10px;
    resize: none;
    text-indent: 0;
}
.profileHR{
	background-color: #D3D3D3;
    border: 0 none;
    color: #D3D3D3;
    height: 1px;
    margin: 40px 0;}

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

<?php 
if($_GET['id']!=''){
$row = mysql_fetch_array($res); } ?>

<div class="vdDiscription">


    
<?php 
if($page=='myprofile')         
{
	include("myprofile.php");
}
else
{
	header("Location: edit.php?view=user&layout=edit&page=myprofile&id=".$recordId);
}
?>         
</div>


<?php include("../footer.php"); ?>
