<?php
session_start();
include_once '../../src/php/db.php';

$userRole = $_SESSION['role_id'];
$getPermission = mysqli_query($conn, "SELECT p.name FROM role_has_permission rp 
                                      JOIN permissions p ON rp.permission_id = p.id 
                                      WHERE rp.role_id = $userRole");

$allowedPermissions = array(); // Membuat array untuk menyimpan izin yang diizinkan

while ($row = mysqli_fetch_assoc($getPermission)) {
  $permissionName = $row['name'];
  $allowedPermissions[] = $permissionName; // Menambahkan izin ke dalam array
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Admin Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">

        <?php if (in_array('mail', $allowedPermissions)) : ?>
          <a class="nav-item nav-link" href="mail.php">Email</a>
        <?php endif; ?>

        <?php if (in_array('settings', $allowedPermissions)) : ?>
          <a class="nav-item nav-link" href="settings.php">Settings</a>
        <?php endif; ?>

        <?php if (in_array('products', $allowedPermissions)) : ?>
          <a class="nav-item nav-link" href="products.php">Products</a>
        <?php endif; ?>

      </div>
    </div>
  </div>
</nav>