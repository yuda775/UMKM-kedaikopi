<?php

require_once 'db.php';

// === Bagian Text ====
$nama_umkm               = $_POST['nama_umkm'];
$tagline_umkm            = $_POST['tagline_umkm'];

$panel_1                 = $_POST['panel_1'];
$panel_2                 = $_POST['panel_2'];
$panel_3                 = $_POST['panel_3'];

$about_umkm              = $_POST['about_umkm'];

$instagram               = $_POST['instagram'];
$whatsapp                = $_POST['whatsapp'];
$envelope                = $_POST['envelope'];
$facebook                = $_POST['facebook'];
$twitter                 = $_POST['twitter'];
$linkedin                = $_POST['linkedin'];

$instagram_profile       = $_POST['instagram_profile'];
$whatsapp_profile        = $_POST['whatsapp_profile'];
$envelope_profile        = $_POST['envelope_profile'];
$facebook_profile        = $_POST['facebook_profile'];
$twitter_profile         = $_POST['twitter_profile'];
$linkedin_profile        = $_POST['linkedin_profile'];



// mengambil nama file gambar jumbotron yang lama
$result = mysqli_query($conn, "SELECT value FROM settings WHERE name='jumbotron_image'");
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


$result = mysqli_query($conn, "UPDATE `settings` SET 
                              `value` = CASE `name`
                                    WHEN 'nama_umkm'        THEN '$nama_umkm'
                                    WHEN 'tagline_umkm'     THEN '$tagline_umkm'
                                    WHEN 'panel_1'          THEN '$panel_1'
                                    WHEN 'panel_2'          THEN '$panel_2'
                                    WHEN 'panel_3'          THEN '$panel_3'
                                    WHEN 'jumbotron_image'  THEN '$jumbotron_image'
                                    WHEN 'about_umkm'       THEN '$about_umkm'
                                    WHEN 'instagram'        THEN '$instagram'
                                    WHEN 'whatsapp'         THEN '$whatsapp'
                                    WHEN 'envelope'         THEN '$envelope'                                   
                                    WHEN 'facebook'         THEN '$facebook'
                                    WHEN 'linkedin'         THEN '$linkedin'
                                    WHEN 'twitter'          THEN '$twitter'  
                                    END
                              WHERE `name` IN ('nama_umkm', 'tagline_umkm', 'panel_1', 'panel_2', 'panel_3', 'jumbotron_image', 'about_umkm', 'instagram', 'whatsapp', 'envelope', 'facebook', 'linkedin', 'twitter')
                              ");

header('Location: ../../index.php');
