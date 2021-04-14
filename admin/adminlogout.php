<?php

	session_start();

	session_destroy();

	header('location: ../petowner/login.php');

?>