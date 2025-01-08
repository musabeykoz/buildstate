<?php
// Oturumu başlat
session_start();

$servername = "localhost:3306";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";

$conn = new mysqli($servername, $username, $password, $dbname);

// Oturum verisini kontrol et
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];

// SQL sorgusunu çalıştır
$sql = "SELECT id, banka FROM kullanicilar WHERE id = $kullanici_id";
$result = $conn->query($sql);

// Eğer sorgu başarılı ise $row değişkenini oluştur
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    // Hata durumunda yapılacak işlemler
    echo "Kullanıcı bilgileri alınamadı.";
    exit(); // Hata durumunda sayfayı sonlandır
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banka Web Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
          body {
            background-image: url('https://cdn.pixabay.com/photo/2015/08/29/20/21/safe-913452_1280.jpg'); /* Arkaplan resminin dosya adını buraya ekleyin */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Diğer stillendirme kodlarını buraya ekleyebilirsiniz */
        .container {
            margin-top: 50px;
			opacity:0.9;
        }
		.row{
		opacity:1;}
    </style>
</head>
	
<body>

<div class="container">
	
    <div class="row">
		
        <div class="col-md-6 offset-md-3">
			
            <div class="card">
				
                <div class="card-header">
					<a href="../kullanici.php" class="btn btn-primary">Geri Dön</a>
                    <h3 class="text-center">Banka Hesap Bilgileri 🏛️</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="hesapNo" class="form-label">Hesap Numarası(İD):</label>
                         <p class="d-inline-block "> <span id="para"><?= $row["id"] ?? 0; ?></span></p>
                    </div>
                    <div class="mb-3">
                        <label for="bakiye" class="form-label">Hesap Bakiyesi:</label>
                         <p class="d-inline-block ">💳: <span id="banka"><?= $row["banka"] ?? 0; ?></span></p>
                    </div>

                    <!-- Para Yatırma Formu -->
                   
<div class="container mt-1">
    <h2 class="text-center mb-1">Para Yatırma </h2>

    <form action="yatir.php" method="post">
        <div class="mb-1">
            <label for="yatirmaMiktar" class="form-label">Para Yatırma Miktarı:</label>
            <input type="text" class="form-control" id="yatirmaMiktar" name="yatirmaMiktar" required>
        </div>
        <button type="submit" class="btn btn-success mt-2" name="yatirButton">Para Yatır</button>
    </form>
</div>

                    <!-- Para Çekme Formu -->
                 <div class="container mt-1">
    <h2 class="text-center mb-4">Para Çekme </h2>

    <form action="cek.php" method="post">
        <div class="mb-1">
            <label for="cekMiktar" class="form-label">Para Çekme Miktarı:</label>
            <input type="text" class="form-control" id="yatirmaMiktar" name="cekMiktar" required>
        </div>
        <button type="submit" class="btn btn-info mt-1" name="cekButton">Para Çek</button>
    </form>
</div>
<br>
                    <!-- Para Gönderme Formu -->
                 <!-- Para Gönderme Formu -->

			
            <div class="card mt-1">
                <div class="card-body">
                    <h2 class="mb-4">Para Gönder </h2>
                    <form id="para-gonder-form" method="post" action="paragonder1.php">
                        <div class="mb-3">
                            <label for="alici_id" class="form-label">Alıcı Kullanıcı ID:</label>
                            <input type="text" class="form-control" id="alici_id" name="alici_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="gonderilen_para" class="form-label">Gönderilecek Miktar:</label>
                            <input type="number" class="form-control" id="gonderilen_para" name="gonderilen_para" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Para Gönder</button>
                    </form>
                </div>
            </div>
        
                </div>
            </div>
        </div>
    </div>
</div>

	
	
	
	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
