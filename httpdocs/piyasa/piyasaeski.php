<?php
session_start();

// Kullanıcı oturum açmış mı kontrol et
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: login.php"); // Kullanıcı oturum açmamışsa, giriş sayfasına yönlendir
    exit();
}

// Veritabanı bağlantı bilgileri
$servername = "localhost:3306";
$username = "";
$password = "";
$dbname = "";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// Kullanıcı bilgilerini almak için SQL sorgusu
$userId = $_SESSION['kullanici_id'];
$sql = "SELECT * FROM kullanicilar WHERE id = $userId";
$result = $conn->query($sql);

// Kullanıcı bilgilerini kontrol et
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil Kartı</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <a href="../kullanici.php" class="btn btn-primary">Geri Dön</a><br> Küresel Piyasalar
                </div>
                <div class="card-body">
                  
                    <!-- KÜRESEL SERMAYEYİ GÖSTERİR -->
                    <?php
                    // SQL sorgusu
                    $sql = "SELECT SUM(para) AS toplam FROM kullanicilar";

                    // Sorguyu çalıştır ve sonucu al
                    $result = $conn->query($sql);

                    // Sonucu kontrol et ve ekrana yazdır
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Sermaye:💵 " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
					<hr>
					 <!-- KÜRESEL DEMİRİ GÖSTERİR -->
                    <?php
                    // SQL sorgusu
                    $sql = "SELECT SUM(demir) AS toplam FROM kullanicilar";

                    // Sorguyu çalıştır ve sonucu al
                    $result = $conn->query($sql);

                    // Sonucu kontrol et ve ekrana yazdır
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Demir:⚙️ " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
					 <!-- KÜRESEL ODUNU GÖSTERİR -->
                    <?php
                    // SQL sorgusu
                    $sql = "SELECT SUM(odun) AS toplam FROM kullanicilar";

                    // Sorguyu çalıştır ve sonucu al
                    $result = $conn->query($sql);

                    // Sonucu kontrol et ve ekrana yazdır
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Odun:🌳 " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
					 <!-- KÜRESEL PETROLU GÖSTERİR -->
                    <?php
                    // SQL sorgusu
                    $sql = "SELECT SUM(petrol) AS toplam FROM kullanicilar";

                    // Sorguyu çalıştır ve sonucu al
                    $result = $conn->query($sql);

                    // Sonucu kontrol et ve ekrana yazdır
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Petrol:🛢 " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
					 <!-- KÜRESEL BOR MADENİ GÖSTERİR -->
                    <?php
                    // SQL sorgusu
                    $sql = "SELECT SUM(bor) AS toplam FROM kullanicilar";

                    // Sorguyu çalıştır ve sonucu al
                    $result = $conn->query($sql);

                    // Sonucu kontrol et ve ekrana yazdır
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Bor:☁️ " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
					 <!-- KÜRESEL ELEKTRİK GÖSTERİR -->
                    <?php
                    // SQL sorgusu
                    $sql = "SELECT SUM(elektrik) AS toplam FROM kullanicilar";

                    // Sorguyu çalıştır ve sonucu al
                    $result = $conn->query($sql);

                    // Sonucu kontrol et ve ekrana yazdır
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Elektrik:💡 " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <?php
        // Veritabanı bağlantısını kapat
        $conn->close();
        ?>
    </body>
    </html>

    <?php
} else {
    echo "Kullanıcı bulunamadı.";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
