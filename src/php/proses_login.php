<?php
// memulai session
session_start();

// menyertakan file koneksi ke database
include_once('db.php');

// memeriksa apakah form login telah dikirimkan
if (isset($_POST['username'], $_POST['password'])) {

  // menghindari serangan SQL injection dengan mengamankan data yang diterima dari form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // mencari data admin dengan username yang sesuai di dalam tabel admin
  $query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $query);

  // memeriksa apakah data admin ditemukan
  if (mysqli_num_rows($result) == 1) {

    // memeriksa apakah password yang dimasukkan pengguna cocok dengan password yang tersimpan di dalam database
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {

      // menyimpan data login ke dalam session
      $_SESSION['logged_in']  = true;
      $_SESSION['role_id']    = $row['role_id'];
      $_SESSION['username']   = $username;

      // mengarahkan pengguna ke halaman utama atau dashboard
      header('Location: ../../view/admin_page/index.php');
      exit;
    } else {
      // jika password tidak cocok, menampilkan pesan kesalahan
      header('Location: ../../view/admin_page/login.php');
      echo '<div class="alert alert-danger">' . "Username atau password salah" . '</div>';
      exit;
    }
  } else {
    // jika username tidak ditemukan, menampilkan pesan kesalahan
    header('Location: ../../view/admin_page/login.php');
    echo '<div class="alert alert-danger">' . "Username atau password salah" . '</div>';
    exit;
  }
}
