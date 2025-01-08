<?php
include '../../config/config.php';
session_start();

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];
$profilResmiLink = $conn->real_escape_string($_POST['profilResmiLink']);

// Profil resmi değiştirme ücreti
$elmasMiktari = 250;

// Kullanıcının elmas miktarını kontrol et
$kontrolSorgusu = "SELECT elmas FROM kullanicilar WHERE id = $kullanici_id";
$kontrolResult = $conn->query($kontrolSorgusu);

if ($kontrolResult->num_rows > 0) {
    $row = $kontrolResult->fetch_assoc();
    $mevcutElmas = $row["elmas"];

    if ($mevcutElmas >= $elmasMiktari) {
        // Elmas yeterli, profil resmini güncelle ve elması düş
        $updateQuery = "UPDATE kullanicilar SET profil_resmi = '$profilResmiLink', elmas = elmas - $elmasMiktari WHERE id = $kullanici_id";

        if ($conn->query($updateQuery) === TRUE) {
            header("Location:../../hata/profil_düzenle/profil_düzenle_başarılı.php");
        } else {
            echo "Veritabanı hatası: " . $conn->error;
        }
    } else {
       header("Location:../../hata/profil_düzenle/yetersiz_elmas.php");
    }
} else {
    echo "Kullanıcı bulunamadı.";
}

$conn->close();
?>
