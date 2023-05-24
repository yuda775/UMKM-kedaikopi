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
  <title>Read Mail</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

  <div class="container mt-5">
    <h2>Read Mail</h2>
    <div class="card">
      <div class="card-body">
        <?php
        //koneksi database
        include_once "../../src/php/db.php";

        //update status email menjadi "Sudah Dibaca"
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = "UPDATE send_mail SET read_status=1 WHERE id=$id";
          mysqli_query($conn, $sql);
        }

        //ambil data email berdasarkan id
        $id = $_GET['id'];
        $sql = "SELECT * FROM send_mail WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        if ($row['read_status'] == 0) {
          $status = "Unread";
        } else {
          $status = "Read";
        }

        ?>

        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap:</label>
          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" disabled>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" disabled>
        </div>

        <div class="form-group">
          <label for="subjek">Subjek:</label>
          <input type="text" class="form-control" id="subjek" name="subjek" value="<?php echo $row['subjek']; ?>" disabled>
        </div>

        <div class="form-group">
          <label for="pesan">Pesan:</label>
          <textarea class="form-control" id="pesan" name="pesan" rows="5" disabled><?php echo $row['pesan']; ?></textarea>
        </div>

        <?php
        mysqli_close($conn);
        ?>

        <a href="mail.php" class="btn btn-secondary btn-sm">Kembali</a>
      </div>
    </div>
  </div>
</body>

</html>