<?php

include_once "db.php";

// Hapus ategori 
if (isset($_POST['delete_kategori'])) {
  $id = $_POST['id'];

  $query = "DELETE FROM kategori_produk WHERE id=$id";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
  header('Location: ../../view/admin_page/products.php');
}

// Update kategori 
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

// Tambah ategori 
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

  // Membuat query untuk mengambil nama file gambar produk
  $query_select = "SELECT gambar_produk FROM produk WHERE id = $id";
  $result_select = mysqli_query($conn, $query_select);

  if (!$result_select) {
    die("Query gagal dijalankan: " . mysqli_error($conn));
  }

  $row_select = mysqli_fetch_assoc($result_select);
  $gambar_produk = $row_select['gambar_produk'];

  // Menghapus file gambar jika ada
  if ($gambar_produk && file_exists("../../assets/images/products/" . $gambar_produk)) {
    unlink("../../assets/images/products/" . $gambar_produk);
  }

  // Membuat query untuk menghapus data produk dari tabel produk
  $query_delete = "DELETE FROM produk WHERE id = $id";

  // Menjalankan query menggunakan method mysqli_query
  $result_delete = mysqli_query($conn, $query_delete);

  // Memeriksa apakah query berhasil dijalankan atau tidak
  if (!$result_delete) {
    // Jika query gagal dijalankan, tampilkan pesan error
    die("Query gagal dijalankan: " . mysqli_error($conn));
  }

  // Mengalihkan pengguna kembali ke halaman daftar produk
  header('Location: ../../view/admin_page/products.php');
}


// Update List Produk
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

  // Mengambil nama file gambar saat ini dari database
  $query = "SELECT gambar_produk FROM produk WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_error($conn));
  }

  $row = mysqli_fetch_assoc($result);
  $currentImage = $row['gambar_produk'];

  // Memeriksa apakah file gambar sudah diupload atau belum
  if ($nama_file != "") {
    // Memeriksa apakah tipe file gambar sesuai dengan yang diizinkan
    if ($tipe_file != "image/jpeg" && $tipe_file != "image/png") {
      die("Tipe file gambar tidak diizinkan.");
    }

    // Memindahkan file gambar ke direktori tujuan
    if (move_uploaded_file($tmp_file, $target_file)) {
      // Delete the current image file if it exists
      if ($currentImage && file_exists($target_dir . $currentImage)) {
        unlink($target_dir . $currentImage);
      }

      // Membuat query untuk mengupdate data produk pada tabel produk
      $query = "UPDATE produk SET nama_produk='$nama_produk', id_kategori='$kategori', gambar_produk='$nama_file' WHERE id=$id";
    } else {
      die("Gagal mengupload gambar.");
    }
  } else {
    // Membuat query untuk mengupdate data produk pada tabel produk
    $query = "UPDATE produk SET nama_produk='$nama_produk', id_kategori='$kategori' WHERE id=$id";

    // Delete the current image file if a new image is not uploaded
    if ($currentImage && file_exists($target_dir . $currentImage)) {
      unlink($target_dir . $currentImage);
    }
  }

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
