<?php include('server2.php');

	
	if (empty($_SESSION['login'])) {
		header('location: index.php');
	}
	
	$db = mysqli_connect('localhost','root','','arct');
    
	
	if (isset($_POST['findcls'])) {

        $table = $_POST['cls'];
        $_SESSION['table']=$table;
    }
    if (empty($table)) {
    	$table="";
    	$_SESSION['table']="";
    }
    $table=$_SESSION['table'];
    

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="prabhakar gupta">
	<title>Attendance Portal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>



<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			
			<a class="navbar-brand" href="portal.php" style="color: white;">Attendance Portal</a>
			<a class="navbar-brand" href="logout.php">Logout</a>

		</div>

		
	</div>
</nav>

	<!-- Decoration -->
    <div class="col-md-12" id="decoration">
    	<div class="row">
        	<div class="col-md-2">

        		
	            
	            <div class="form-wrapper">
	                <form method="post" action="">
	                	<br>
						<label>Enter Class Code</label>
						<input type="text" class="form-control" name="cls" required>

		                <button type="submit" class="btn btn-success" name="findcls">Search</button>
	                </form>
	                
	            </div>
	            <h3>Actions</h3>
	            <div class="form-wrapper">
	                
	                <form method="post" action="update.php">
	                	<br>
						
						<label>Enter Date</label>
						<input type="date" class="form-control" name="date"  required><br>
						<label>Enter Student ID</label>
		                <input class="form-control" name="id"  required><br>
		                <label>Update with</label>
						<select class="form-control" name="updt">
							<option>Present</option>
							<option>Absent</option>
						</select>

		                <button type="submit" class="btn btn-warning" name="submit">UPDATE</button>
	                </form>
	            </div>
	            
	        </div>
	        <div class="col-md-10" id="right-section">
	        	<?php
	        		if (!empty($table)) {
	        			?>
							<h2>Class Code: <?php echo $table;?></h2>
						<?php
						}
	        	?>
	        	

				<table class="table table-hover table-condensed">
					
					<?php		
						
						
		        		if (empty($table)) {
		        			?>
								<h2>Welcome To Admin Panel</h2>
							<?php
						}
	        	
						else{
							$result = mysqli_query($db,"SELECT * FROM $table");
							$all_property = array();

							while ($property = mysqli_fetch_field($result)) {
							    echo '<th>' . $property->name . '</th>';
							    array_push($all_property, $property->name);
							}
							echo '</tr>';
								while ($row = mysqli_fetch_array($result)) {
							    echo "<tr>";
							    foreach ($all_property as $item) {
							        echo '<td>' . $row[$item] . '</td>';
							    }
							    echo '</tr>';
							}
							echo "</table>";
							}
					?>
					
					
									
				</table>

				
	        </div> 
        </div>
    </div>
    <!-- Decoration -->
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>