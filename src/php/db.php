<?php

$servername = getenv('DB_HOST') ?: "localhost";
$username   = getenv('DB_USER') ?: "root";
$password   = getenv('DB_PASS') ?: "";
$db         = getenv('DB_NAME') ?: "db_kedaikopi";

// Create connection with retry logic
$max_retries = 10;
$attempts = 0;
$conn = null;

do {
    try {
        $conn = new mysqli($servername, $username, $password, $db);
        break; // Connected successfully
    } catch (mysqli_sql_exception $e) {
        $attempts++;
        if ($attempts >= $max_retries) {
            die("Connection failed: " . $e->getMessage());
        }
        sleep(2); // Wait 2 seconds before retrying
    }
} while ($attempts < $max_retries);


function getValue($name_settings)
{
  global $conn;
  $name_settings = mysqli_real_escape_string($conn, $name_settings); // menambahkan mysqli_real_escape_string() untuk mencegah injeksi SQL
  $result  = mysqli_query($conn, "SELECT value FROM settings WHERE name = '$name_settings'");
  if (!$result) {
    echo ("Error description: " . mysqli_error($conn));
  }
  $row = mysqli_fetch_assoc($result);
  return $row['value'];
}
