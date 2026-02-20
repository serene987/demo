<?php
// VULNERABLE CODE - FOR EDUCATIONAL PURPOSES ONLY
// This demonstrates SQL injection vulnerability

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// VULNERABLE: Direct concatenation without sanitization
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
