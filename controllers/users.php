<?php 
class users {
	function __construct() {
		function users(){
			connection("noaffiliation",true);
			$result=mysql_query("select * from account");
			$fetch=mysql_fetch_array($result);
			while($fetch)
			{
				include 'scripts/ajax/users/list.php';
				$fetch=mysql_fetch_array($result);
			}
		}
	}
}
?>
