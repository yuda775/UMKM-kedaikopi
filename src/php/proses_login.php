<?php
session_start();

// Memeriksa apakah form login telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Mengambil input username dan password dari form login
  $username = $_POST['username'];
  $password = $_POST['password'];

  include_once "../php/db.php";
  $cek = mysqli_query($conn, "SELECT * FROM admin WHERE `username` = '$username' AND `password` = '$password'");
  $result = mysqli_fetch_assoc($cek);

  // Memeriksa apakah input username dan password telah diisi
  if (empty($username) || empty($password)) {
    // Jika tidak, tampilkan pesan error dan kembali ke halaman login
    $_SESSION['login_error'] = 'Username atau password tidak boleh kosong.';
    header('Location: ../../view/admin_page/login.php');
    exit;
  }

  // Memeriksa apakah username dan password yang dimasukkan benar
  // Jika benar, simpan informasi pengguna ke dalam session
  // Jika salah, tampilkan pesan error dan kembali ke halaman login
  if ($result && $result['username'] === $username && $result['password'] === $password) {
    $_SESSION['username'] = $username;
    header('Location: ../../view/admin_page/index.php');
    exit;
  } else {
    $_SESSION['login_error'] = 'Username atau password salah.';
    header('Location: ../../view/admin_page/login.php');
    exit;
  }
}
