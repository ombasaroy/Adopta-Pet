<?php
  include '../connection.php';

  if (!isset($_SESSION['logged'])) {
         # code...
        header('location: ../petowner/login.php');
      
       }

    // variables

       $id = 0;

       //session variales
       $_SESSION['recordDeleted'] = "User deleted";
       $_SESSION['recordNotDeleted'] = "User not deleted"; 

  //deleting a record

       if (isset($_GET['delete'])) {
         # code...
        $id = $_GET['delete'];

        $delete_sql = "DELETE FROM pets WHERE id = $id";

        if ($conn->query($delete_sql) === TRUE) {
          # code...
           header('location: users.php?recorddeleted');
        }else{
           header('location: users.php?recordnotdeleted');
        }

       }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
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
  			<h2>ADMIN PANEL</h2>
  			<hr>
  			<a href="dashboard.php"><i class="fa fa-tachometer-alt"></i>		Dashboard</a>
  			
  			<a href="cats.php" ><i class="fa fa-cat"></i>		Cats</a>
  			
  			<a href="dogs.php"><i class="fa fa-dog"></i>		Dogs</a>
  			
  			<a href="" style="background-color: #C00040; padding: 5px;"><i class="fa fa-users"></i>		Users<i class="fa fa-caret-right" style=" padding-left: 50%;"></i></a>
  			
<!--   			<a href="users.html"><i class="fa fa-user-plus"></i>		Add user</a>
 -->  			
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
          $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);


        ?>
  		<table class="table table-hover table-fixed"> 
        <thead>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>CELL NO</th>
          <th>GENDER</th>
          <th>ROLE</th>
          <th>REG DATE</th>
          <th colspan="2">ACTION</th>
        </thead>
        <?php
           while($row = $result->fetch_assoc()) :  
  
        ?>

        <tbody>
        	 <tr>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['full_name'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php echo $row['phone_number'] ?></td>
          <td><?php echo $row['gender'] ?></td>
          <td><?php echo $row['role'] ?></td>
          <td><?php echo $row['reg_date'] ?></td>
          <td>
            <a href="users.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
          </td>
          
        </tr>

        </tbody>
        <?php
          endwhile;
        ?>
    
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

