<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome, You are successfully Logedin</h1>
    <?php
    if (isset($_SESSION['first_name'])) {
        echo $_SESSION['first_name'];
    }

    ?>
</body>

</html>