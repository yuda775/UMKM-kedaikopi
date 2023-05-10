<?php
session_start();

// Hapus data sesi
session_unset();
session_destroy();

// Redirect ke halaman login
header("Location: ../../view/admin_page/login.php");
exit();
