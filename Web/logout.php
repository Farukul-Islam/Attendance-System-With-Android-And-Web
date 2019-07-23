<?php
	session_start();
	unset($_SESSION['login']);

   	session_destroy();
   	if(empty($_SESSION['login']))
   		header("location: index.php");
	else
		header("location: portal.php");
?>