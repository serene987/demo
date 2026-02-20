<?php
$conn = mysqli_connect("localhost", "phpuser", "phppassword", "demo_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$user', '$pass')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>