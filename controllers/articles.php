<?php 
class articles {
	function __construct() {
		function articles(){
			connection("noaffiliation",true);
			$result=mysql_query("select * from article");
			$fetch=mysql_fetch_array($result);
			while($fetch)
			{
				include 'scripts/ajax/articles/list.php';
				$fetch=mysql_fetch_array($result);
			}
		}
		phj("focus/articles.html");
	}
}
?>
