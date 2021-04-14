<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
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
            <!-- <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a class="nav-link" href="login.php">Sign in</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Pets</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
              </li>
              
            </ul> -->
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
            <h5 class="signup-card-title">SIGN UP HERE</h5>
            <hr>
            <div>
              <?php
              session_start();
                if (isset($_GET['exist'])) {
                      # code...
                  echo "<div class='alert alert-danger'>".$_SESSION['detailsexist']." </div>";
                  session_unset();
                  session_destroy();
                }elseif (isset($_GET['success'])) {
                  # code...
                  echo "<div class='alert alert-success'>".$_SESSION['success']." </div>";
                  session_unset();
                  session_destroy();
                }elseif(isset($_GET['failed'])) {
                  # code...
                  echo "<div class='alert alert-danger'>".$_SESSION['failed']." </div>";
                  session_unset();
                  session_destroy();
                }

  ?>
            </div>
            <form action="../authentication/register.php" method="post">
              <!-- FIRST NAME -->

              <div class="form-group">
                <label for="fullname" class="signuplabel">Full Name</label>
              <input type="text" name="fullname" id="fullname" placeholder="Enter your full name" class="form-control" required="">
                
              </div>
              <div>
                <label for="role"><b>Select user role</b></label>
                <select name="role" id="role" class="form-control">
                  <option value="Admin">Admin</option>
                  <option value="Pet Owner">Pet owner</option>
                </select>
              </div>

              <div class="form-group">
                <label for="regemail" class="signuplabel">Email</label>
              <input type="email" name="regemail" id="regemail" placeholder="Enter your email" class="form-control" required="">
                
              </div>
              <div class="form-group">
                <label for="phone_number" class="signuplabel">Phone Number</label>
              <input type="number" name="phone_number" id="phone_number" placeholder="Enter your phone number" class="form-control" required="">
                
              </div>

              <div class="form-group">
                <label for="" class="signuplabel">Gender</label>
                <br>
                <select name="gender" id="gender" class="form-control">
                  <option value="">Select Gender</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                 </select>
                
              </div>
              <div class="form-group">
                <label for="regpassword" class="signuplabel">Password</label>
              <input type="password" name="regpassword" id="regpassword" placeholder="Password" class="form-control" required="" onkeyup="check()">
                
              </div><div class="form-group">
                <label for="repeatpassword" class="signuplabel">Repeat password</label>
              <input type="password" name="repeatpassword" id="repeatpassword" placeholder="Repeat password" class="form-control" required="" onkeyup="check()">
              <span id="message"></span>
                
              </div>
              
              <div class="form-group" class="regbuttondiv">
                <input type="submit" name="register" id="registerbtn" value="REGISTER" class="btn btn-block regbutton btn-dark">
                
              </div>
              <div class="form-group">
                <label class="signuplabel">Already registered?<a href="login.php">Sign in</a>
                </label>
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
        
    


<script type="text/javascript">
    function check(){
      if (document.getElementById('regpassword').value === document.getElementById('repeatpassword').value) {
        document.getElementById('message').style.color = "green";
        document.getElementById('message').innerHTML = "Passwords match";
        document.getElementById('registerbtn').disabled = false;
      }else{
        document.getElementById('message').style.color = "red";
        document.getElementById('message').innerHTML = "Passwords do not match";
        document.getElementById('registerbtn').disabled = true;
      }
    }
  </script>

    <script src="https://ajax.googleapis.com/ajax/libs /jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>

