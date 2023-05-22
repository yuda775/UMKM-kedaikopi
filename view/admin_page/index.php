<?php
include_once '../../src/php/db.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <?php include "components/navbar.php" ?>

  <div class="jumbotron text-center container mt-5">
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