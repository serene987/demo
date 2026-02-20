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
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Invalid credentials!";
}

$conn->close();
?>
