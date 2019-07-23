<?php include('server2.php');
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin Login Form</title>
    <link rel="stylesheet" href="css/logstyle.css">
</head>

<body>

  <div class="form">
      
   
      <div id="login">   
        <h1>Welcome To Admin Panel</h1>
          
        <form action="index.php" method="post">
          
          <div class="field-wrap">
            <label>
              User Name<span class="req">*</span>
            </label>
            <input type="text" name="user_name" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="user_pass" required autocomplete="off"/>
          </div>
          
          <button type="submit" name="login" class="button button-block"/>Log In</button>

          <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
              <div class="success" >
                <h3>
                  <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                  ?>
                </h3>
              </div>
            <?php endif ?>

            <?php if (isset($_SESSION['success1'])) : ?>
              <div class="success" >
                <h3>
                  <?php 
                    echo $_SESSION['success1']; 
                    unset($_SESSION['success1']);
                  ?>
                </h3>
              </div>
            <?php endif ?>

            <?php if (isset($_SESSION['failed'])) : ?>
              <div class="success" >
                <h3>
                  <?php 
                    echo $_SESSION['failed']; 
                    unset($_SESSION['failed']);
                  ?>
                </h3>
              </div>
            <?php endif ?>

          </div>
          
        </form>

      </div>

        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
