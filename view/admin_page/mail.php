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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>