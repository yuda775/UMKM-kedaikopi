<?php
include_once "../../src/php/db.php";

// Ambil detail role berdasarkan ID
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM roles WHERE id='$id'";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }

  $role = mysqli_fetch_assoc($result);
} else {
  // Jika ID tidak ditemukan, arahkan ke halaman daftar role
  header("Location: role.php");
  exit();
}

// Ambil data permission yang terkait dengan role
$queryPermissions = "SELECT * FROM permissions";
$resultPermissions = mysqli_query($conn, $queryPermissions);

// Ambil data role_has_permission
$queryRoleHasPermission = "SELECT permission_id FROM role_has_permission WHERE role_id='$id'";
$resultRoleHasPermission = mysqli_query($conn, $queryRoleHasPermission);

// Menyimpan id permission yang terkait dengan role
$rolePermissions = array();
while ($row = mysqli_fetch_assoc($resultRoleHasPermission)) {
  $rolePermissions[] = $row['permission_id'];
}

// Proses simpan perubahan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Peroleh nilai yang diubah dari form
  $name = $_POST['name'];
  $permissions = $_POST['permissions'];

  // Update nama role
  $updateQuery = "UPDATE roles SET name='$name' WHERE id='$id'";
  $updateResult = mysqli_query($conn, $updateQuery);

  if (!$updateResult) {
    die("Update failed: " . mysqli_error($conn));
  }

  // Hapus data role_has_permission yang terkait dengan role
  $deleteQuery = "DELETE FROM role_has_permission WHERE role_id='$id'";
  $deleteResult = mysqli_query($conn, $deleteQuery);

  if (!$deleteResult) {
    die("Delete failed: " . mysqli_error($conn));
  }

  // Tambahkan data role_has_permission baru
  foreach ($permissions as $permission) {
    $insertQuery = "INSERT INTO role_has_permission (role_id, permission_id) VALUES ('$id', '$permission')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if (!$insertResult) {
      die("Insert failed: " . mysqli_error($conn));
    }
  }

  // Redirect ke halaman daftar role setelah perubahan berhasil disimpan
  header("Location: role.php");
  exit();
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
  <div class="container mt-5 border rounded p-5">
    <h3>Role: <?= $role['id'] ?></h3>
    <form action="" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?= $role['name'] ?>">
      </div>
      <div class="permissions mt-4 mb-4">
        <h3>Permission</h3>
        <!-- Checkbox permissions -->
        <?php while ($row = mysqli_fetch_assoc($resultPermissions)) : ?>
          <div class="form-check">
            <?php
            $permissionId = $row['id'];
            $checked = in_array($permissionId, $rolePermissions) ? 'checked' : '';
            ?>
            <input class="form-check-input" type="checkbox" id="permission_<?= $permissionId ?>" name="permissions[]" value="<?= $permissionId ?>" <?= $checked ?>>
            <label class="form-check-label" for="permission_<?= $permissionId ?>"><?= $row['name'] ?></label>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-info">Save</button>
        <a href="role.php">Back</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>