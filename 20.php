 CREATE DATABASE login;

USE login;

CREATE TABLE users (
    username VARCHAR(30),
    password VARCHAR(30)
);

INSERT INTO users VALUES ('admin', '1234');
[23/11, 12:35 pm] Adhithyan Mca: <?php
$conn = mysqli_connect("localhost", "root", "", "login");

if (!$conn) {
    die("Connection failed");
}
?>
[23/11, 12:36 pm] Adhithyan Mca: <?php
include "db.php";

if (isset($_POST['submit'])) {

    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$u'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($row['password'] == $p) {
            echo "<h1>Welcome $u</h1>";
        }
        else {
            echo "Incorrect Password";
        }

    }
    else {
        echo "Incorrect Username";
    }
}
?>

<html>
<body>

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

</body>
</html>
