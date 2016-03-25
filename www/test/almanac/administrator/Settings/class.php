<?php
class settings
{
	function UPDATE_PROFILE($id,$uname,$name,$contact,$email,$timezone,$photo)
	{	
		$sql="UPDATE yr15_user set uname='".$uname."',name='".$name."',contact='".$contact."',email='".$email."',timezone='".$timezone."',photo='".$photo."' where id='".$id."' "; 
		$query=mysql_query($sql);
		return $query;
	}	
	
	function UPDATE_PASSWORD($id,$cpsw,$npsw)
	{
		$sql="UPDATE yr15_user SET password='".$npsw."' where id='".$id."' and password='".$cpsw."' "; 
		$result=mysql_query($sql);
		return $result;
	}
	
	function GET_PROFILE($id)
	{
		$sql="SELECT * FROM yr15_user WHERE id='".$id."' "; 
		$result=mysql_query($sql);
		return $result;
	}
	
	
	function UPDATE_SUB_USER($id,$password,$name,$lname,$email,$contact,$address,$city,$state,$country,$zip_code,$photo,$privileges)
	{	
		$sql="UPDATE yr15_sub_user set password='".$password."',name='".$name."',lname='".$lname."',email='".$email."',contact='".$contact."',address='".$address."',city='".$city."',state='".$state."',country='".$country."',zip_code='".$zip_code."',photo='".$photo."',privileges='".$privileges."' where id='".$id."' "; 
		$query=mysql_query($sql);
		return $query;
	}	
	
	function INSERT_SUB_USER($userid,$password,$name,$lname,$email,$contact,$address,$city,$state,$country,$zip_code,$photo,$privileges)
	{	
		$sql="INSERT INTO yr15_sub_user set userid='".$userid."',password='".$password."',name='".$name."',lname='".$lname."',email='".$email."',contact='".$contact."',address='".$address."',city='".$city."',state='".$state."',country='".$country."',zip_code='".$zip_code."',photo='".$photo."',privileges='".$privileges."',reg_date='".date("Y-m-d H:i:s")."'"; 
		$query=mysql_query($sql);
		return $query;
	}	
	
	function GET_SUB_USER($userid)
	{
		$sql="SELECT * FROM yr15_sub_user WHERE userid='".$userid."' "; 
		$result=mysql_query($sql);
		return $result;
	}
	
	function GET_SUB_USER_BYID($suid)
	{
		$sql="SELECT * FROM yr15_sub_user WHERE id='".$suid."' "; 
		$result=mysql_query($sql);
		return $result;
	}
	
	function DELETE_SUB_USER($suid)
	{
		$sql="DELETE FROM yr15_sub_user WHERE id='".$suid."' "; 
		$result=mysql_query($sql);
		return $result;
	}
	
	function UPDATE_SUB_USER_STATUS($suid,$status)
	{
		$sql="UPDATE yr15_sub_user SET status='".$status."' WHERE id='".$suid."' "; 
		$result=mysql_query($sql);
		return $result;
	}
}

?>