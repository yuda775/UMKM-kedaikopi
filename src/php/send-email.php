<?php

include_once 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$nama_lengkap = $_POST["nama-lengkap"];
$email = $_POST["email"];
$no_telepon = $_POST["no-telepon"];
$subjek = $_POST["subjek"];
$pesan = $_POST["pesan"];
print_r($_POST);

$query = "INSERT INTO send_mail (nama_lengkap, email, no_telepon, subjek, pesan)
VALUES ('$nama_lengkap', '$email', '$no_telepon', '$subjek', '$pesan')";

if (mysqli_query($conn, $query)) {
  header('Location: ../../index.php');
} else {
  echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}
