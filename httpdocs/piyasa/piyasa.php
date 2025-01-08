<?php 
include '../config/config.php'; 

// Kullanıcı bilgilerini almak için SQL sorgusu
$userId = $_SESSION['kullanici_id'];
$sql = "SELECT * FROM kullanicilar WHERE id = $userId";
$result = $conn->query($sql);

// Kullanıcı bilgilerini kontrol et
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    // Kullanıcı bilgileri burada kullanılabilir
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="buton.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://cdn.pixabay.com/photo/2022/01/18/16/49/town-6947538_1280.jpg');
            background-size: cover;
            background-position: center;
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
        .footer .btn {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="container my-3">
                <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
                    <div class="col-12">
                        <h4>KÜRESEL PİYASA DURUMU</h4>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>💵: <span id="para"><?= $userData["para"] ?? 0; ?></span></p>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>💎: <?= $userData["elmas"] ?? 0; ?></p>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>💳: <?= $userData["banka"] ?? 0; ?></p>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>👑: <?= $userData["itibar"] ?? 0; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="card">
                
                <div class="card-body">
                    <!-- KÜRESEL SERMAYEYİ GÖSTERİR -->
                    <?php
                    // SQL sorgusu
                    $sql = "SELECT SUM(para) AS toplam FROM kullanicilar";
                    $result = $conn->query($sql);
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
                    $sql = "SELECT SUM(demir) AS toplam FROM kullanicilar";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Demir:⚙️ " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
                    <hr>
                    <!-- KÜRESEL ODUNU GÖSTERİR -->
                    <?php
                    $sql = "SELECT SUM(odun) AS toplam FROM kullanicilar";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Odun:🌳 " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
                    <hr>
                    <!-- KÜRESEL PETROLU GÖSTERİR -->
                    <?php
                    $sql = "SELECT SUM(petrol) AS toplam FROM kullanicilar";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Petrol:🛢 " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
                    <hr>
                    <!-- KÜRESEL BOR MADENİ GÖSTERİR -->
                    <?php
                    $sql = "SELECT SUM(bor) AS toplam FROM kullanicilar";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Küresel Bor:☁️ " . $row["toplam"] . "</p>";
                    } else {
                        echo "<p>Sonuç bulunamadı</p>";
                    }
                    ?>
                    <hr>
                    <!-- KÜRESEL ELEKTRİK GÖSTERİR -->
                    <?php
                    $sql = "SELECT SUM(elektrik) AS toplam FROM kullanicilar";
                    $result = $conn->query($sql);
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
        <div class="footer">
            <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
            <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
            <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
        </div>
    </div>
</body>
</html>
<?php
} else {
    echo "Kullanıcı bulunamadı.";
}
?>
