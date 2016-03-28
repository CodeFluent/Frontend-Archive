<?php include("../../config.php"); ?>

<?php $userid = $_SESSION['userid'];
$APP_URL = $ADMIN_URL."/app";
?>
<?php 
if($_POST['action']=='select_temp')
{
	$sql="Select * from yr15_email where id='".$_POST['recordId']."'";
	$res=mysql_query($sql);
	$row = mysql_fetch_array($res);
	//echo html_entity_decode($row['message']);
	echo '<img src="mail-img/'.$_POST['recordId'].'.png" width="100" height="100">';
}

if($_POST['category']!='')
{
	$sql="Select * from yr15_template where category IN (".$_POST['category'].")";
	$res=mysql_query($sql);
	$i=0;
	while($row_temp=mysql_fetch_array($res)){ $i++;
		echo '<div class="template_block">
	<div class="template_block_label">
	<b>'.$row_temp["title"].'</b>
	</div>
	<img width="120px" height="120px" onclick="showTemplatePreview('.$i.')" src="'.$ADMIN_URL.'/administrator/mail-img/'.$row_temp['id'].'.jpg">
	</div> 
	<div id="t_html_'.$i.'" style="display:none;">'.html_entity_decode($row_temp["message"]).'</div>';
	}
}

if($_POST['action']=='insert_attechment')
{
	$var = explode("-",$_POST['fileName']);
	$sql_insert="insert into yr15_attechment(userid,title,attechment)values('".$userid."','".$var[1]."','".$_POST['fileName']."')";
	$query_insert=mysql_query($sql_insert);
	//echo mysql_insert_id();
	
	$sql="Select * from yr15_attechment where userid='".$userid."'";
	$res=mysql_query($sql);
	$i=0;
	while($row_temp=mysql_fetch_array($res)){ $i++;
	$id="'".$row_temp['id']."'";
	$attechment="'".$row_temp['attechment']."'";
	$url="'".$APP_URL."/Uploads/attechments/".$row_temp['attechment']."'";
		echo '<tr>
    <td>
    <div class="fileName">'.$row_temp['title'].'</div>
    <br>
    <a target="_blank" href="'.$APP_URL.'/Uploads/attechments/'.$row_temp['attechment'].'">http://VMC/icxrty</a>
    </td>
    <td align="center">
    <a href="javascript:insertLink('.$attechment.','.$url.')">Insert Link</a>
    <br>
    <span style="font-size:xx-small;">
    <a href="javascript:deleteFile('.$id.','.$attechment.')">Delete</a>
    </span>
    </td>
</tr>';
	}
}


if($_POST['action']=='delete_attechment')
{
	$sql_delete="delete from yr15_attechment where id='".$_POST['id']."'";
	$query_delete=mysql_query($sql_delete);
	$filename=$_POST['filename'];
	//unlink($APP_URL."/Uploads/attechments/".$filename);
	//echo mysql_insert_id();
	
	$sql="Select * from yr15_attechment where userid='".$userid."'";
	$res=mysql_query($sql);
	$i=0;
	while($row_temp=mysql_fetch_array($res)){ $i++;
	$id="'".$row_temp['id']."'";
	$attechment="'".$row_temp['attechment']."'";
	$url="'".$APP_URL."/Uploads/attechments/".$row_temp['attechment']."'";
		echo '<tr>
    <td>
    <div class="fileName">'.$row_temp['title'].'</div>
    <br>
    <a target="_blank" href="'.$APP_URL.'/Uploads/attechments/'.$row_temp['attechment'].'">http://VMC/icxrty</a>
    </td>
    <td align="center">
    <a href="javascript:insertLink('.$attechment.','.$url.')">Insert Link</a>
    <br>
    <span style="font-size:xx-small;">
    <a href="javascript:deleteFile('.$id.','.$attechment.')">Delete</a>
    </span>
    </td>
</tr>';
	}
}


if($_POST['action']=='youtube_video')
{
	$sql="INSERT INTO yr15_video(userid,v_type,name,file,thumb,alt)value('".$userid."','youtube','New Video','".$_POST['yt_url']."','".$_POST['yt_thumb']."','Click to play video')";
	$query=mysql_query($sql);
	$last_id=mysql_insert_id();
	echo $last_id = "video_".$last_id;
}

if($_POST['action']=='upload_new_photo123')
{
	$sql="INSERT INTO yr15_photo(userid,name,file,alt)value('".$userid."','New Phote','".$_POST['fileName']."','')";
	$query=mysql_query($sql);
	
	$i=0;
	$sql1="SELECT * FROM yr15_photo where userid='".$userid."'";
	$query1=mysql_query($sql1);
	while($row_p=mysql_fetch_array($query1)){$i++;
	$arg = "'video_".$row_p['id']."','".$APP_URL."/Uploads/images/".$row_p['file']."','".$row_p['alt']."'";
	echo '   
    <div class="photo_block">
    <a onclick="showPhotoPreview('.$i.')">'.$row_p['name'].'</a>
    </div> 
    <div id="p_html_'.$i.'" style="display:none;">
    <div style="height: 270px; margin: 10px; padding: 10px; text-align: center; width: 410px;">
    <img src="'.$APP_URL.'/Uploads/images/'.$row_p['file'].'" style="vertical-align:middle;">
    </div>
<a href="javascript:void(0)" onclick="addPhoto('.$arg.')" id="pick_photo_button" class="button" style="margin-left:160px;width:300px;margin-bottom:20px;">Add My Photo</a>
    
    </div>
';
}  }

if($_POST['action']=='upload_new_photo')
{
	$sql="INSERT INTO yr15_photo(userid,name,file,alt)value('".$userid."','New Photo','".$_POST['fileName']."','')";
	$query=mysql_query($sql);
	
	$i=0;
	$sql1="SELECT * FROM yr15_photo where userid='".$userid."'";
	$query1=mysql_query($sql1);
	while($row_p=mysql_fetch_array($query1)){$i++;
	$arg = "'img_".$row_p['id']."','".$APP_URL."/Uploads/images/".$row_p['file']."','".$row_p['alt']."'";

	echo '
	<li><a onclick="showPhotoPreview('.$i.')"><img src="'.$APP_URL.'/Uploads/images/'.$row_p['file'].'" alt="" />
    <div class="up-file-name">'.$row_p['name'].'</div></a>
		<div id="p_html_'.$i.'" style="display:none;">
		<a href="javascript:void(0)" onclick="addPhoto('.$arg.')" id="pick_photo_button" class="vid-ins-btn">Insert Image</a></div></li>';
}  }

?>

    