<?php

include_once 'db.php';

$id = $_GET['id'];

$query = "DELETE FROM send_mail WHERE id=$id";
mysqli_query($conn, $query);

mysqli_close($conn);
header('Location: ../../view/admin_page/mail.php');
exit();
