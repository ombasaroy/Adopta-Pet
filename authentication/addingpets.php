<?php
include '../connection.php';

// making variables to store your server details
		
		$pet_name = "";
		$breed	= "";
		$gender = "";
		$age = "";
		$pet_image = "";
		$pet_type = "";


		//SESSION VARIABLES
		$_SESSION['success']="Pet added sucessfully";
		$_SESSION['failed'] = "Error adding pet! Try again";


		// code for saving user input
	

	if (isset($_POST['addpet'])) {
		# code...
			$user_id = $_SESSION['id'];
		
		
			$pet_name = $_POST['petname'];
			$breed = $_POST['breed'];
			$gender = $_POST['gender'];
			$age =$_POST['age'];
			$pet_type = $_POST['pet_type'];
			$pet_image = $_FILES['petphoto']['name']; // studentImage is the ID of the input while name is the name of the file.
			// we are only storing the path of that image in the database

			$target = "../petimages/" . basename($_FILES['petphoto']['name']);  //this is the actual path of the image that we need to store in the DB
			move_uploaded_file($_FILES['petphoto']['tmp_name'], $target);

			$stmt = $conn->prepare("INSERT INTO pets(pet_image,pet_name,pet_type,breed,gender,age,user_id) VALUES (?,?,?,?,?,?,?)");



			$stmt->bind_param("ssssssi", $pet_image,$pet_name,$pet_type,$breed,$gender,$age,$user_id);

			if ($stmt->execute() === TRUE) {
				# code...

				
				header('location: ../petowner/addpet.php?success');
			}
			else{
				header('location: ../petowner/addpet.php?failed');
			}
			}



			
	
	// else{
	// 	echo "invalid details";
	// }


// SELECTING FROM A DATABASE TABLE - Starts here

	// if (isset($_POST['showDetails'])) {
	// $select_sql = "SELECT id,fullname  FROM users";
	// $result = $conn->query($select_sql);

	// if($result->num_rows > 0){
	// 	while($row = $result->fetch_assoc())
	// }
	// }

	
		

	

	// SELECTING FROM A DATABASE TABLE - ends here


	// DELETING A RECORD FROM A DATABASE TABLE - starts here

	// if (isset($_POST['deleteRecord'])) {
	// 	# code...
	// 	$deleteSql = "DELETE FROM users WHERE id=2";

	// 	if ($conn->query($deleteSql) === TRUE) {
	// 		# code...
	// 		echo "Record deleted sucessfully";
	// 	}
	// 	else{
	// 		echo "unable to delete record" . $conn->error();
	// 	}

	// }



	// DELETING A RECORD FROM A DATABASE TABLE - ends here



// *************************************************************************************
	// DELETE LOGIC starts here - Dynamically
	
	if (isset($_GET['delete'])) {
		# code...
		$id = $_GET['delete'];

		$deleteSql = "DELETE FROM users WHERE id='$id'";

		if($conn->query($deleteSql) === TRUE){
			echo "<script>
			alert('Record Deleted');

			</script>";
			// header('location: index.php');
		}else{
			echo "<script>
			alert('Record not deleted');

			</script>";
			// header('location: index.php');

		}
	}


	// DELETE LOGIC ends here - Dynamically
// *************************************************************************************



// *************************************************************************************
	// UPDATE LOGIC starts here - Dynamically
	if (isset($_GET['edit'])) {
		# code...
		$id = $_GET['edit'];
		$update = true;

		// picking existing data from Database
		$result = $conn->query("SELECT * FROM users WHERE id=$id" ) or die($conn->error);
		$row = $result->fetch_assoc();

		$fullName = $row['fullname']; //the name placed inside the 								square brackets should be 								the same name as in the database 
		$email = $row['email'];
		$gender = $row['gender'];
		$age = $row['age'];
		$studentimage = $row['studentimage'];

	}
	// update functionality

		if (isset($_POST['updateDetails'])) {
		# code...
		
		
			$fullName = $_POST['fullName'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$age = $_POST['age'];

			$id =$_POST['id'];
			$studentimage = $_FILES['image']['name']; // studentImage is the ID of the input while name is the name of the file.
			// we are only storing the path of that image in the database

			$newTarget = "studentimages/" . basename($_FILES['image']['name']);  //this is the actual path of the image that we need to store in the DB

			$updateSQL = "UPDATE users SET fullname='$fullName', gender='$gender', email='$email', age='$age', studentimage='$studentimage' WHERE id='$id'";

			if ($conn->query($updateSQL) === TRUE) {
				# code...
				move_uploaded_file($_FILES['image']['name'], $newTarget);
				echo "record updated";

			}else{
				echo "records not updated" . $conn->error;
			}




	
	}else{
		echo $conn->error;
	}






	// UPDATE LOGIC ends here - Dynamically
// *************************************************************************************


	// $conn->close();
	?>
