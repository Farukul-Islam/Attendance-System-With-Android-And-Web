
<?php
	session_start();
	$username = "";
	
	//connection
	$db = mysqli_connect('localhost','root','','arct');

	

	if (isset($_POST['login'])) {
	  $username = $_POST['user_name'];
	  $password = $_POST['user_pass'];

	  	$query = "SELECT * FROM login WHERE name='$username' AND pass='$password'";
	  	$results = mysqli_query($db, $query);
	  	if (mysqli_num_rows($results) == 1) {
	  	  $_SESSION['success'] = "Login Successful";
	  	  $_SESSION['login'] = "Login Successful";
	  	  header('location: portal.php');
	  	  
	  	}else {
	  		$_SESSION['failed'] =  "Wrong username/password combination";
	  	}
	  	mysqli_close($db);
	  
	}

?>