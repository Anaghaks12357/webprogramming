<?php session_start(); if (!isset($_SESSION['username'])) { header("Location: login.php"); exit(); } ?>

<!DOCTYPE html>

<html> <head> <title>Welcome Page</title> </head>

<body>

<h1 align="center">
    Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>
</h1>

<h2 align="center">Login Successful!</h2>

<center>
    <a href="login.php?logout=1">Logout</a>
</center>


</body> </html>
