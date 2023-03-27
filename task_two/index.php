<?php session_start();
$conn = new mysqli('localhost', 'root', '', 'ost_assignment');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>


	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 mt-3">
			<h2 class="text-center text-success mt-4 mb-3">User Login</h2>
			<form action="login.php" method="POST">
				<div class="form-group">
					<label for="email">Email address:</label> <br>
					<input type="text" class="form-control" placeholder="Enter email" name="email" id="email">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label><br>
					<input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
				</div>
				<input type="submit" value="Login" name="login_btn" class="btn btn-block btn-success">
				<span class="text-danger"><?php
											if (isset($_SERVER['msg'])) {
												echo $_SESSION['msg'];
												unset($_SESSION['msg']);
											}
											?></span>
			</form>
			<div class="col-sm-4"></div>
		</div>
</body>

</html>