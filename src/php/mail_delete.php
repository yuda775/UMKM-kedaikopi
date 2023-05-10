<?php

session_start();

// Jika sesi username belum di-set, redirect ke halaman login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

// Halaman yang hanya bisa diakses setelah login
echo "Selamat datang, " . $_SESSION['username'] . "!";


include_once 'db.php';

$id = $_GET['id'];

$query = "DELETE FROM send_mail WHERE id=$id";
mysqli_query($conn, $query);

mysqli_close($conn);
header('Location: ../../view/admin_page/mail.php');
exit();
