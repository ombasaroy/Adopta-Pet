<?php
include '../connection.php';



//setvariable for the user input
$log_password = $log_email = $enc_password = $user_role = $status = "";
$log_email_error = $log_password_error = "";

//session varibles
$_SESSION['userUnavailable'] = "Wrong credentials, try again or create an account";

if (isset($_POST['login'])) {
	# code...
	if (empty($_POST['login_email'])) {
		# code...
		$log_email_error = "Email is needed";
	}else{
		$log_email= $_POST['login_email'];
	}

	if (empty($_POST['login_password'])) {
		# code...
		$log_password_error = "Password is needed";
	}else{
		$log_password = $_POST['login_password'];
		$enc_password = md5($log_password);
	}

	//Verifying if the records exist in the DB

	if (empty($log_email_error) && empty($log_password_error)) {
		# code...
		$login_sql = "SELECT * FROM users WHERE email='$log_email' && user_password = '$enc_password'";

		$result = mysqli_query($conn,$login_sql);
		//checking how many rows have simillar records

		$num = mysqli_num_rows($result);

		if ($num == 1) {
			# code...
			//use the while loop to fetch records of the matched row
			while ($row = $result -> fetch_assoc()) {
				# code...
				$user_role = $row['role'];
				$status = $row['verified_status'];
				$_SESSION['full_name'] = $row['full_name'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['logged'] = 1;

				
			}
			// ridirecting to different dashboards

			switch ($user_role) {
				case 'Admin':
					# code...
					if ($status == "yes") {
						# code...
						header('location: ../admin/dashboard.php');

					}else{
						header('location: ../petowner/login.php?notverified');
						}
					break;
				case 'Pet Owner':
					# code...
					header('location: ../petowner/petownerdashboard.php');

					break;
				
				default:
					# code...
					header("location: ../index.php");
					break;
			}


			// $row = $result -> fetch_assoc(); // returns user's row
			// $_SESSION['full_name'] = $row['full_name'];
			// $_SESSION['id'] = $row['id'];
			// $_SESSION['logged'] = 1;
			
			// header('location: ../petowner/petownerdashboard.php');
		}else{
			// $_SESSION['userUnavailable'];
			header('location: ../petowner/login.php?wrongcred');
		}

	}else{
		echo "Error connecting to database". $conn->error;
	}
}

?>
