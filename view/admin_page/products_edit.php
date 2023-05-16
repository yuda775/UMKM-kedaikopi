  <?php
  // pastikan sesi sudah dimulai
  session_start();

  // periksa apakah pengguna sudah login
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // pengguna belum login, arahkan ke halaman login
    header('Location: login.php');
    exit;
  }

  include_once "../../src/php/db.php";


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>

  </html>