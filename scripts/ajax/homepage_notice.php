<?php
	session_start();
	include '../../php/connection.php';
	connection("noaffiliation",true);
	$order_by=$_POST["dom_this"];
	$result=mysql_query("select * from homepage_notice order by $order_by");
	$fetch=mysql_fetch_array($result);
	while($fetch)
	{
		include 'notice.php';
		$fetch=mysql_fetch_array($result);
	}
?>
