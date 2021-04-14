<?php
  // session_start();

include '../connection.php';

  if (!isset($_SESSION['logged'])) {
         # code...
        header('location: ../petowner/login.php');
      
       }


   // variables

       $id = 0;

       //session variales
       $_SESSION['recordDeleted'] = "Cat record deleted";
       $_SESSION['recordNotDeleted'] = "Cat record not deleted"; 

  //deleting a record

       if (isset($_GET['delete'])) {
         # code...
        $id = $_GET['delete'];

        $delete_sql = "DELETE FROM pets WHERE id = $id";

        if ($conn->query($delete_sql) === TRUE) {
          # code...
           header('location: petownercats.php?recorddeleted');
        }else{
           header('location: petownercats.php?recordnotdeleted');
        }

       }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cats</title>
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


                ?>              </li>
              
              
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
  			<a href="petownercats.php" style="background-color: #C00040; padding: 5px;"><i class="fa fa-cat"></i>		Cats<i class="fa fa-caret-right" style=" padding-left: 50%;"></i></a>
  			<a href="petownerdogs.php"><i class="fa fa-dog"></i>		Dogs</a>
  			<a href="addpet.php"><i class="fa fa-plus-square"></i>		Add pet</a>

  			<a href="../authentication/logout.php"><i class="fa fa-sign-out-alt"></i>		Logout</a>
  			
  		</div>


  		<div class="col main-content">
        <div style="margin-top: 10px;">
          <?php
            if (isset($_GET['recorddeleted'])) {
              # code...
              echo "<div class='alert alert-primary'>".$_SESSION['recordDeleted']."</div>";
            }elseif (isset($_GET['recordnotdeleted'])) {
              # code...

              echo "<div class='alert alert-danger'>".$_SESSION['recordNotDeleted']."</div>";
            }

          ?>
        </div>

        <?php
          $mysqli = new mysqli("localhost","root","","adopta") or die($mysqli->error);
          $result = $mysqli->query("SELECT * FROM pets WHERE pet_type = 'cat' AND user_id=".$_SESSION['id']) or die($mysqli->error);


        ?>
  		<table class="table table-hover table-fixed"> 
        <thead>
          <th>ID</th>
          <th>IMAGE</th>
          <th>PET NAME</th>
          <th>BREED</th>
          <th>GENDER</th>
          <th>AGE</th>
          <th colspan="2">ACTIONS</th>
        </thead>
        <?php
           while($row = $result->fetch_assoc()) :  
  
        ?>
        <tbody>
        	 <tr>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo "<img src='../petimages/" .$row['pet_image']. "'style='width:100px; height:100px;'>"?></td>
          <td><?php echo $row['pet_name'] ?></td>
          <td><?php echo $row['breed'] ?></td>
          <td><?php echo $row['gender'] ?></td>
          <td><?php echo $row['age'] ?></td>
          <td>
          	<!-- <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a> -->
          <a href="petownercats.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
          </td>
          
        </tr>
        <?php
            endwhile;
          ?>
      
        </tbody>
    
  			</table>

        <!-- DASHBOARD FOOTER  -->
        <div class="dashboard-footer" style="margin-top: 50px; color: #464646!important;">
          <hr>
            <label>Copyright 2021. All Rights Reserved.</label>
       
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
