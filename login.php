<?php
session_start();
include "db.php";

$msg = "";

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Login
if (isset($_POST['submit'])) {

        $u = $_POST['username'];
$p = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$u'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    if ($row['password'] == $p) {

        $_SESSION['username'] = $u;

        // Redirect to welcome page
        header("Location: welcome.php");
        exit();

    }
    else {
        $msg = "Incorrect Password";
    }

}
else {
    $msg = "Incorrect Username";
}

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

    <p><?php echo $msg; ?></p>

<?php
}
?>

</body>
</html>
