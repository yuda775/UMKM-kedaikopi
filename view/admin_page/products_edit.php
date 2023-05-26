  <?php
  // pastikan sesi sudah dimulai
  session_start();

  include_once "../../src/php/db.php";

  // periksa apakah pengguna sudah login
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // pengguna belum login, arahkan ke halaman login
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

  // Mengambil nilai id produk dari form
  $id = $_POST['id'];

  // Mengambil data produk dari database
  $query = "SELECT * FROM produk WHERE id = $id";
  $result = mysqli_query($conn, $query);

  // Memeriksa apakah query berhasil dijalankan atau tidak
  if (!$result) {
    // Jika query gagal dijalankan, tampilkan pesan error
    die("Query gagal dijalankan: " . mysqli_error($conn));
  }

  // Mengambil data produk dari hasil query
  $row = mysqli_fetch_assoc($result);
  // Tampilkan form untuk mengedit produk
  ?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Produk</title>
  </head>

  <body>
    <div class="container mt-5">
      <h1>Edit Produk</h1>
      <form action="../../src/php/product_action.php" method="post" enctype="multipart/form-data">
        <div class="row border p-4 justify-content-between">
          <div class="col">
            <div class="mb-3">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Produk" name="nama_produk" value="<?= $row['nama_produk'] ?>">
            </div>
          </div>
          <div class="col">
            <select class="form-select" aria-label="Default select example" name="kategori">
              <option selected disabled>Pilih Kategori</option>
              <?php
              $query_kategori = "SELECT * FROM kategori_produk";
              $result_kategori = mysqli_query($conn, $query_kategori);
              while ($row_kategori = mysqli_fetch_assoc($result_kategori)) {
                $selected = ($row_kategori['id'] == $row['id_kategori']) ? 'selected' : '';
                echo "<option value='" . $row_kategori['id'] . "' $selected>" . $row_kategori['kategori'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="col">
            <div class="mb-3">
              <input class="form-control" type="file" id="formFile" name="gambar_produk">
            </div>
          </div>
          <button type="submit" name="update_produk" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>

  </html>