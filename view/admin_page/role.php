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
  if ($permissionName === 'role') {
    $hasEmailPermission = true;
    break;
  }
}

if (!$hasEmailPermission) {
  // Tidak memiliki izin akses email, arahkan ke halaman index.php  
  header('Location: components/notfound.php');
  exit;
}

include_once "../../src/php/db.php";

// Hapus role 
if (isset($_POST['delete_role'])) {
  $id = $_POST['id'];

  // Hapus data role_has_permission yang terkait dengan role
  $deleteRoleHasPermissionQuery = "DELETE FROM role_has_permission WHERE role_id='$id'";
  $deleteRoleHasPermissionResult = mysqli_query($conn, $deleteRoleHasPermissionQuery);

  if (!$deleteRoleHasPermissionResult) {
    die("Delete role_has_permission failed: " . mysqli_error($conn));
  }

  // Hapus data role
  $deleteRoleQuery = "DELETE FROM roles WHERE id='$id'";
  $deleteRoleResult = mysqli_query($conn, $deleteRoleQuery);

  if (!$deleteRoleResult) {
    die("Delete role failed: " . mysqli_error($conn));
  }
}

// Tambah role 
if (isset($_POST['add_role'])) {
  $role_name = $_POST['role_name'];

  // Add data
  $query = "INSERT INTO `roles` (`id`, `name`) VALUES (NULL, '$role_name')";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
}
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

  <div class="container mt-5 border rounded p-5">
    <h1>Add Role</h1>
    <form action="" method="post">
      <div class="mt-4">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" name="role_name" placeholder="Role Name" autocomplete="off" required>
      </div>
      <button type="submit" name="add_role" class="btn btn-primary mt-3">Add</button>
    </form>
  </div>

  <?php
  $result = mysqli_query($conn, "SELECT * FROM `roles`");
  ?>

  <div class="container mt-5 border rounded p-5">
    <h1 class="mb-4">Roles</h1>
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-md-3">
          <div class="card mb-3">
            <div class="card-body">
              <h4 class="card-title mb-4"><?= $row['name'] ?></h4>
              <a href="role_detail.php?id=<?= $row['id'] ?>" class="btn btn-warning">Detail</a>
              <form action="" method="post" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus user ini?')">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" name="delete_role" class="btn btn-danger">Delete</button>
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