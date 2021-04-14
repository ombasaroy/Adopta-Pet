<?php

include '../connection.php';

// varibles to store user input 

$email = $newpass = $enc_password = "";

//error variables
$email_err = $newpass_err = "";

//session variables
$_SESSION['reset_success'] = "Password reset successful. Proceed to login";


if (isset($_POST['resetpass'])) {
	# code...
	if (empty($_POST['regemail'])) {
		# code...
		$email_err = "Email cannot be empty";
	}else{
		$email = $_POST['regemail'];
	}

	if (empty($_POST['newpass'])) {
		# code...
		$newpass_err = "Password cannot be empty";
	}else{
		$newpass = $_POST['newpass'];
		$enc_password = md5($newpass);
	}


	if (empty($email_err) && empty($newpass_err)) {
		# code...
		$resetsql = "UPDATE users SET user_password = '$enc_password' WHERE email ='$email'";

		$result = mysqli_query($conn,$resetsql);

		if ($result === TRUE) {
			# code...
			header('location: ../petowner/login.php?resetsuccess');
		}else{
			echo "Something went wrong";
		}
	}
}







?>