<?php

// Pastikan sesi sudah dimulai
session_start();

include_once '../../src/php/db.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Pengguna belum login, arahkan ke halaman login
  header('Location: login.php');
  exit;
}

$userRole = $_SESSION['role_id'];
$getPermission = mysqli_query($conn, "SELECT p.name FROM role_has_permission rp 
                                      JOIN permissions p ON rp.permission_id = p.id 
                                      WHERE rp.role_id = $userRole");
$hasEmailPermission = false;

while ($row = mysqli_fetch_assoc($getPermission)) {
  $permissionName = $row['name'];
  if ($permissionName === 'products') {
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

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Produk</title>
</head>

<body>

  <?php include "components/navbar.php" ?>

  <!-- Panel Kategori -->
  <div class="container bg-light px-5 py-5 mt-5 rounded border">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="mb-4 text-center">Kategori Produk</h1>
        <form action="../../src/php/product_action.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="kategori" placeholder="Kategori baru" aria-label="Tambah Kategori" aria-describedby="button-add" autocomplete="off">
            <button class="btn btn-primary" name="add_kategori" type="submit" id="button-add">Add</button>
          </div>
        </form>
        <ul class="list-group ">
          <?php
          $query = "SELECT * FROM kategori_produk";
          $result = mysqli_query($conn, $query);
          ?>

          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <li class="list-group-item d-flex justify-content-between rounded">
              <form action="../../src/php/product_action.php" method="post" class="d-flex w-100">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="text" class="form-control me-2" name="kategori" value="<?= $row['kategori'] ?>">
                <button type="submit" name="edit_kategori" class="btn btn-warning me-2">Edit</button>
              </form>
              <form action="../../src/php/product_action.php" method="post" onsubmit="return confirm('Apakah kamu yakin ingin menghapus user ini?')">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" name="delete_kategori" class="btn btn-danger">Delete</button>
              </form>
            </li>
          <?php endwhile; ?>

        </ul>
      </div>
    </div>
  </div>

  <!-- Panel Produk -->
  <div class="container bg-light px-5 py-2 mt-3 mb-5 rounded border">
    <div class="container mt-5">
      <h1 class="mt-5">Produk</h1>
      <form action="../../src/php/product_action.php" method="post" enctype="multipart/form-data">
        <div class="row border p-4 justify-content-between">
          <div class="col">
            <div class="mb-3">
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Produk" name="nama_produk" autocomplete="off">
            </div>
          </div>
          <div class="col">
            <select class="form-select" aria-label="Default select example" name="kategori">
              <option selected disabled>Pilih Kategori</option>
              <?php
              $query = "SELECT * FROM kategori_produk";
              $result = mysqli_query($conn, $query);
              ?>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['kategori'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="col">
            <div class="mb-3">
              <input class="form-control" type="file" id="formFile" name="gambar_produk" autocomplete="off">
            </div>
          </div>
          <button type="submit" name="add_produk" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>

    <?php
    //query untuk mengambil data produk
    $query = "SELECT produk.id, produk.nama_produk, kategori_produk.kategori, produk.gambar_produk, produk.created_at, produk.updated_at, produk.updated_by FROM produk INNER JOIN kategori_produk ON produk.id_kategori = kategori_produk.id;";
    $result = mysqli_query($conn, $query);

    ?>

    <div class="container mt-5">
      <h1 class="mb-5">Daftar Produk</h1>
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr class="text-center fs-3">
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Kategori</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Updated_by</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr class="text-center fs-4 align-middle">
              <td><?php echo $i; ?></td>
              <td><?php echo $row['nama_produk']; ?></td>
              <td><?php echo $row['kategori']; ?></td>
              <td><img src="../../assets/images/products/<?php echo $row['gambar_produk']; ?>" width="100"></td>
              <td class="align-middle">
                <form action="products_edit.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="edit_produk" class="btn btn-primary">Edit</button>
                </form>
                <form action="../../src/php/product_action.php" method="post" onSubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_produk" class="btn btn-danger">Delete</button>
                </form>
              </td>
              <td><?= $row['updated_at'] ?></td>
              <td><?= $row['updated_by'] ?></td>
            </tr>
            <?php $i++; ?>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>