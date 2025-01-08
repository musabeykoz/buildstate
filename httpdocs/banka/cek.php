<?php
// Oturumu başlat
session_start();

// Oturum verisini kontrol et
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $cekMiktar = isset($_POST['cekMiktar']) ? floatval($_POST['cekMiktar']) : 0;

    // Yatırma işlemlerini gerçekleştir
    if ($cekMiktar > 0) {
        // Örnek olarak, burada veritabanında kullanıcının hesabını güncelleyebilirsiniz
        // Ayrıca, başka işlemleri gerçekleştirebilir ve hata kontrolleri ekleyebilirsiniz

        // Veritabanına bağlan
        $servername = "localhost:3306";
        $username = "musa";
        $password = "beykoz";
        $dbname = "yapaynetwork";


        $conn = new mysqli($servername, $username, $password, $dbname);

        // Veritabanı bağlantı hatasını kontrol et
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Örnek: Kullanıcının hesabına yatırma miktarını ekleyen SQL sorgusu
       // Kullanıcının ID'si, örneğin oturumdan alınabilir
		
     $sql = "UPDATE kullanicilar SET banka = banka - $cekMiktar, para = para + $cekMiktar WHERE id = $kullanici_id";

        if ($conn->query($sql) === TRUE) {
          header("Location: banka.php");
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }

        // Veritabanı bağlantısını kapat
        $conn->close();
    } else {
        echo "Lütfen geçerli bir miktar girin.";
    }
}
?>
