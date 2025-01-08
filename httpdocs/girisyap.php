<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

$servername = "localhost:3306";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";

// IP adresini al
$ip = $_SERVER['REMOTE_ADDR'];
$tarih = date("Y-m-d"); // Günün tarihi
$saat = date("H:i:s"); // Saat ve dakika

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $sifre = $_POST['sifre'];

    $sql = "SELECT * FROM kullanicilar WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($sifre, $row['sifre'])) {
            $_SESSION["kullanici_id"] = $row["id"];
            
            // IP adresini güncelle
            $user_id = $_SESSION['kullanici_id'];
            $update_ip_query = "UPDATE kullanicilar SET ip = ? WHERE id = ?";
            $stmt = $conn->prepare($update_ip_query);
            $stmt->bind_param("si", $ip, $user_id);
            $stmt->execute();

            // Giriş logunu kaydetme
            $log_query = "INSERT INTO giris_log (kullanici_adi, ip_adresi, tarih, saat) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($log_query);
            $stmt->bind_param("ssss", $row["mail"], $ip, $tarih, $saat);
            $stmt->execute();

            if ($row["onaylimi"] == "admin") {
                header("Location: admin/admin_sayfasi.php");
                exit();
            }
            header("Location: kullanici.php");
            exit();
        } else {
            header("Location: hata/girisyap/sifre_hatalı.php");
        }
    } else {
        header("Location: hata/girisyap/eposta_hatalı.php");
    }
}

$conn->close();
?>
