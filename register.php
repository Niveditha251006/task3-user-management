<?php
include 'db.php';

$message = "";

if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username, email, password)
            VALUES('$username', '$email', '$password')";

    if(mysqli_query($conn, $sql)) {
        $message = "Registration Successful";
    } else {
        $message = "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Register</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="register">Register</button>

</form>
<p><?php echo $message; ?></p>

<a href="login.php">Go to Login</a>

</div>

</body>
</html>