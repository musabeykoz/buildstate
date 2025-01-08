<?php
// Oturumu başlat
session_start();

// Oturum verisini ayarla
$_SESSION['kullanici_id'];

// Diğer sayfaya yönlendir
header('Location:banka.php');
exit();
?>
