<?php include '../../config/config.php'; ?>
<?php
session_start();

$servername = "localhost:3306";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];

$sql = "SELECT id, ad, soyad, mail, onaylimi, telefon, premium, para, elmas,banka,demir,odun,plastik,petrol,bor,elektrik FROM kullanicilar WHERE id = $kullanici_id";
$result = $conn->query($sql);

$row = $result && $result->num_rows > 0 ? $result->fetch_assoc() : [];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	
	<link href="buton.css" rel="stylesheet">
</head>
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
<body>
    <div class="container mt-4">
        <div class="row">
        <!-- Üst Bölüm -->
<div class="container my-3">
    <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
        <div class="col-12">
            <h4>Profili Düzenle</h4>
        </div>
        <div class="col-6 col-md-3 my-2">
            <p>💵: <span id="para"><?= $row["para"] ?? 0; ?></span></p>
        </div>
        <div class="col-6 col-md-3 my-2">
            <p>💎: <?= $row["elmas"] ?? 0; ?></p>
        </div>
        <div class="col-6 col-md-3 my-2">
            <p>💳: <?= $row["banka"] ?? 0; ?></p>
        </div>
        <div class="col-6 col-md-3 my-2">
            <p>👑: <?= $row["itibar"] ?? 0; ?></p>
        </div>
    </div>
</div>

        </div>
		
		<div class="card mb-3">
    <div class="card-body">
        <h2 class="card-title">Profil Resmi Güncelleme</h2>
		 <p>Profil Resmi Değiştirme Ücreti 💎250 dır.</p>
        <form method="post" action="profil_resmi_guncelle.php">
            <div class="form-group">
                <label for="profilResmiLink">Profil Resmi URL'si:</label>
                <input type="text" class="form-control" name="profilResmiLink" placeholder="Resim linkini girin" required>
            </div>
            <br>
            <button type="submit" class="btn btn-secondary btn-block">Profil Resmini Güncelle</button>
        </form>
    </div>
</div>

		
	    <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Ad Güncelleme</h2>
                        <p>Ad Değiştirme Ücreti 💎250 dır.</p>
                        <form method="post" action="addegiş.php">
                            <div class="form-group">
                                <label for="newName">Yeni Ad:</label>
                                <input type="text" class="form-control" name="newName" required>
                            </div>
							<br>
                            <button type="submit" class="btn btn-secondary btn-block">Adı Güncelle</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Soyad Güncelleme</h2>
                        <p>Ad Değiştirme Ücreti 💎250 dır.</p>
                        <form method="post" action="soyaddegiş.php">
                            <div class="form-group">
                                <label for="newName">Yeni Soyad:</label>
                                <input type="text" class="form-control" name="newName" required>
                            </div>
							<br>
                            <button type="submit" class="btn btn-secondary btn-block">Soyadı Güncelle</button>
                        </form>
                    </div>
                </div>

		
         <div class="footer">
       <div class="footer">
    <a href="../../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
    <a href="../../kullanici.php" class="btn btn-secondary">Şehir</a>
    <a href="../../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
</div>
    </div>
	<pre>
	
	
	</pre>

 

	
</body>
	
</html>
