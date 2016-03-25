<?php
include("../../config.php"); 

$ADMIN_URL=$SITE_URL."/administrator";

include("action.php");

$sql_admin_info = "SELECT * FROM yr15_user WHERE id='".$_SESSION['adminid']."'";
$query_admin_info = mysql_query($sql_admin_info);
$row_admin_info = mysql_fetch_array($query_admin_info);

?>
<!DOCTYPE html>
<html>
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width; initial-scale=1.0">
<meta charset="UTF-8" />

<link rel="shortcut icon" href="<?=$SITE_URL?>/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?=$SITE_URL?>/images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" type="text/css" href="<?=$ADMIN_URL?>/css/main-style.css" media="screen" /><!--Main CSS style sheet-->
<link rel="stylesheet" type="text/css" href="<?=$ADMIN_URL?>/css/skeleton.css" media="screen" /><!--skelton style sheet-->
<link rel="stylesheet" type="text/css" href="<?=$ADMIN_URL?>/css/form-element-style.css" media="screen" /> <!--CSS sheet for Form elements style-->

<link rel="stylesheet" type="text/css" href="<?=$ADMIN_URL?>/css/default.css" />
		<!--<link rel="stylesheet" type="text/css" href="css/component.css" />-->
<script language="javascript" type="text/javascript" src="<?=$ADMIN_URL?>/js/jquery-1.7.2.js"></script>
<script language="javascript" type="text/javascript" src="<?=$ADMIN_URL?>/js/jquery.validate.js"></script>
<script src="<?=$ADMIN_URL?>/js/modernizr.custom.js"></script>

<script type="text/javascript" src="<?=$SITE_URL?>/ckeditor/ckeditor.js"></script>



<!--[if lt IE 9]>
	<script language="javascript" type="text/javascript" src="js/html5.js" ></script>
    <link rel="stylesheet" type="text/css" href="css/html5reset.css" />
    <link rel="stylesheet" type="text/css" href="css/support-style-ie78.css" />
<![endif]-->
<title></title>

<?php include("ajax.php"); ?>

