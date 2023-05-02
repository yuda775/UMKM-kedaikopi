<?php

$nama_lengkap = $_POST["nama-lengkap"];
$email = $_POST["email"];
$no_telepon = $_POST["no-telepon"];
$pesan = $_POST["pesan"];
$subject = $_POST["subject"];
$to = "renachoerunisa5@gmail.com";
$subject_line = "Pesan dari $nama_lengkap ($email) - $subject ";
$body = "No. HP : $no_telepon \n\n Pesan:\n\n$pesan";
if (mail($to, $subject_line, $body)) {
  echo "Pesan telah terkirim.";
} else {
  echo "Gagal mengirim pesan.";
}
