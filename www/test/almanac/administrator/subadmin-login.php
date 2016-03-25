<?php
include("../config.php");

$APP_URL=$SITE_URL."/app";
$ADMIN_URL=$SITE_URL."/administrator";

if($_GET['action']=='logout')
{
	$_SESSION['adminid']="";
	session_destroy();
	header("Location: index.php");
}
if($_SESSION['adminid']!=''){
	header("Location: Dashboard/");
}

 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<link rel="shortcut icon" href="http://vmctechnology.com/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://vmctechnology.com/images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" type="text/css" href="<?php echo $ADMIN_URL; ?>/css/skeleton.css" media="screen" /><!--Main skeleton style sheet-->
<link rel="stylesheet" type="text/css" href="<?php echo $ADMIN_URL; ?>/css/main-style.css" media="screen" /><!--Main CSS style sheet-->
<link rel="stylesheet" type="text/css" href="<?php echo $ADMIN_URL; ?>/css/form-element-style.css" media="screen" /> <!--CSS sheet for Form elements style-->
<script language="javascript" type="text/javascript" src="<?php echo $ADMIN_URL; ?>/js/jquery-1.7.2.js"></script>
<!--[if lt IE 9]>
	<script language="javascript" type="text/javascript" src="js/html5.js" ></script>
    <link rel="stylesheet" type="text/css" href="css/html5reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/support-style-ie78.css" media="screen" />
<![endif]-->
<title>Welcome to control panel</title>

<style>
input[type="text"],input[type="password"]{margin:0 !important; border: 1px solid #999999; float: left; padding: 0 5px;width:237px; height:30px; font-size:16px;}
.blue2 {background-color: #3681BE;}
.indexHead{background: none repeat scroll 0 0 #00223D; border-radius: 10px 10px 0 0; height: 70px; width: 100%;}
.error-msg-index{background-color: #DFF0D8; border-color: #D6E9C6; border-radius: 3px; color: #F00; font-weight: bold; margin: 5px 22px; padding: 10px; width: 22%;}
</style>

</head>
<body class="blue2">
<div class="vd-wrapper">
		<div class="vd-main">
			<div class="vd-topBlueHead">
				
                
<div style="margin:200px 0px;" align="center">
<?php if($_SESSION['msg']!='') { ?>    
<div class="error-msg-index"><?php echo $_SESSION['msg']; ?><?php unset($_SESSION['msg']); ?></div>
<?php } ?>

<div style="width:275px; height:225px; border:3px #F5F5F5 solid; background-color:#F5F5F5; border-radius:7px;">

<div class="indexHead">
<a href="#"><img class="vd-logoProp" src="<?=$SITE_URL?>/images/vmc-logo.png" alt=""></a>
</div>
        
<form name="loginform" method="post" action="">
<table width="260" border="0" cellpadding="5" cellspacing="5" align="center" style="color:#1B1E1F">
  <tr>
    <td><strong>Email</strong><br><input name="uname" type="text" /></td>
  </tr>
  <tr>
    <td><strong>Password</strong><br><input name="upass" type="password" /></td>
  </tr>
  
  <tr>
   
    <td><input type="submit" class="button" name="submit" value="Login" /></td>
  </tr>
  
</table>
</form>
<a href="<?=$ADMIN_URL?>/index.php" style="float:left; color:#fff; font-weight:bold;">Back</a>

 </div> 
 
        </div>
        
            </div>
        </div>
    </div>
                 	
</body>
</html>
<?php 
$return_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
$var = explode("return=",$return_url);

if($_POST['submit']!='')
{
	define("SUB_USER_TABLE",$PREFIX."sub_user");
	$sql="Select * from ".SUB_USER_TABLE." where email='".$_REQUEST['uname']."' And password='".$_REQUEST['upass']."' and status=1";
	
	$result=mysql_query($sql);
	if((!$result) || (mysql_num_rows($result)<=0))
	{
		$_SESSION['msg']= "Please Enter Correct UserName or Password !";
		if($_GET['return']!='')
			header("Location: subadmin-login.php?return=".$_GET['return']);
		else	
			header("Location: subadmin-login.php");
	}
	else
	{
			$name=mysql_result($result,0,'name');
			$email=mysql_result($result,0,'email');
			$id=mysql_result($result,0,'id'); 
			$userid=mysql_result($result,0,'userid'); 
			$privilege=mysql_result($result,0,'privileges'); 
			$photo=mysql_result($result,0,'photo'); 
			
			$var = explode("|",$privilege);
			for($i=0;$i<sizeof($var);$i++)
			{
				if($var[$i]!='')
				$privileges[]=$var[$i];
			}
			
			$_SESSION['privileges']=$privileges;
			$_SESSION['subadminid']=$id;
			$_SESSION['adminid']=$userid;
			$_SESSION['name']=$name;
			$_SESSION['email']=$email;
			$_SESSION['photo']=$photo;
			
			if($_GET['return']!='')
			{
				?><script>window.location = "<?=$var[1]?>"; </script><?php
			}
			else
				header("Location: Users/index.php?view=user");
	}
}
?>