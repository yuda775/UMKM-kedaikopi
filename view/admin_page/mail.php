<?php

// Pastikan sesi sudah dimulai
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Pengguna belum login, arahkan ke halaman login
  header('Location: login.php');
  exit;
}

include_once '../../src/php/db.php';

$userRole = $_SESSION['role_id'];
$getPermission = mysqli_query($conn, "SELECT p.name FROM role_has_permission rp 
                                      JOIN permissions p ON rp.permission_id = p.id 
                                      WHERE rp.role_id = $userRole");
$hasEmailPermission = false;

while ($row = mysqli_fetch_assoc($getPermission)) {
  $permissionName = $row['name'];
  if ($permissionName === 'mail') {
    $hasEmailPermission = true;
    break;
  }
}

if (!$hasEmailPermission) {
  // Tidak memiliki izin akses email, arahkan ke halaman index.php
  header('Location: components/notfound.php');
  exit;
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Daftar Email Masuk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <?php include "components/navbar.php" ?>

  <div class="container">
    <h1 class="text-center my-4">Daftar Email Masuk</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Email</th>
          <th>Subjek</th>
          <th>Waktu</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Query untuk membaca data dari tabel send_mail
        $query = "SELECT id, email, subjek, time_stamp, read_status FROM send_mail ORDER BY time_stamp DESC";
        $result = mysqli_query($conn, $query);

        // Memeriksa apakah query berhasil dijalankan
        if (!$result) {
          echo "Error: " . mysqli_error($conn);
          exit();
        }

        // Menampilkan data dalam bentuk tabel
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          $status = $row["read_status"] == 1 ? "Sudah Dibaca" : "Belum Dibaca";
          $class = $row["read_status"] == 1 ? "" : "text-danger font-weight-bold";
          echo "<tr>";
          echo "<td>{$i}</td>";
          echo "<td><a href='read_message.php?id={$row['id']}'><strong>{$row['email']}</strong></a></td>";
          echo "<td>{$row['subjek']}</td>";
          echo "<td>{$row['time_stamp']}</td>";
          echo "<td class='{$class}'>{$status}</td>";
          echo "<td> <a class='btn btn-sm btn-info' href='mail_read.php?id={$row['id']}'>Detail</a> <a class='btn btn-sm btn-danger' href='../../src/php/mail_delete.php?id={$row['id']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus email ini?');\">Delete</a></td>";
          echo "</tr>";
          $i++;
        }

        ?>
      </tbody>
    </table>  

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>