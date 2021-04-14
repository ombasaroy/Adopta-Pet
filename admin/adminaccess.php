<?php

include '../connection.php';



//setvariable for the user input
$log_password = $log_email = $enc_password = "";
$log_email_error = $log_password_error = "";

//session varibles
$_SESSION['userUnavailable'] = "Wrong credentials, try again or create an account";

if (isset($_POST['login'])) {
	# code...
	if (empty($_POST['loginemail'])) {
		# code...
		$log_email_error = "Email is needed";
	}else{
		$log_email= $_POST['loginemail'];
	}

	if (empty($_POST['loginpassword'])) {
		# code...
		$log_password_error = "Password is needed";
	}else{
		$log_password = $_POST['loginpassword'];
		$enc_password = md5($log_password);
	}

	//Verifying if the records exist in the DB

	if (empty($log_email_error) && empty($log_password_error)) {
		# code...
		$login_sql = "SELECT * FROM users WHERE email='$loginemail' && user_password = '$enc_password'";

		$result = mysqli_query($conn,$login_sql);

		//checking how many rows have simillar records

		$num = mysqli_num_rows($result);

		if ($num == 1) {
			# code...
			while ($row=mysqli_fetch_array($result)) {
				# code...
				
			}
			// $row = $result -> fetch_assoc(); // returns user's row
			// $_SESSION['full_name'] = $row['full_name'];
			// $_SESSION['id'] = $row['id'];
			// $_SESSION['logged'] = 1;

			
			header('location: dashboard.php');
		}else{
			// $_SESSION['userUnavailable'];
			header('location: login.php?wrongcred');
		}

	}else{
		echo "SQL did not execute". $conn->error;
	}
}

?>
