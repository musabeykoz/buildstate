<?php 
include '../config/config.php'; 
session_start();

// Veritabanı bağlantısı
$servername = "localhost:3306";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası.");
}

// Kullanıcı giriş kontrolü
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];

// Kullanıcının para, elmas, banka ve itibar değerlerini almak için sorgu
$sql = $conn->prepare("SELECT para, elmas, banka, itibar, demir, odun, plastik, petrol FROM kullanicilar WHERE id = ?");
$sql->bind_param("i", $kullanici_id);
$sql->execute();
$result = $sql->get_result();
$row = $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
$para = $row['para'] ?? 0;

// Ürünlerin tanımlanması (isim, fiyat ve form action)
$urunler = [
    ["isim" => "Demir ⚙️", "fiyat" => 15, "form_action" => "satinal.php?urun=demir", "miktar" => $row['demir'] ?? 0],
    ["isim" => "Odun 🌳", "fiyat" => 9, "form_action" => "satinal.php?urun=odun", "miktar" => $row['odun'] ?? 0],
    ["isim" => "Plastik 🧣", "fiyat" => 2, "form_action" => "satinal.php?urun=plastik", "miktar" => $row['plastik'] ?? 0],
    ["isim" => "Petrol 🛢", "fiyat" => 2, "form_action" => "satinal.php?urun=petrol", "miktar" => $row['petrol'] ?? 0]
];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İthalat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
        .item-card {
            margin-bottom: 20px; /* Kartlar arasındaki boşluk */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="container my-3">
            <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
                <div class="col-12">
                    <h4>İthalat 📥</h4>
                </div>
                <div class="col-6 col-md-3 my-2">
                    <p>💵: <?= htmlspecialchars($row["para"] ?? 0); ?></p>
                </div>
                <div class="col-6 col-md-3 my-2">
                    <p>💎: <?= htmlspecialchars($row["elmas"] ?? 0); ?></p>
                </div>
                <div class="col-6 col-md-3 my-2">
                    <p>💳: <?= htmlspecialchars($row["banka"] ?? 0); ?></p>
                </div>
                <div class="col-6 col-md-3 my-2">
                    <p>👑: <?= htmlspecialchars($row["itibar"] ?? 0); ?></p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <a href="../kullanici.php" class="btn btn-primary mb-3">Geri Dön</a>
            <div class="row">
                <?php foreach ($urunler as $urun): ?>
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card item-card" style="width: 100%; max-width: 300px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($urun['isim']) ?> - Fiyat: <?= htmlspecialchars($urun['fiyat']) ?>💵</h5>
                                <!-- Ürünün mevcut miktarını gösterme -->
                                <p>Mevcut miktar: <?= htmlspecialchars($urun['miktar']) ?></p>
                                <form method="post" action="<?= htmlspecialchars($urun['form_action']) ?>">
                                    <div class="input-group mb-3">
                                        <input type="number" name="miktar" class="form-control" placeholder="Ne kadar lazım?" min="1" required>
                                        <button type="submit" class="btn btn-primary">Satın Al</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="footer">
            <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
            <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
            <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Veritabanı bağlantısını kapatma
$conn->close();
?>
