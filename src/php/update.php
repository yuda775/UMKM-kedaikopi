<?php

require_once 'db.php';

// === Bagian Text ====
$nama_umkm        = $_POST['nama_umkm'];
$tagline_umkm     = $_POST['tagline_umkm'];

$panel_1          = $_POST['panel_1'];
$panel_2          = $_POST['panel_2'];
$panel_3          = $_POST['panel_3'];

$about_umkm       = $_POST['about_umkm'];

$instagram        = $_POST['instagram'];
$whatsapp         = $_POST['whatsapp'];
$envelope         = $_POST['envelope'];
$facebook         = $_POST['facebook'];
$twitter          = $_POST['twitter'];
$linkedin         = $_POST['linkedin'];

$instagram_profile      = $_POST['instagram_profile'];
$whatsapp_profile       = $_POST['whatsapp_profile'];
$envelope_profile       = $_POST['envelope_profile'];
$facebook_profile       = $_POST['facebook_profile'];
$twitter_profile        = $_POST['twitter_profile'];
$linkedin_profile       = $_POST['linkedin_profile'];


// === Bagian File Gambar ===
// mengambil nama file gambar jumbotron yang lama
$query = "SELECT value FROM settings WHERE name='jumbotron_image'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$old_jumbotron_image = $row['value'];

// menghapus file gambar jumbotron yang lama
$path = "../../assets/images/jumbotron/" . $old_jumbotron_image;
if (file_exists($path)) {
      unlink($path);
}

// menyimpan gambar jumbotron yang baru
$jumbotron_image = $_FILES['jumbotron_image']['name'];
$tmp = $_FILES['jumbotron_image']['tmp_name'];
$path = "../../assets/images/jumbotron/" . $jumbotron_image;
move_uploaded_file($tmp, $path);

// mengubah jumbotron_image
$query = "UPDATE settings SET value='$jumbotron_image' WHERE name='jumbotron_image'";
mysqli_query($conn, $query);


// mengambil nama file gambar umkm yang lama
$query = "SELECT value FROM settings WHERE name='umkm_image'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$old_umkm_image = $row['value'];

// menghapus file gambar umkm yang lama
$path = "../../assets/images/umkm/" . $old_umkm_image;
if (file_exists($path)) {
      unlink($path);
}

// menyimpan gambar umkm yang baru
$umkm_image = $_FILES['umkm_image']['name'];
$tmp = $_FILES['umkm_image']['tmp_name'];
$path = "../../assets/images/umkm/" . $umkm_image;
move_uploaded_file($tmp, $path);

// mengubah umkm_image
$query = "UPDATE settings SET value='$umkm_image' WHERE name='umkm_image'";
mysqli_query($conn, $query);


$result = mysqli_query($conn, "UPDATE `settings` SET 
                              `value` = CASE `name`
                                    WHEN 'nama_umkm'        THEN '$nama_umkm'
                                    WHEN 'tagline_umkm'     THEN '$tagline_umkm'
                                    WHEN 'panel_1'          THEN '$panel_1'
                                    WHEN 'panel_2'          THEN '$panel_2'
                                    WHEN 'panel_3'          THEN '$panel_3'
                                    WHEN 'about_umkm'       THEN '$about_umkm'
                                    WHEN 'instagram'        THEN '$instagram'
                                    WHEN 'whatsapp'         THEN '$whatsapp'
                                    WHEN 'envelope'         THEN '$envelope'                                   
                                    WHEN 'facebook'         THEN '$facebook'
                                    WHEN 'linkedin'         THEN '$linkedin'
                                    WHEN 'twitter'          THEN '$twitter'  
                                    END
                              WHERE `name` IN ('nama_umkm', 'tagline_umkm', 'panel_1', 'panel_2', 'panel_3', 'about_umkm', 'instagram', 'whatsapp', 'envelope', 'facebook', 'linkedin', 'twitter')
                              ");

header('Location: ../../index.php');
