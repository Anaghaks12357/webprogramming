<?php
session_start();

$msg = "";

// Check login form submission
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example login credentials
    if ($username == "admin" && $password == "12345") {

        $_SESSION['username'] = $username;
        header("Location: login.php");
        exit();

    } else {
        $msg = "Incorrect Username or Password!";
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<html>
<body>

<?php
if (isset($_SESSION['username'])) {
?>

    <h1>
        Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>
    </h1>

    <a href="login.php?logout=1">Logout</a>

<?php
}
else {
?>

    <h2>Login Page</h2>

    <form method="POST">

        Username:
        <input type="text" name="username" required>
        <br><br>

        Password:
        <input type="password" name="password" required>
        <br><br>

        <input type="submit" name="submit" value="Login">

    </form>

    <p style="color:red;">
        <?php echo $msg; ?>
    </p>

<?php
}
?>

</body>
</html>

