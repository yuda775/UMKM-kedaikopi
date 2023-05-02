<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "db_kedaikopi";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


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
