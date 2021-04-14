<?php

include '../connection.php';
	// varible to store our users' input
			$full_name = "";
			$email = "";
			$phone_number = "";
			$gender = "";
			$reg_password = "";
			$enc_password = "";
			$role = "";


			//session variables
			$_SESSION['detailsexist'] = "Details exist";
			$_SESSION['success'] = "Registration successfull. Proceed to login";			
			$_SESSION['failed'] = "User not registered";


			if (isset($_POST['register'])) {
				# code...
				
			$full_name = $_POST['fullname'];
			$email = $_POST['regemail'];
			$phone_number = $_POST['phone_number'];
			$gender = $_POST['gender'];
			$reg_password =$_POST['regpassword'];
			$enc_password = md5($reg_password);
			$role = $_POST['role'];

			//inserting the data the old way

			// $sql = "INSERT INTO users(full_name,email,phone_number,gender,user_password) VALUES('$full_name','$email','$phone_number','$gender','$enc_password')";

			// if ($conn->query($sql) === TRUE) {
			// 	# code...
			// 	echo "Data inserted successfully";
			// }else{
			// 	echo "Data not inserted". $connect_error;
			// }



			//fetching records to compare signup details
			$sql= "SELECT * FROM users WHERE full_name = '$full_name' && email= '$email'";

			$result = mysqli_query($conn,$sql);
			//finding number of rows that match my sql 

			$num = mysqli_num_rows($result);
			// echo "number of row(s) that match the reg details ". $num;

			if ($num >= 1) {
				# code...
				$_SESSION['detailsexist'];
				header('location: ../petowner/signup.php?exist');

			}else{

			$stmt = $conn->prepare("INSERT INTO users(full_name,email,phone_number,gender,user_password,role) VALUES (?,?,?,?,?,?)");


			$stmt->bind_param("ssssss", $full_name,$email,$phone_number,$gender,$enc_password,$role);

			if ($stmt->execute() === TRUE) {
				# code...
				$_SESSION['success'];
				header('location: ../petowner/login.php?success');
			}
			else{
				$_SESSION['failed'];

				header("Location: ../petowner/signup.php?failed");
				echo "Record not created <br>" . $conn->error;
			}
	
			}

	}



?>