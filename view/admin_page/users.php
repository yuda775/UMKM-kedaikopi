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
  if ($permissionName === 'settings') {
    $hasEmailPermission = true;
    break;
  }
}

if (!$hasEmailPermission) {
  // Tidak memiliki izin akses email, arahkan ke halaman index.php  
  header('Location: components/notfound.php');
  exit;
}

// Tambah user
if (isset($_POST['add_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  $role_id = $_POST['role_id'];

  // Periksa apakah password dan konfirmasi password sesuai
  if ($password !== $confirmPassword) {
    // Password dan konfirmasi password tidak sesuai, set flag error
    $error = true;
    echo "<script>alert('Pasword tidak sesuai')</script>";
    echo "<script>window.history.back();</script>";
    exit;
  } else {
    // Lakukan pemrosesan data sesuai kebutuhan Anda, misalnya:
    // Simpan data ke database atau lakukan operasi lain

    // Contoh: Simpan data ke tabel "users"
    $query = "INSERT INTO users (username, password, role_id) VALUES ('$username', '$password', '$role_id')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
      die("Query failed: " . mysqli_error($conn));
    }

    // Redirect atau tampilkan pesan sukses jika diperlukan
    header("Location: users.php");
    exit;
  }
}

// Ambil data pengguna
$queryUsers = "SELECT users.*, roles.name AS role_name FROM users INNER JOIN roles ON users.role_id = roles.id";
$resultUsers = mysqli_query($conn, $queryUsers);


// Hapus user berdasarkan ID
if (isset($_POST['delete_user'])) {
  $id = $_POST['user_id'];

  // Hapus data user dari tabel
  $query = "DELETE FROM users WHERE id=$id";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }

  header('Location: users.php');
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <?php include "components/navbar.php" ?>

  <div class="container mt-5 border rounded p-5">
    <h1>Users</h1>
    <form action="" method="post">
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
          </div>
          <div class="form-group mt-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
          </div>
          <div class="form-group mt-3">
            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Role</label>
            <select class="form-select" aria-label="Default select example" name="role_id">

              <?php
              // Mengambil data role dari tabel
              $query = "SELECT * FROM roles";
              $result = mysqli_query($conn, $query);

              // Menampilkan data role sebagai opsi dalam elemen <select>
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
              ?>

            </select>
          </div>
        </div>
      </div>
      <button type="submit" name="add_user" class="btn btn-primary mt-3">Add</button>
    </form>
  </div>

  <div class="container mt-5 border rounded p-5">
    <h1 class="mb-4">List Users</h1>
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($resultUsers)) : ?>
        <div class="col-md-3">
          <div class="card mb-3">
            <div class="card-body">
              <h4 class="card-title mb-4"><?= $row['username'] ?></h4>
              <p class="card-text">Role: <?= $row['role_name'] ?></p>
              <a href="user_edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
              <form action="" method="post" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus user ini?')">
                <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>