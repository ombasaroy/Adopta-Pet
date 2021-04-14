<?php
  // session_start();
  include '../connection.php';

  if (!isset($_SESSION['logged'])) {
         # code...
        header('location: ../petowner/login.php');
      
       }


    //counter variables
    $pet_owner = 0;
    $cats = 0;
    $dogs = 0;  

    $counter_sql_dogs = "SELECT COUNT(*) AS counter_dogs  FROM pets WHERE pet_type='dog'"; 
    $counter_sql_cats = "SELECT COUNT(*) AS counter_cats  FROM pets WHERE pet_type='cat'";
    $counter_sql_petownwer = "SELECT COUNT(DISTINCT(user_id)) AS counter_petowner FROM pets ";

    $result_dogs = $conn->query($counter_sql_dogs) or die($mysqli->error);
    $result_cats = $conn->query($counter_sql_cats) or die($mysqli->error);
    $result_petownwer = $conn->query($counter_sql_petownwer) or die($mysqli->error);

    $row_dogs = $result_dogs->fetch_assoc();
    $row_cats = $result_cats->fetch_assoc();
    $row_petowner = $result_petownwer->fetch_assoc();

    $pet_owner = $row_petowner['counter_petowner'];
    $cats = $row_cats['counter_cats'];
    $dogs = $row_dogs['counter_dogs']; 

?>

<!DOCTYPE html>
<html>
<head>
  <title>My dashboard</title>
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
  			<div class="inner-sidebar">
       <h2>ADMIN PANEL</h2>
        <hr>
        <a href="dashboard.php" style="background-color: #C00040; padding: 5px;"><i class="fa fa-tachometer-alt"></i>    Dashboard<i class="fa fa-caret-right" style=" padding-left: 30%;"></i></a>
        
        <a href="cats.php" ><i class="fa fa-cat"></i>    Cats</a>
        
        <a href="dogs.php"><i class="fa fa-dog"></i>   Dogs</a>
        
        <a href="users.php"><i class="fa fa-users"></i>    Users</a>
        
<!--        <a href=""><i class="fa fa-user-plus"></i>    Add user</a>
 -->        
        <a href="../authentication/logout.php"><i class="fa fa-sign-out-alt"></i>   Logout</a>   
        </div>

          			
  		</div>

      

  		<div class="col main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="dashboard-header">
            <h1 class="dashboard-header-heading"><span><img src="../images/dashboard/analyticsbars.png" width="50" height="50"></span>  ANALYTICS</h1>
        </div>
          
        </div>

          <div class="row stats-row">
            <div class="col stats">
              <h3 class="stats-col">PET OWNERS</h3>
              <h1><?php echo $pet_owner; ?></h1>
            </div>
            <div class="col stats">
              <h3 class="stats-col">CATS</h3>
              <h1><?php echo $cats; ?></h1>
            </div>
              <div class="col stats">
                <h3 class="stats-col">DOGS</h3>
                <h1><?php echo $dogs; ?></h1>
            </div>
            

          </div>

          <div class="dashboard-footer">
          <hr>
            <label>Copyright 2021. All Rights Reserved.</label>
       
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

