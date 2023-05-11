<?php
// pastikan sesi sudah dimulai
session_start();

// periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // pengguna belum login, arahkan ke halaman login
  header('Location: login.php');
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Admin Page</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php">Email<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="settings.php">Settings</a>
          <a class="nav-item nav-link" href="products.php">Products</a>
        </div>
      </div>
    </div>
  </nav>

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
        include_once "../../src/php/db.php";

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

    <form class="mt-5" action="../../src/php/logout.php" method="post" onSubmit="return confirm('Anda yakin ingin Keluar?');">
      <button type="submit" class="btn btn-danger mt-5" name="logout">Logout</button>
    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>