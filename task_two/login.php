<?php

if (isset($_POST['login_btn'])) {

	// require('../task_one/db_config.php');
	$conn = new mysqli('localhost', 'root', '', 'ost_assignment');
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "SELECT * FROM `user_registration` WHERE `email` = '$email' && `password` = '$password'");

	if (mysqli_num_rows($query) == 0) {
		$_SESSION['msg'] = "Login failed. User not found!";
		header("location:index.php");
	} else {
		$row = mysqli_fetch_array($query);

		if (isset($_POST['email'])) {
			setcookie("email", $row['user_name'], time() + (86400 * 30));
			setcookie("password", $row['password'], time() + (86400 * 30));
		}

		$_SESSION['first_name'] = $row['first_name'];
		header("location:dashboard.php");
	}
}
