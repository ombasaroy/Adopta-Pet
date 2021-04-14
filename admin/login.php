<?php
  session_start();


?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>


<body>


<!-- NAVIGATION BAR STARTS HERE -->
  <div class="header">
    <div class="menu-bar">
      <nav class="navbar navbar-expand-lg navbar-light navbar-fixed">
          <a class="navbar-brand" href="../index.php"><img src="../images/adoptaheaderlogo.png" alt="logo" width="150" height="45"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a class="nav-link" href="login.php">Sign in</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Pets</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
              </li>
              
            </ul>
        </div>
      </nav>
      
    </div>
    
  </div>

  <!-- NAVIGATION BAR ENDS HERE -->

<div class="container signup-form">
  <div class="row">
    <div class="col-md-3"></div>

  <div class="col-md-6" style="">
        <div class="card card-signup">
          <div class=" signup-card-body">
            <h5 class="signup-card-title">LOGIN AS ADMIN</h5>
            <hr>

            <div>
              <?php
                if (isset($_GET['wrongcred'])) {
                  # code...
                  echo "<div class='alert alert-danger'>" .$_SESSION['userUnavailable']. "</div>";
                }
              ?>
            </div>
            <form action="adminaccess.php" method="post">
              <!-- FIRST NAME -->


              <div class="form-group">
                <label for="loginemail" class="signuplabel">Email</label>
              <input type="email" name="loginemail" id="loginemail" placeholder="Enter your email" class="form-control" required="">
                
              </div>

      
              <div class="form-group">
                <label for="loginpassword" class="signuplabel">Password</label>
              <input type="password" name="loginpassword" id="loginpassword" placeholder="Password" class="form-control" required="">
                
              </div>

              <div class="form-group forgot-password">
                <p class="signuplabel">Forgot your password? <a href="resetpassword.php">Reset password</a></p>
                
              </div>

              
              <div class="form-group" class="regbuttondiv">
                <input type="submit" name="login" id="login" value="LOGIN" class="btn btn-block regbutton btn-dark">
                
              </div>
              <!-- <div class="form-group">
                <label class="signuplabel">Not registered?<a href="signup.html">Sign up here</a>
                </label>
              </div> -->
              <div class="form-group">
                <label class="signuplabel"><a href="../index.php">Go back to homepage</a>
                
              </div>

              
            </form>

            
            
          </div>
          
        </div>

        
      </div>
      <div class="col-md-3"></div>
    
  </div>
  
</div>





    
<footer class="container-fluid text-center footer-class">
  <div class="row">
    <div class="col-sm-4 contact">
      <h3>Contact Us</h3>
     <hr>
      <h5>Our address and contact info here.</h5>
    </div>
    <div class="col-sm-4 connect">
      <h3>Connect</h3>
      <hr>
      <a href="#" class="fab fa-facebook"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-google"></a>
      <a href="#" class="fab fa-linkedin"></a>
      <a href="#" class="fab fa-youtube"></a>
      <a href="#" class="fab fa-instagram"></a>
    </div>
    <div class="col-sm-4">
      <img src="../images/adoptaheaderlogo.png" class="icon">
      
    </div>
    
  </div>
  <p>All Rights Reserved || 2021</p>

  
</footer>
        
    

    <script src="https://ajax.googleapis.com/ajax/libs /jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>

