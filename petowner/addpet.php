
<?php
  session_start();

  if (!isset($_SESSION['logged'])) {
         # code...
        header('location: ../petowner/login.php');
      
       }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add pet</title>
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
      <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
          <a class="navbar-brand" href="../index.php"><img src="../images/adoptaheaderlogo.png" alt="logo" width="150" height="45"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
               <?php 
                  if (isset($_SESSION['logged'])) {
                    # code...
                    echo '<a class="nav-link" href="#">Logged in as: <b>'.$_SESSION["full_name"].'</b> </a>';
                  }


                ?>
              </li>
              
              
            </ul>
        </div>
      </nav>
      
    </div>
    
  </div>

  <!-- NAVIGATION BAR ENDS HERE -->
  <div class="container-fluid">
  	<div class="row wrapper">
  		<div class="col sidebar">
  			<h2>MY PANEL</h2>
  			<hr>
  			<a href="petownerdashboard.php"><i class="fa fa-tachometer-alt"></i>		Dashboard</a>
  			<a href="petownercats.php" ><i class="fa fa-cat"></i>		Cats</a>
  			<a href="petownerdogs.php"><i class="fa fa-dog"></i>		Dogs</a>
  			<a href="addpet.php" style="background-color: #C00040; padding: 5px;"><i class="fa fa-plus-square"></i>		Add pet<i class="fa fa-caret-right" style=" padding-left: 45%;"></i></a>

  			<a href="../authentication/logout.php"><i class="fa fa-sign-out-alt"></i>		Logout</a>
  			
  		</div>


  		<div class="col main-content">
        <div class="container signup-form">
  <div class="row">
    <div class="col-md-3"></div>

  <div class="col-md-6" style="">
        <div class="card card-signup">
          <div class=" signup-card-body">
            <h5 class="signup-card-title">ADD PET</h5>
            <div>
              <?php
                 if (isset($_GET['success'])) {
                  # code...
                  echo "<div class='alert alert-success'>" . $_SESSION['success']. "</div>";
                }elseif (isset($_GET['failed'])) {
                  # code...
                  echo "<div class='alert alert-danger'>" . $_SESSION['failed']. "</div>";
                }


              ?>
            </div>
            <hr>
            <form action="../authentication/addingpets.php" method="post" enctype="multipart/form-data">

              <label for="petphoto">Choose pet photo</label>
              <input type="file" name="petphoto" id="petphoto" required="" class="form-control">

              <div class="form-group">
                <label for="petname" class="signuplabel">Pet name</label>
              <input type="text" name="petname" id="petname" placeholder="Enter your pet name" class="form-control" required="">
                
              </div>

              <div class="form-group">
                <label for="pet_type">Pet type:</label>
                <select name="pet_type" id="pet_type" class="form-control">
                  <option value="">Select pet type</option>
                  <option value="cat">Cat</option>
                  <option value="dog">Dog</option>
                </select>
                
              </div>


              <div class="form-group">
                <label for="breed" class="signuplabel">Breed</label>
              <input type="text" name="breed" id="breed" placeholder="Enter pet breed" class="form-control" required="">
                
              </div>

              <div class="form-group">
                <label for="gender">Pet gender:</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="">Select pet gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                
              </div>
              <div class="form-group">
                <label for="age">Pet age:</label>
                <select name="age" id="age" class="form-control">
                  <option value="">Select pet age</option>
                  <option value="young">Young</option>
                  <option value="adult">Adult</option>
                </select>
                
              </div>

              
              <div class="form-group" class="regbuttondiv">
                <input type="submit" name="addpet" id="addpet" value="ADD PET" class="btn btn-block regbutton btn-dark">
                
              </div>              
            </form>          
            
          </div>
          
          
        </div>

        <div class="dashboard-footer">
            <hr>
            <label>Copyright 2021. All Rights Reserved.</label>
       
          </div>
          
      </div>
      <div class="col-md-3"></div>
    
  </div>
  
</div>  		

  	</div>

  </div>
</div>



    <script src="https://ajax.googleapis.com/ajax/libs /jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>

