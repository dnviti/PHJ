<?php
class home{
	function __construct()
	{	
		function homepage_notice(){
			connection("noaffiliation",true);
			$result=mysql_query("select * from homepage_notice");
			$fetch=mysql_fetch_array($result);
			while($fetch)
			{
				include 'scripts/ajax/homepage/notice.php';
				$fetch=mysql_fetch_array($result);
			}
		}
			
		phj("focus/homepage.html");
	}
}
?>
