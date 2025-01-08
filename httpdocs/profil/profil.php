
<?php
include '../config/config.php';

// Kullanıcı oturum kontrolü
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.html");
    exit();
}

$kullanici_id = $_SESSION['kullanici_id'];

// Kullanıcı bilgilerini almak için SQL sorgusu
$sql = "SELECT id, ad, soyad, mail, onaylimi, telefon, premium, para, elmas, banka, itibar FROM kullanicilar WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $kullanici_id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result && $result->num_rows > 0 ? $result->fetch_assoc() : [];

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	
	<link href="../buton.css" rel="stylesheet">
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
		   
		  .profil-resmi img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff; /* İsteğe bağlı: Beyaz bir çerçeve */
}
 
    </style>
<body>
    <div class="container mt-4">
        <div class="row">
        <!-- Üst Bölüm -->
<div class="container my-3">
    <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
        <div class="col-12">
            <h4>PROFİL</h4>
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
		
		
	<div class="container mt-5">
    <div class="card">
		
		
       <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Kullanıcı Profili</h5>

    <!-- Oturumu Kapat Butonu -->
    <div>
        <a href="düzenle/düzenle.php" class="btn btn-secondary me-2">Profilimi Düzenle</a>
        <form action="../oturumkapat.php" method="post" class="d-inline">
            <button type="submit" class="btn btn-danger">Oturumu Kapat 👋🏻</button>
        </form>
    </div>
</div>

        <div class="card-body">
			 <div class="col-12 my-2">
            <div class="profil-resmi">
                <img src="<?= $row['profil_resmi'] ?? '../resimler/profil.png'; ?>" alt="Profil Resmi">
            </div>
        </div>
            <h5 class="card-title"><?= $userData['ad'] . ' ' . $userData['soyad'] ?></h5>
            <p class="card-text">E-posta: <?= $userData['mail'] ?></p>
            <p class="card-text">Telefon: <?= $userData['telefon'] ?></p>
            <p class="card-text">Premium Üye: <?= $userData['premium'] ? 'Evet' : 'Hayır'; ?></p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Kullanıcı Ara
        </div>
        <div class="card-body">
            <form action="kul_ara.php" method="post">
                <div class="form-group mb-3">
                    Kullanıcı İd:
					<br>
                    <input type="text" class="form-control" name="userId" required>
                </div>
                <button type="submit" class="btn btn-secondary">Ara</button>
            </form>
        </div>
    </div>
</div>



		
         
       <div class="footer">
    <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
    <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
    <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
</div>
  
	<pre>
	
	
	</pre>

 


	
</body>
	
</html>
