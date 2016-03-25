<?php
if($_GET['view']=='user'){
	define("TABLE",$PREFIX."user"); 
}
elseif($_GET['view']=='setting'){
	define("TABLE",$PREFIX."user"); 
}
elseif($_GET['view']=='almanac'){
	define("TABLE",$PREFIX."almanac"); 
}
elseif($_GET['view']=='page'){
	define("TABLE",$PREFIX."page"); 
}
elseif($_GET['view']=='issue'){
	define("TABLE",$PREFIX."issue"); 
}
elseif($_GET['view']=='library'){
	define("TABLE",$PREFIX."library"); 
}
elseif($_GET['view']=='addlibrary'){
	define("TABLE",$PREFIX."addlibrary"); 
}
elseif($_GET['view']=='callnumber'){
	define("TABLE",$PREFIX."callnumber"); 
}
elseif($_GET['view']=='copy'){
	define("TABLE",$PREFIX."copy"); 
}
elseif($_GET['view']=='image'){
	define("TABLE",$PREFIX."image"); 
}
elseif($_GET['view']=='annotation'){
	define("TABLE",$PREFIX."annotation"); 
}
elseif($_SESSION['adminid']!=''){
	//header("Location: ".$ADMIN_URL."/Dashboard/");
}
else{
	die("Sorry, Wrong Way!");
}


?>
