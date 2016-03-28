<?php 
include("../header.php"); 
?>


							<div class="vdVideoCont">
								<div class="vd-Vprop01">
									<img src="<?=$ADMIN_URL?>/images/videoList.png" alt=""><span class="vdListText">Dashboard<span class="vdListText01">folder</span></span>
								</div>
									
							</div>
								<div class="vdDiscription left">  
                                 
                                 
                                 <ul>
                                  <?php if (in_array("user", $privileges) || $subadminid=='') { ?>
									<li>
										<a href="<?=$ADMIN_URL?>/Users/index.php?view=user"><div class="vdDashboard vd-users">
										<span class="leftEailText">Users</span></div></a>
									</li>
									<?php /*?><li>
										<a href="<?=$ADMIN_URL?>/Emails/index.php?view=email"><div class="vdDashboard vd-email">
										<span class="leftEailText">Emails</span></div></a>
									</li>
									<li>
										<a href="<?=$ADMIN_URL?>/Forms/index.php?view=form"><div class="vdDashboard vd-form">
										<span class="leftEailText">Form</span></div></a>
									</li><?php */?>
                                   <?php } ?>

<?php if (in_array("template", $privileges) || $subadminid=='') { ?>	
                                   <li>
										<a href="<?=$ADMIN_URL?>/Templates/index.php?view=template"><div class="vdDashboard vd-otherPages">
										<span class="leftEailText">E-Templates</span></div></a>
									</li>
                                     <?php } ?>

<?php if (in_array("ftemplate", $privileges) || $subadminid=='') { ?>
                                    <li>
										<a href="<?=$ADMIN_URL?>/FTemplates/index.php?view=ftemplate"><div class="vdDashboard vd-otherPages">
										<span class="leftEailText">F-Templates</span></div></a>
									</li>
                                    
                                   <?php } ?>

<?php if (in_array("ltemplate", $privileges) || $subadminid=='') { ?>
                                    <li>
										<a href="<?=$ADMIN_URL?>/LTemplates/index.php?view=ltemplate"><div class="vdDashboard vd-otherPages">
										<span class="leftEailText">L-Templates</span></div></a>
									</li>
                                     <?php } ?>

<?php if (in_array("video", $privileges) || $subadminid=='') { ?>
                                     <li>
										<a href="<?=$ADMIN_URL?>/Videos/index.php?view=video"><div class="vdDashboard vd-photos">
										<span class="leftEailText">Videos</span></div></a>
									</li>
                                     <?php } ?>

<?php if (in_array("photo", $privileges) || $subadminid=='') { ?>
									<li>
										<a href="<?=$ADMIN_URL?>/Photos/index.php?view=photo"><div class="vdDashboard vd-videos">
										<span class="leftEailText">Photos</span></div></a>
									</li>
                                     <?php } ?>

<?php if (in_array("pricing", $privileges) || $subadminid=='') { ?>
                                    <li>
										<a href="<?=$ADMIN_URL?>/Pricing/index.php?view=pricing"><div class="vdDashboard vd-otherPages">
										<span class="leftEailText">Pricing</span></div></a>
									</li>
                                     <?php } ?>

<?php if (in_array("page", $privileges) || $subadminid=='') { ?>
                                    <li>
										<a href="<?=$ADMIN_URL?>/Pages/index.php?view=page"><div class="vdDashboard vd-otherPages">
										<span class="leftEailText">Pages</span></div></a>
									</li>
                                    
									 <?php } ?>
                                     
                                     <?php if (in_array("mtemplate", $privileges) || $subadminid=='') { ?>
                                    <li>
										<a href="<?=$ADMIN_URL?>/MTemplates/index.php?view=mtemplate"><div class="vdDashboard vd-otherPages">
										<span class="leftEailText">M-Template</span></div></a>
									</li>
                                    
									 <?php } ?>
                                     
                                      <?php if (in_array("enquiry", $privileges) || $subadminid=='') { ?>
                                    <li>
										<a href="<?=$ADMIN_URL?>/Enquiry/index.php?view=enquiry"><div class="vdDashboard vd-otherPages">
										<span class="leftEailText">Enquiry</span></div></a>
									</li>
                                    
									 <?php } ?>
                                     
                                    <!--<li>
										<a href="#"><div class="vdEmailbox03 vd-statistics">
										<span class="leftEailText">Statistics</span></div></a>
									</li>-->
								</ul>		
											

									
								</div>
<?php include("../footer.php"); ?>