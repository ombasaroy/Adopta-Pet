<?php

session_start();

    $mysqli = new mysqli("localhost","root","","adopta") or die($mysqli->error);
          $result = $mysqli->query("SELECT pets.*,users.full_name, users.phone_number  FROM pets pets INNER JOIN users ON pets.user_id = users.id") or die($mysqli->error);


        ?>

<!DOCTYPE html>
<html>
<head>
  <title>Adopt a pet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>

  <div class="header">
    <div class="menu-bar">
      <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
          <a class="navbar-brand" href="/index.php"><img src="images/adoptaheaderlogo.png" alt="logo" width="150" height="45"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a class="nav-link" href="petowner/login.php">Sign in</a>
              </li>
              <!-- <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
              </li> -->
              
            </ul>
        </div>
      </nav>
      
    </div>
    
  </div>




      <div id="home">
        <div class="landing-text">
          <h1>ADOPT A PET</h1>
          <h3>Kenya's top website for pet adoptions.</h3>
          <!-- <a href="#" class="btn btn-default btn-lg">Adopt now</a> -->
          
        </div>
        
      </div>

      <div class="container container-class">
    <div class="title">
      <h1>FIND A PET</h1>
      <!-- <P>The quick brown fox jumped over the lazy old dogs. The quick brown fox jumped over the lazy old dogs</P> -->
      
    </div> 
    <div class="row">

      <!-- While loop goes here-->

      <?php
           while($row = $result->fetch_assoc()) :  
  
        ?>
      <div class="col-md-3 card-class">
        <div class="card text-center">
          <?php echo "<img src='petimages/" .$row['pet_image']. "'style='width:253px; height:200px; class='img-fluid'>"
           ?>
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['pet_name'] ?></h5>
            <p class="card-text pet-description"><b>Breed - </b> <?php echo $row['breed'] ?> <br> <b>Gender - </b><?php echo $row['gender'] ?> <br> <b>Age - <?php echo $row['age'] ?></b></p>
            <a href="tel:<?php echo $row['phone_number'] ?>" style="text-align: center;"><button class="btn btn-primary btn-block button">ADOPT</button></a>
            
          </div>
          
        </div>

        
      </div>
      <?php
        endwhile;
      ?>
   
    </div>
      
    </div>


    <!-- FOSTER CARE PROGRAM -->
<div class="container-fluid fostercare ">
  <h1>JOIN OUR FOSTER CARE PROGRAM</h1>
  <button class="btn btn-primary button">SIGN UP</button>
  
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
      <img src="images/adoptaheaderlogo.png" class="icon">
      
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

