<?php

require_once 'db.php';

$nama_umkm = $_POST['nama_umkm'];
$tagline_umkm = $_POST['tagline_umkm'];
$panel_1 = $_POST['panel_1'];
$panel_2 = $_POST['panel_2'];
$panel_3 = $_POST['panel_3'];
$about_umkm = $_POST['about_umkm'];
$instagram = $_POST['instagram'];
$whatsapp = $_POST['whatsapp'];
$gmail = $_POST['gmail'];


$result = mysqli_query($conn, "UPDATE `settings` SET 
                              `value` = CASE `name`
                                    WHEN 'nama_umkm'    THEN '$nama_umkm'
                                    WHEN 'tagline_umkm' THEN '$tagline_umkm'
                                    WHEN 'panel_1'      THEN '$panel_1'
                                    WHEN 'panel_2'      THEN '$panel_2'
                                    WHEN 'panel_3'      THEN '$panel_3'
                                    WHEN 'about_umkm'   THEN '$about_umkm'
                                    WHEN 'instagram'    THEN '$instagram'
                                    WHEN 'whatsapp'     THEN '$whatsapp'
                                    WHEN 'gmail'        THEN '$gmail'
                                    END
                              WHERE `name` IN ('nama_umkm', 'tagline_umkm', 'panel_1', 'panel_2', 'panel_3', 'about_umkm', 'instagram', 'whatsapp', 'gmail')
                              ");

header('Location: index.php');
