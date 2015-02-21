<?php
function connection($database,$toggle){

	$servername="localhost";
	$username="root";
	$password=null;
	
	$connection=mysql_connect($servername,$username,$password);
	
	if($toggle==true){
		if($connection){
			mysql_query("SET character_set_results=utf8", $connection);
			mb_language('uni');
			mb_internal_encoding('UTF-8');
			mysql_select_db($database, $connection);
			mysql_query("set names 'utf8'",$connection);
		}
		else
			die(mysql_error());
	}
	else{
		mysql_close($connection);
	}
}
?>
