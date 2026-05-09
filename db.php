<?php
$conn = mysqli_connect("localhost", "root", "", "myprojectdb", 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>