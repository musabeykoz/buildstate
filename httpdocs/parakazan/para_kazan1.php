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

// Zaman dilimi ayarı
date_default_timezone_set('Europe/Istanbul');

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];

// Para kazanma fonksiyonu
function paraTahsilat($kullanici_id, $conn) {
    $sql = "SELECT son_tahsilat FROM kullanicilar WHERE id = $kullanici_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $sonTahsilat = new DateTime($row['son_tahsilat']);
    $now = new DateTime();
    $fark = $now->getTimestamp() - $sonTahsilat->getTimestamp();

    if ($fark >= 60) { // 1 dakika = 60 saniye
        $paraMiktari = 100; // Tahsilat miktarı
        $updateSql = "UPDATE kullanicilar SET para = para + $paraMiktari, son_tahsilat = NOW() WHERE id = $kullanici_id";
        if ($conn->query($updateSql) === TRUE) {
            return ["status" => "success", "message" => "Para tahsil edildi: $paraMiktari", "kalanSure" => 60];
        } else {
            return ["status" => "error", "message" => "Bir hata oluştu."];
        }
    } else {
        $kalanSure = 60 - $fark;
        return ["status" => "warning", "message" => "Bir sonraki tahsilat için beklemeniz gerekiyor.", "kalanSure" => $kalanSure];
    }
}

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = paraTahsilat($kullanici_id, $conn);
    echo json_encode($response);
    exit();
}

$sql = "SELECT para, son_tahsilat FROM kullanicilar WHERE id = $kullanici_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sonTahsilat = new DateTime($row['son_tahsilat']);
$now = new DateTime();
$fark = $now->getTimestamp() - $sonTahsilat->getTimestamp();

$kalanSure = $fark >= 60 ? 0 : 60 - $fark;
$tahsilatDurumu = $kalanSure <= 0 ? "Tahsilat yapabilirsiniz." : "Bir sonraki tahsilat için beklemeniz gerekiyor.";
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Para Kazan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            font-family: Arial, sans-serif;
        }
        .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }
        h4 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }
        #tahsilatButton {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
        }
        #tahsilatButton:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
        #sonuc {
            margin-top: 20px;
            font-size: 16px;
            color: #28a745;
        }
        #sayac {
            font-weight: bold;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="content">
        <h4>Şu anki para: <?= $row['para']; ?> 💵</h4>
        <p id="tahsilatDurumu"><?= $tahsilatDurumu ?></p>
        <button id="tahsilatButton" <?= $kalanSure > 0 ? 'disabled' : '' ?>>Tahsilat Yap</button>
        <p id="sonuc"></p>
        <p id="sayac"><?= $kalanSure > 0 ? 'Kalan süre: ' . gmdate('i:s', $kalanSure) : '' ?></p>
    </div>

    <script>
        var kalanSure = <?= $kalanSure ?>;
        var button = document.getElementById('tahsilatButton');
        var tahsilatDurumu = document.getElementById('tahsilatDurumu');
        var sayac = document.getElementById('sayac');
        var sonuc = document.getElementById('sonuc');

        function startCountdown() {
            if (kalanSure > 0) {
                button.disabled = true;
                var interval = setInterval(function() {
                    kalanSure--;
                    sayac.innerText = "Kalan süre: " + gmdate(kalanSure);

                    if (kalanSure <= 0) {
						 location.reload();
                        clearInterval(interval);
                        button.disabled = false;
                        sayac.innerText = "";
                        tahsilatDurumu.innerText = "Tahsilat yapabilirsiniz.";
                    }
                }, 1000);
            }
        }

        function gmdate(seconds) {
            var minutes = Math.floor(seconds / 60);
            seconds = seconds % 60;
            return (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        }

        startCountdown();

        button.addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    kalanSure = response.kalanSure;
                    tahsilatDurumu.innerText = response.message;
                    sonuc.innerText = response.status === "success" ? "Başarılı!" : response.message;
                    startCountdown();
					
                    // Sayfa yenilensin
                    location.reload();
                }
            };

            xhr.send();
        });
    </script>
</body>
</html>
