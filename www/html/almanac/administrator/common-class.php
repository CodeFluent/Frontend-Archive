<?php
class common {
	
	function GET_RECORD($recordId,$field,$search,$view)
	{
		if($view=='user')
			$condition = "WHERE id!='2' ";
		else
			$condition = "WHERE id!='' ";
		
		if($view=='photo' || $view=='video')
		$condition.= "AND userid='".$_SESSION['adminid']."' ";
		
		if($recordId!='')
		$condition.= "AND id='".$recordId."' ";
		
		if($field!='')
		$condition.= "AND $field LIKE '%".$search."%' ";
		$sql.="SELECT * FROM ".TABLE." ";
		$sql.=$condition;
		if($view=='page' || $view=='pricing')
		$sql.="ORDER BY show_order ASC";
		else
		$sql.="ORDER BY id DESC";
		$query=mysql_query($sql);
		return $query;
	}
	
	function GET_RECORD_BYID($id)
	{
		$sql=" SELECT * FROM ".TABLE." where id='".$id."' ";
		$query=mysql_query($sql);
		return $query;
	}
	
	function DELETE_RECORD($id)
	{
		$var = explode("|",$id);
		for($i=0;$i<count($var);$i++)
		{
			$sql="DELETE FROM ".TABLE." WHERE id='".$var[$i]."' "; 
			$result=mysql_query($sql);
		}
		return $result;
	}
	
	function UPDATE_RECORD_STATUS($id,$status)
	{
		$var = explode("|",$id);
		for($i=0;$i<count($var);$i++)
		{
			$sql="UPDATE ".TABLE." SET status='".$status."' WHERE id='".$var[$i]."' "; 
			$result=mysql_query($sql);
		}
		return $result;
	}
	
	function GET_COUNTRY()
	{
		$sql=" SELECT * FROM yr15_countries ORDER BY name ASC";
		$query=mysql_query($sql);
		return $query;
	}
}
?>