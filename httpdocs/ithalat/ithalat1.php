<?php 
session_start();
$servername = "localhost:3306";
$username = "";
$password = "";
$dbname = "";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası.");
}

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];
$sql = $conn->prepare("SELECT para FROM kullanicilar WHERE id = ?");
$sql->bind_param("i", $kullanici_id);
$sql->execute();
$result = $sql->get_result();
$row = $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
$para = $row['para'] ?? 0;

$urunler = [
    ["isim" => "Demir ⚙️", "fiyat" => 15, "form_action" => "satinal.php?urun=demir"],
    ["isim" => "Odun 🌳", "fiyat" => 9, "form_action" => "satinal.php?urun=odun"],
	["isim" => "Plastik 🧣", "fiyat" => 2, "form_action" => "satinal.php?urun=plastik"]
];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>İthalat</title>
    <style>
        body {
            background-image: url('https://cdn.pixabay.com/photo/2019/04/26/07/14/store-4156934_1280.png');
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">İthalat 📥</h2>
    <a href="../kullanici.php" class="btn btn-primary">Geri Dön</a>
    <p class="d-inline-block mx-3">💵: <span id="para"><?= htmlspecialchars($para); ?></span></p>
    <div class="row">
        <?php foreach ($urunler as $urun): ?>
            <div class="col-md-4">
                <div class="card item-card">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($urun['isim']) ?> Tane Fiyatı: <?= htmlspecialchars($urun['fiyat']) ?>💵</h5>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 

<?php
$conn->close();
?>
