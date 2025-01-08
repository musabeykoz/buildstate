






<?php include '../config/config.php'; ?>

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
		   
		   .profil-resmi img {
    width: 100px;
    height:100px;
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
            <h4>KULLANICI ARA</h4>
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
		<a href="profil.php" class="btn btn-danger">Geri Dön</a>
		
		<?php
       

        // Formdan gelen kullanıcı ID'sini al
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Güvenliğe yönelik olarak kullanıcı girdisini kontrol etme
            $userId = mysqli_real_escape_string($conn, $_POST["userId"]);

            // Prepared statement kullanarak kullanıcı bilgilerini al
            $getUserQuery = "SELECT * FROM kullanicilar WHERE id = ?";
            $stmt = $conn->prepare($getUserQuery);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();
                ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Kullanıcı Bilgileri</h5>
						
						 <div class="col-12 my-2">
            <div class="profil-resmi">
                <img src="<?= $userData["profil_resmi"] ?? '../resimler/profil.png'; ?>" alt="Profil Resmi">
            </div>
        </div>
                        <p class="card-text"><strong>Adı:</strong> <?php echo $userData["ad"]; ?></p>
                        <p class="card-text"><strong>Soyadı:</strong> <?php echo $userData["soyad"]; ?></p>
                        <p class="card-text"><strong>Premium:</strong> <?php echo $userData["premium"]; ?></p>
                        <p class="card-text"><strong>Para:</strong> <?php echo $userData["para"]; ?></p>
                       
                    </div>
                </div>
                <?php
            } else {
                echo "<p class='mt-3'>Kullanıcı bulunamadı.</p>";
            }

            $stmt->close();
        }

        // Bağlantıyı kapat
        $conn->close();
        ?>

		
         <div class="footer">
       <div class="footer">
    <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
    <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
    <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
</div>
    </div>
	<pre>
	
	
	</pre>



	
</body>
	
</html>
