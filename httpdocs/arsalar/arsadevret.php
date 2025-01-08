<?php include '../config/config.php'; 
session_start(); // Oturumu başlat



// Form gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $devredecegi_arsa_id = $_POST['devredecegi_arsa_id'];
    $devredecegi_kullanici_id = $_POST['devredecegi_kullanici_id'];
    $oturum_acan_kullanici_id = $_SESSION['kullanici_id']; // Oturum açan kullanıcının ID'si

    // Devredeceği arsanın sahibini kontrol et
    $check_owner_sql = "SELECT * FROM arsalar WHERE id='$devredecegi_arsa_id' AND sahibi='$oturum_acan_kullanici_id'";
    $result = $conn->query($check_owner_sql);


	
	if ($result->num_rows > 0) {
    // Arsa kullanıcıya ait ise güncelleme işlemini yap  
    $update_sql = "UPDATE arsalar SET sahibi='$devredecegi_kullanici_id' WHERE id='$devredecegi_arsa_id'";
    if ($conn->query($update_sql) === TRUE) {
        // Başarılı işlem: Başarı mesajı ile yönlendir . Arsa başarıyla devredildi.
        header("Location:../hata/arsa/arsa_devret_başarılı.php");
    } else {
        // Hata: Hata mesajı ile yönlendir
        echo "($conn->error)";

    }
} else {
    // Hata: Arsa bulunamadı veya yetkisiz işlem mesajı ile yönlendir.Bu arsa size ait değil veya böyle bir arsa bulunamadı.
    header("Location: ../hata/arsa/arsa_devret_başarısız.php");
}
	
	
	
	
	
	
	
	
}
$conn->close();
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
                        <h4>ARSA DEVRET</h4>
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
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card">
            
                <div class="card-body">
                    <h2 class="card-title">Arsa Devret</h2>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <label for="devredecegi_arsa_id">Devredeceğiniz Arsa ID'si:</label>
                            <input type="text" class="form-control" id="devredecegi_arsa_id" name="devredecegi_arsa_id" required>
                        </div>
                        <div class="form-group">
                            <label for="devredecegi_kullanici_id">Devredeceğiniz Kişi ID'si:</label>
                            <input type="text" class="form-control" id="devredecegi_kullanici_id" name="devredecegi_kullanici_id" required>
                        </div>
						<br>
                        <button type="submit" class="btn btn-secondary">Arsa Devret</button>
                    </form>
                </div>
            </div>
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
