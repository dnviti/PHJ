<?php
print("
		<style>
			h4{
				color: #fff;
				margin: 0px;
			}
		</style>
	<article class='notice tool' >
		<header class='tooltip' tooltip='Note: <u>".$fetch[4]."</u>'><h4>".$fetch[1]."</h4></header>
		<p>		".$fetch[3]."</p>
		<footer class='tooltip' tooltip='Notice published on <u>".$fetch[2]."</b>'</u>".$fetch[2]."</footer>
	</article>");
?>
