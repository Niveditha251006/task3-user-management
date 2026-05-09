<?php
session_start();
include 'db.php';

$message = "";

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])) {

            $_SESSION['username'] = $row['username'];

            header("Location: dashboard.php");
            exit();

             } else {
            $message = "Wrong Password";
        }

    } else {
        $message = "User Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

<p><?php echo $message; ?></p>

</div>

</body>
</html>