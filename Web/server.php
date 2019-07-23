<?php
	session_start();
	$username = "";
	
	//connection
	$db = mysqli_connect('localhost','root','','arct');

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$usernam = $_POST['username'];
		$passwor = $_POST['password'];

		$sql = "SELECT * FROM login WHERE name='$usernam' AND pass='$passwor'";
		$result = mysqli_query($db,$sql);
		$check = mysqli_fetch_array($result);
		if(isset($check)){
			echo 'success';
		}else{
			echo 'Wrong username/password combination';
		}
		mysqli_close($db);
	}

?>