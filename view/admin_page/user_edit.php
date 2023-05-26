<?php
include_once '../../src/php/db.php';

if (isset($_POST['update_user'])) {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $oldPassword = $_POST['old_password'];
  $role = $_POST['role'];
  $newPassword = $_POST['new_password'];
  $confirmNewPassword = $_POST['confirm_new_password'];

  // Query untuk memeriksa password lama
  $checkPasswordQuery = "SELECT password FROM users WHERE id = $id";
  $checkPasswordResult = mysqli_query($conn, $checkPasswordQuery);
  $row = mysqli_fetch_assoc($checkPasswordResult);
  $storedPassword = $row['password'];

  // Validasi password lama
  if ($oldPassword !== $storedPassword) {
    // Password lama tidak sesuai, tampilkan pesan kesalahan
    echo "<script>alert('Password lama tidak sesuai.');</script>";
    echo "<script>window.history.back();</script>";
    exit;
  }

  // Validasi password baru
  if ($newPassword !== $confirmNewPassword) {
    // Password baru dan konfirmasi password baru tidak sesuai, tampilkan pesan kesalahan
    echo "<script>alert('Password baru dan konfirmasi password baru tidak sesuai');</script>";
    echo "<script>window.history.back();</script>";
    exit;
  }

  // Pembaruan data pengguna
  $updateQuery = "UPDATE users SET username = '$username', role_id = $role";

  // Jika password baru tidak kosong, tambahkan pembaruan kolom password
  if (!empty($newPassword)) {
    $updateQuery .= ", password = '$newPassword'";
  }

  $updateQuery .= " WHERE id = $id";

  // Jalankan query pembaruan
  $updateResult = mysqli_query($conn, $updateQuery);

  // Periksa apakah pembaruan berhasil atau tidak
  if (!$updateResult) {
    // Jika pembaruan gagal, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
    // Contoh:
    die("Gagal memperbarui pengguna: " . mysqli_error($conn));
  }

  // Redirect ke halaman yang sesuai setelah pembaruan berhasil
  echo "<script>window.location.href = 'users.php';</script>";
  exit;
}
?>

<?php
include_once '../../src/php/db.php';

// Mengambil nilai id pengguna dari parameter URL
$userId = $_GET['id'];

// Query untuk mengambil informasi pengguna berdasarkan id
$query = "SELECT * FROM users WHERE id = $userId";
$result = mysqli_query($conn, $query);

// Memeriksa apakah pengguna dengan id tersebut ada
if (mysqli_num_rows($result) === 0) {
  // Pengguna dengan id tersebut tidak ditemukan, alihkan kembali ke halaman user.php
  header('Location: user.php');
  exit;
}

// Mengambil data pengguna dari hasil query
$userData = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Edit Pengguna</title>
</head>

<body>

  <div class="container bg-light px-5 py-5 mt-5 rounded border">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="mb-4 text-center">Edit Pengguna</h1>
        <form action="" method="post">
          <input type="hidden" name="id" value="<?= $userData['id'] ?>">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $userData['username'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="old_password" class="form-label">Password Lama</label>
            <input type="password" class="form-control" id="old_password" name="old_password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
              <option value="">Pilih Role</option>
              <!-- Daftar role disesuaikan dengan data role yang ada di database -->
              <?php
              $rolesQuery = "SELECT * FROM roles";
              $rolesResult = mysqli_query($conn, $rolesQuery);
              while ($row = mysqli_fetch_assoc($rolesResult)) {
                $roleId = $row['id'];
                $roleName = $row['name'];
                $selected = ($userData['role_id'] == $roleId) ? 'selected' : '';
                echo "<option value='$roleId' $selected>$roleName</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
          </div>
          <div class="mb-3">
            <label for="confirm_new_password" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
          </div>
          <button type="submit" class="btn btn-primary" name="update_user">Simpan</button>
          <a href="users.php" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-XXsNOB6DxS1LO+nzLrh6Y0L44EiIsPz/zsZxhj8mN3K2iU/IdHn5iP5CusE2JW8P" crossorigin="anonymous"></script>

</body>

</html>