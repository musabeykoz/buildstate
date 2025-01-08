<?php
session_start();

$servername = "localhost:3306";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];

$sql = "SELECT id, ad, soyad, mail, onaylimi, telefon, premium, para, elmas,banka,demir,odun,plastik,petrol,bor,elektrik,internet,su,pasker,er,komando,itibar,profil_resmi FROM kullanicilar WHERE id = $kullanici_id";
$result = $conn->query($sql);

$row = $result && $result->num_rows > 0 ? $result->fetch_assoc() : [];
?>
