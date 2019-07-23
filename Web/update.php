<?php
session_start();

$db= mysqli_connect('localhost','root','','arct');
$newValue = "1";
$table=$_SESSION['table'];

if(isset($_POST["submit"])){
	$date = $_POST["date"];
	$sid = $_POST["id"];
	$updt = $_POST["updt"];

	if ($updt=="Present") {
		$newValue="1";
	}
	else{
		$newValue="0";
	}
 $Sql_Query = "UPDATE `$table` SET `$sid` = '$newValue' WHERE `$table`.`date` = '$date'";
   $res=mysqli_query($db,$Sql_Query);

   header('location: portal.php');
   
}
?>