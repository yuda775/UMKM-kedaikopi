<?php
// Pastikan sesi sudah dimulai
session_start();

// Menyertakan file koneksi ke database
include_once '../../src/php/db.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Pengguna belum login, arahkan ke halaman login
  header('Location: login.php');
  exit;
}

// Periksa waktu kedaluwarsa token
$expirationTime = $_SESSION['token_expiration'] ?? 0;
if (time() > $expirationTime) {
  // Token telah kedaluwarsa, logout pengguna dan arahkan ke halaman login
  session_destroy();
  header("Location: login.php");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <?php include "components/navbar.php" ?>

  <div class="jumbotron text-center container mt-5 p-5 bg-secondary rounded text-white">
    <h1 class="display-4">Selamat Datang, Admin!</h1>
    <p class="lead">Ini adalah halaman admin <?= getValue('nama_umkm') ?>.</p>
    <hr class="my-4">
    <p>Silakan gunakan fitur-fitur admin dengan bijak.</p>
  </div>

  <form class="mt-5 container" action="../../src/php/logout.php" method="post" onSubmit="return confirm('Anda yakin ingin Keluar?');">
    <button type="submit" class="btn btn-danger mt-5" name="logout">Logout</button>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>