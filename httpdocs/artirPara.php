<?php
session_start();

// Oturum açık değilse çık
if (!isset($_SESSION['kullanici_id'])) {
    exit("Oturum açık değil.");
}

// Kullanıcının oturum kimliğini al
$kullanici_id = $_SESSION['kullanici_id'];

// Veritabanı bağlantısını yap
$servername = "localhost";
$username = "musa"; // Veritabanı kullanıcı adınızı buraya girin
$password = "beykoz"; // Veritabanı parolanızı buraya girin
$dbname = "yapaynetwork"; // Veritabanı adını buraya girin

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kullanıcının parasını bir artırma sorgusu
$sql = "UPDATE kullanicilar SET para = para + 1 WHERE id = $kullanici_id";

if ($conn->query($sql) === TRUE) {
    echo "Para başarıyla artırıldı";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