</head>
<body>
	<div class="vd-wrapper">
		<div class="vd-main">
			<div class="vd-topBlueHead">
				<div class="left" style="margin:15px 24px 0; font-size:24px; font-weight:bold;"><a href="<?=$ADMIN_URL?>/Users/index.php?view=user" style="color:#FFF;">Almanac Archive</a></div>
				<div class="right">
					<ul>
                    <?php if($subadminid==''){ ?>
						<li class=""><a href="<?=$ADMIN_URL?>/Settings/index.php?layout=myprofile" style="color:#fff;"><?php /*?><img style="margin-top:8px;" src="<?=$ADMIN_URL?>/images/settting.png" alt="Settings" title="Settings"><?php */?>Settings</a></li>
						<!--<li class="settingBg"><a href="#"><img style="margin-top:8px;" src="<?=$ADMIN_URL?>/images/msges.png" alt=""></a></li>-->
                        <?php } ?>
                        
						<li class=""><a href="<?=$ADMIN_URL?>/index.php?action=logout" style="color:#fff;"><?php /*?><img style="margin-top:10px;" src="<?=$ADMIN_URL?>/images/cencel.png" alt="Logout" title="Logout"><?php */?>Logout</a></li>
					</ul>
				</div>
			</div>
				<div class="vd-BlueSearch">
					<div class="left"><img class="vd-logoProp" src="<?=$ADMIN_URL?>/Uploads/user/<?=$row_admin_info['photo']?>" width="65" height="65" alt="" style="display:none;">
						<span class="vd-MiclelText">Hi, <?=$row_admin_info['name']?><a href="#"><img style="margin:0px 0 0 10px;" src="<?=$ADMIN_URL?>/images/miclel-arrow.png" alt=""></a><br>
						<span style="font-size:12px;"><?=$row_admin_info['email']?></span></span>
					</div>
					<div class="right">
						<span class="vdSearchCont">
						<div class="vdRightCont">
						<div class="vdEmailCont">
					<?php if($view!=''){ ?>
                        <ul>
                      
							<li>
							<div class="vdEmailbox">
								<a href="edit.php?view=<?=$_GET['view']?>&layout=edit"><img src="<?=$ADMIN_URL?>/images/emailImg.png" alt="" title="Add New" width="40" height="40"></a>
								<span class="mailText">Add</span>
							</div>
							</li>
                      
							<?php /*?><li>
							<div class="vdEmailbox">
								<a href="#"><img src="<?=$ADMIN_URL?>/images/editEmail.png" alt="" title="Edit" width="40" height="40"></a>
								<span class="mailText">Edit</span>
							</div>
							</li><?php */?>
                            
                            <?php if($_GET['layout']!='edit'){?>
                            <?php /*?><li>
							<div class="vdEmailbox">
								<a href="javascript:void(0)" onClick="statusAll('<?=$_GET['view']?>','1')"><img src="<?=$ADMIN_URL?>/images/viewEmail.png" alt="" title="Edit" width="40" height="40"></a>
								<span class="mailText">Enable</span>
							</div>
							</li>
                            <li>
							<div class="vdEmailbox">
								<a href="javascript:void(0)" onClick="statusAll('<?=$_GET['view']?>','0')"><img src="<?=$ADMIN_URL?>/images/folder.png" alt="" title="Edit" width="40" height="40"></a>
								<span class="mailText">Disable</span>
							</div>
							</li><?php */?>
                           
							<li>
							<div class="vdEmailbox">
								<a href="javascript:void(0)" onClick="deleteAll('<?=$_GET['view']?>')"><img src="<?=$ADMIN_URL?>/images/delet.png" alt="" title="Delete" width="40" height="40"></a>
								<span class="mailText">Delete</span>
							</div>
							</li>
                            <?php } else { ?>
                            <li>
							<div class="vdEmailbox">
								<a href="index.php?view=<?=$_GET['view']?>"><img src="<?=$ADMIN_URL?>/images/back.png" alt="" title="Back" width="40" height="40"></a>
								<span class="mailText">Back</span>
							</div>
							</li>
                            <?php } ?>
						</ul>
                    <?php } ?>
						</div>
						</div>
						</span>
					</div>
			    </div>
					<div class="vd-midcont">
						<div class="vdLeftCont">
							<div class="vdLeftEmailSec">
								<ul>
                                
									<li>
										<a href="<?=$ADMIN_URL?>/Almanac/index.php?view=almanac"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Almanac</span></div></a>
									</li>
                                    
                                    <li>
										<a href="<?=$ADMIN_URL?>/Dataentry/index.php?view=dataentry"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Data Entry</span></div></a>
									</li>
                                    
                                    <li>
										<a href="<?=$ADMIN_URL?>/Issue/index.php?view=issue"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Issue</span></div></a>
									</li>
                                    <li>
										<a href="<?=$ADMIN_URL?>/Library/index.php?view=library"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Add-Library</span></div></a>
									</li>
                                    
                                     <li>
										<a href="<?=$ADMIN_URL?>/Addlibrary/index.php?view=addlibrary"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Library</span></div></a>
									</li>
                                    
                                    <?php /*?><li>
										<a href="<?=$ADMIN_URL?>/Callnumber/index.php?view=callnumber"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Call number</span></div></a>
									</li><?php */?>
                                    
                                    <li>
										<a href="<?=$ADMIN_URL?>/Copy/index.php?view=copy"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">New-Copy</span></div></a>
									</li>
                                    
                                     <li>
										<a href="<?=$ADMIN_URL?>/Image_info/index.php?view=image"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Image-Info</span></div></a>
									</li>
                                     
                                     <li>
										<a href="<?=$ADMIN_URL?>/Annotation/index.php?view=annotation"><div class="vdEmailbox03 vd-otherPages">
										<span class="leftEailText">Annotation</span></div></a>
									</li>
                                    
                                    <li>
										<a href="<?=$ADMIN_URL?>/Users/index.php?view=user"><div class="vdEmailbox03 vd-users">
										<span class="leftEailText">Users</span></div></a>
									</li>
                                    
								</ul>
							</div>
						</div>
                        
<div class="vdRightCont">



<?php if($_SESSION['msg']!='') {?>
<div class="success-msg"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
<?php } ?>

<?php if($_GET['view']!='') {?>
<div class="vdVideoCont">
    <div class="vd-Vprop01">
       <img src="<?=$ADMIN_URL?>/images/videoList.png" alt=""><span class="vdListText"><span class="capitalize"><?=$view?></span><span class="vdListText01"><?php if($_GET['layout']=='edit'){ echo "Layout";} if($_GET['layout']==''){ echo "List";}if($_GET['layout']=='track'){ echo "Performance";}?></span></span>
    </div>
    <?php if($_GET['layout']!='edit'){?>
    <div class="vd-byOrder">
    <input name="searchText" id="searchText" value="<?=$_GET['search']?>" type="text" style="width:200px; float:left; height:26px;" />
    <input name="searchBtn" type="button" class="btn-search" onClick="searchRecord('<?=$_GET['view']?>','title')" value="" />
    <input name="clearBtn" type="button" class="btn-clear" onClick="resetAll('<?=$_GET['view']?>')" value="X" />
    </div><?php } ?>
</div>
<?php } ?>

<div class="clear"></div>