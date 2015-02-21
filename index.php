<?php
session_start();
ob_start();
//include 'scripts/php/connection.php';
//include 'scripts/php/phj.php';
$editor=new PHJ("My Blog", "en", "/root", "main.html");
return $editor->fill();



?>
