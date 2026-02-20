<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = mysqli_connect("localhost", "phpuser", "phppassword", "demo_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$user = $_POST['username'];
$pass = $_POST['password'];

// HTML output
echo "<!DOCTYPE html><html><head><title>SQL Injection Demo</title>";
echo "<style>
    body{font-family:Arial;padding:20px;max-width:900px;margin:0 auto;background:#f5f5f5;}
    h1{color:#333;border-bottom:2px solid #333;padding-bottom:10px;}
    .success{background:#d4edda;color:#155724;padding:20px;border-left:6px solid #28a745;margin:20px 0;border-radius:4px;}
    .error{background:#f8d7da;color:#721c24;padding:20px;border-left:6px solid #dc3545;margin:20px 0;border-radius:4px;}
    .info{background:#e3f2fd;color:#0c5460;padding:15px;border-left:4px solid #2196f3;margin:10px 0;border-radius:4px;}
    .sql-box{background:#1e1e1e;color:#d4d4d4;padding:15px;border-radius:5px;font-family:'Courier New',monospace;overflow-x:auto;margin:10px 0;}
    .payload{background:#fff3cd;color:#856404;padding:15px;border-left:4px solid #ffc107;margin:10px 0;border-radius:4px;}
    code{background:#f8f9fa;color:#d63384;padding:2px 5px;border-radius:3px;}
    table{border-collapse:collapse;width:100%;margin:10px 0;}
    th,td{border:1px solid #ddd;padding:8px;text-align:left;}
    th{background-color:#f2f2f2;}
    .btn{display:inline-block;background:#007bff;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;margin-top:20px;}
    .btn:hover{background:#0056b3;}
</style></head><body>";

echo "<h1>🔵 SQL Injection Demonstration</h1>";

echo "<div class='info'>";
echo "<strong>📝 Your Input:</strong><br>";
echo "Username: <code>" . htmlspecialchars($user) . "</code><br>";
echo "Password: <code>" . htmlspecialchars($pass) . "</code><br>";
echo "</div>";

// VULNERABLE SQL QUERY
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";

echo "<div class='sql-box'>";
echo "<strong>📊 SQL Query Executed:</strong><br>";
echo htmlspecialchars($sql);
echo "</div>";

// Execute query
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<div class='error'>";
    echo "<strong>❌ SQL Error:</strong><br>";
    echo mysqli_error($conn);
    echo "</div>";
} else {
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='success'>";
        echo "<strong>✅ LOGIN SUCCESSFUL!</strong><br>";
        echo "Found " . mysqli_num_rows($result) . " user(s):<br>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "• <strong>" . $row['username'] . "</strong> - " . $row['email'] . "<br>";
        }
        echo "</div>";
    } else {
        echo "<div class='error'>";
        echo "<strong>❌ LOGIN FAILED</strong><br>";
        echo "No matching users found.";
        echo "</div>";
    }
}

// Working payloads section
echo "<div class='payload'>";
echo "<h3>✅ WORKING SQL INJECTION PAYLOADS:</h3>";
echo "<table>";
echo "<tr><th>Username</th><th>Password</th><th>Result</th></tr>";
echo "<tr><td><code>admin' OR '1'='1</code></td><td><code>anything</code></td><td>Logs in as admin (bypass password)</td></tr>";
echo "<tr><td><code>' OR '1'='1</code></td><td><code>anything</code></td><td>Logs in as first user</td></tr>";
echo "<tr><td><code>admin</code></td><td><code>admin123</code></td><td>Normal login</td></tr>";
echo "<tr><td><code>testuser</code></td><td><code>password123</code></td><td>Normal login</td></tr>";
echo "</table>";
echo "</div>";

echo "<a href='index.html' class='btn'>← Back to Login</a>";
echo "</body></html>";

mysqli_close($conn);
?>