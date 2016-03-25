<?php
class users {
	
	function GET_ALL_USERS()
	{
		$sql=" SELECT * FROM yr15_user WHERE uname<>'admin' ORDER BY id DESC ";
		$query=mysql_query($sql);
		return $query;
	}
}
?>