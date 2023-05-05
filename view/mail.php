<!DOCTYPE html>
<html>

<head>
  <title>Data Email</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style type="text/css">
    body {
      background-color: #f8f9fa;
    }

    h1 {
      text-align: center;
      margin-top: 50px;
      margin-bottom: 50px;
    }

    table {
      margin: 0 auto;
      width: 80%;
      background-color: #fff;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 50px;
    }

    th,
    td {
      padding: 12px 15px;
      text-align: center;
      border: none;
    }

    th,
    th a {
      background-color: #333;
      color: #fff;
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: 2px;
    }

    tr {
      border-bottom: 1px solid #ccc;
    }

    tr:last-child {
      border-bottom: none;
    }

    td:last-child a {
      margin-right: 0;
    }

    a {
      color: #333;
      font-weight: bold;
      text-decoration: none;
      margin-right: 10px;
    }

    a.edit {
      color: #ffa500;
    }

    a.delete {
      color: #cc0000;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Data Email</h1>
    <table>
      <thead>
        <tr>
          <th><a href="?sort=id">No.</a></th>
          <th><a href="?sort=nama_lengkap">Nama Lengkap</a></th>
          <th><a href="?sort=email">Email</a></th>
          <th><a href="?sort=no_telepon">No Telepon</a></th>
          <th><a href="?sort=subjek">Subjek</a></th>
          <th><a href="?sort=pesan">Pesan</a></th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once '../src/php/db.php';

        // Cek apakah parameter sort ada atau tidak
        if (isset($_GET['sort'])) {
          // Jika ada, set kolom sorting dan tipe sorting (ASC atau DESC)
          $kolom = $_GET['sort'];
          $tipe = 'ASC';
          // Jika kolom sudah diurutkan sebelumnya, ubah tipe sortingnya
          if (isset($_GET['type'])) {
            if ($_GET['type'] == 'ASC') {
              $tipe = 'DESC';
            }
          }
          $query = "SELECT * FROM send_mail ORDER BY $kolom $tipe";
        } else {
          // Jika tidak ada, tampilkan data secara default
          $query = "SELECT * FROM send_mail";
        }

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $i = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . $row['nama_lengkap'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['no_telepon'] . "</td>";
            echo "<td>" . $row['subjek'] . "</td>";
            echo "<td>" . $row['pesan'] . "</td>";
            echo "<td><a href=\"mail_delete.php?id=" . $row['id'] . "\" class=\"delete\">Hapus</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>Tidak ada data.</td></tr>";
        }

        mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>