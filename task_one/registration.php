<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
	<?php
	require('./db_config.php');
	if (isset($_POST['submit'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$confirm_password = md5($_POST['confirm_password']);

		if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) || $confirm_password !== $password) {

			if (empty($first_name)) {
				$fname_error['first_name'] = "First Name is required!";
			}
			if (empty($last_name)) {
				$lname_error['last_name'] = "Last Name is required!";
			}
			if (empty($email)) {
				$email_error['email'] = "Email is required!";
			} elseif (filter_var($email, FILTER_SANITIZE_EMAIL)) {
				$email_error['email'] = "Email is not validet!";
			}
			if (empty($password)) {
				$pass_error['password'] = "Password is required!";
			} elseif ((strlen($password) != 4)) {
				$pass_error['password'] = "Password should be at least 4 digits!";
			}
			if (empty($confirm_password)) {
				$conf_pass_error['confirm_password'] = "Confirm Password is required!";
			} elseif ($password !== $confirm_password) {
				$conf_pass_error['confirm_password'] = "Confirm passworf not matched with password!";
			}
		} else {
			$conn->query("INSERT INTO `user_registration`(`first_name`, `last_name`, `email`, `password`, `confirm_password`) VALUES ('$first_name','$last_name','$email','$password','$confirm_password')");
		}
	}

	?>

	<h2 class="text-center text-success mt-4 mb-3">User Registration Form</h2>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form action="" method="post">
				<div class="row">
					<div class="col mt-2">
						<label for="first_name">First Name</label> <br>
						<span class="text-danger"><?php if (isset($fname_error['first_name'])) {
														echo $fname_error['first_name'];
													} ?></span>
						<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
					</div>
					<div class="col mt-2">
						<label for="last_name">Last Name</label> <br>
						<span class="text-danger"><?php if (isset($lname_error['last_name'])) {
														echo $lname_error['last_name'];
													} ?></span>
						<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
					</div>
				</div>
				<div class="row">
					<div class="col mt-2">
						<label for="email">Email</label> <br>
						<span class="text-danger"><?php if (isset($email_error['email'])) {
														echo $email_error['email'];
													} ?></span>
						<input type="text" name="email" id="email" class="form-control" placeholder="Email">
					</div>
					<div class="col mt-2">
						<label for="email">Password</label><br>
						<span class="text-danger"><?php if (isset($pass_error['password'])) {
														echo $pass_error['password'];
													} ?></span>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="row">
					<div class="col mt-2">
						<label for="confirm_password">Confirm Password</label> <br>
						<span class="text-danger"><?php if (isset($conf_pass_error['confirm_password'])) {
														echo $conf_pass_error['confirm_password'];
													} ?></span>
						<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
					</div>
					<div class="col mt-2">
						<label for="submit">.</label>
						<input type="submit" class="form-control btn btn-success" name="submit" value="Submit">
					</div>
				</div>
			</form>
			<div class="mt-5">
				<b>If you have already an account, then
					<a href="../task_two/login.php" class="btn btn-sm btn-info">Login</a></b>
			</div>
		</div>

		<div class="col-sm-3"></div>
	</div>
</body>

</html>