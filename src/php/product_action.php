<?php
include_once "db.php";

if (isset($_POST['delete_kategori'])) {
  $id = $_POST['id'];

  // Delete data
  $query = "DELETE FROM kategori_produk WHERE id=$id";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
  header('Location: ../../view/admin_page/products.php');
}

if (isset($_POST['edit_kategori'])) {
  $id = $_POST['id'];
  $kategori = $_POST['kategori'];

  // Update data
  $query = "UPDATE kategori_produk SET kategori='$kategori' WHERE id=$id";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
  header('Location: ../../view/admin_page/products.php');
}


if (isset($_POST['add_kategori'])) {
  $kategori = $_POST['kategori'];

  // Add data
  $query = "INSERT INTO kategori_produk (kategori) VALUES ('$kategori')";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
  header('Location: ../../view/admin_page/products.php');
}



// Tambah list produk
if (isset($_POST['add_produk'])) {
  $nama_produk = $_POST['nama_produk'];
  $kategori = $_POST['kategori'];

  // mengambil informasi file gambar yang diupload
  $gambar_produk = $_FILES['gambar_produk']['name'];
  $tmp_gambar = $_FILES['gambar_produk']['tmp_name'];
  $size_gambar = $_FILES['gambar_produk']['size'];
  $type_gambar = $_FILES['gambar_produk']['type'];

  // menentukan lokasi folder untuk menyimpan gambar
  $path = "../../assets/images/products/";

  // memeriksa apakah tipe file gambar yang diupload diizinkan
  if (($type_gambar == "image/jpg") || ($type_gambar == "image/jpeg") || ($type_gambar == "image/png")) {

    // memindahkan gambar ke folder yang ditentukan
    if (move_uploaded_file($tmp_gambar, $path . $gambar_produk)) {

      // menyimpan data produk ke database
      $sql = "INSERT INTO produk (nama_produk, id_kategori, gambar_produk) VALUES ('$nama_produk', '$kategori', '$gambar_produk')";
      if (mysqli_query($conn, $sql)) {
        echo "Produk berhasil ditambahkan.";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "Maaf, terjadi kesalahan saat mengupload gambar.";
    }
  } else {
    echo "Maaf, hanya file gambar dengan format JPG, JPEG, atau PNG yang diizinkan.";
  }

  header('Location: ../../view/admin_page/products.php');
}

// Hapus list produk
if (isset($_POST['delete_produk'])) {
  // Mengambil nilai id produk dari form
  $id = $_POST['id'];

  // Membuat query untuk menghapus data produk dari tabel produk
  $query = "DELETE FROM produk WHERE id = $id";

  // Menjalankan query menggunakan method mysqli_query
  $result = mysqli_query($conn, $query);

  // Memeriksa apakah query berhasil dijalankan atau tidak
  if (!$result) {
    // Jika query gagal dijalankan, tampilkan pesan error
    die("Query gagal dijalankan: " . mysqli_error($conn));
  }

  // Mengalihkan pengguna kembali ke halaman daftar produk
  header('Location: ../../view/admin_page/products.php');
}

// Edit List Produk
if (isset($_POST['edit_produk'])) {
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
  print_r($row);
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
      <form action="" method="post" enctype="multipart/form-data">
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
              $query = "SELECT * FROM kategori_produk";
              $result = mysqli_query($conn, $query);
              ?>
              <?php while ($row_kategori = mysqli_fetch_assoc($result)) : ?>
                <option value="<?php echo $row_kategori['id'] ?>" <?php if ($row_kategori['id'] == $row['kategori']) echo 'selected'; ?>><?php echo $row_kategori['kategori'] ?></option>
              <?php endwhile; ?>
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
<?php
}


if (isset($_POST['update_produk'])) {
  // Mengambil nilai id produk dari form
  $id = $_POST['id'];
  // Mengambil nilai data produk dari form
  $nama_produk = $_POST['nama_produk'];
  $kategori = $_POST['kategori'];

  // Mengambil data gambar dari form
  $nama_file = $_FILES['gambar_produk']['name'];
  $ukuran_file = $_FILES['gambar_produk']['size'];
  $tipe_file = $_FILES['gambar_produk']['type'];
  $tmp_file = $_FILES['gambar_produk']['tmp_name'];

  // Menyiapkan direktori untuk menyimpan gambar
  $target_dir = "../../assets/images/products/";
  $target_file = $target_dir . basename($nama_file);

  // Memeriksa apakah file gambar sudah diupload atau belum
  if ($nama_file != "") {
    // Memeriksa apakah tipe file gambar sesuai dengan yang diizinkan
    if ($tipe_file != "image/jpeg" && $tipe_file != "image/png") {
      die("Tipe file gambar tidak diizinkan.");
    }

    // Memindahkan file gambar ke direktori tujuan
    if (move_uploaded_file($tmp_file, $target_file)) {

      // Membuat query untuk mengupdate data produk pada tabel produk
      $query = "UPDATE `produk` SET `nama_produk` = '$nama_produk', `gambar_produk` = '$nama_file' WHERE `produk`.`id` = $id;";

      // Menjalankan query menggunakan method mysqli_query
      $result = mysqli_query($conn, $query);

      // Memeriksa apakah query berhasil dijalankan atau tidak
      if (!$result) {
        // Jika query gagal dijalankan, tampilkan pesan error
        die("Query gagal dijalankan: " . mysqli_error($conn));
      }
    } else {
      die("Gagal mengupload gambar.");
    }
  } else {
    // Membuat query untuk mengupdate data produk pada tabel produk
    $query = "UPDATE produk SET nama_produk='$nama_produk', id_kategori='$kategori' WHERE id=$id";

    // Menjalankan query menggunakan method mysqli_query
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah query berhasil dijalankan atau tidak
    if (!$result) {
      // Jika query gagal dijalankan, tampilkan pesan error
      die("Query gagal dijalankan: " . mysqli_error($conn));
    }
  }

  // Mengalihkan pengguna kembali ke halaman daftar produk
  header('Location: ../../view/admin_page/products.php');
}
