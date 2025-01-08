<?php
session_start();

$servername = "localhost:3306";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$urunler = [
    "demir" => 15,
    "odun" => 9,
	"plastik" => 2,
	"petrol" => 1
];

$kullanici_id = $_SESSION['kullanici_id'];
$urun = $_GET['urun'] ?? '';
$miktar = isset($_POST['miktar']) ? intval($_POST['miktar']) : 0;
$fiyat = $urunler[$urun] ?? 0;
$toplamUcret = $miktar * $fiyat;

if ($fiyat && $miktar > 0) {
    $sql = "SELECT para FROM kullanicilar WHERE id = $kullanici_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['para'] >= $toplamUcret) {
            $conn->query("UPDATE kullanicilar SET para = para - $toplamUcret WHERE id = $kullanici_id");
            $conn->query("UPDATE kullanicilar SET $urun = $urun + $miktar WHERE id = $kullanici_id");
            header("Location: ../kullanici.php");
        } else {
            header("Location: ../hata/kullaniciyetersizbakiye.php");
        }
    } else {
        echo "Kullanıcı bilgileri alınamadı.";
    }
} else {
    echo "Geçersiz ürün veya miktar.";
}

$conn->close();
?>
