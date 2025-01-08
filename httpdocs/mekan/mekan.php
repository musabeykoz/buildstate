<?php include '../config/config.php'; ?>

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
		   
		   
    </style>
<body>
    <div class="container mt-4">
        <div class="row">
        <!-- Üst Bölüm -->
<div class="container my-3">
    <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
        <div class="col-12">
            <h4>MEKAN</h4>
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
		
		
		<div class="container mt-4">
    <div class="row">
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="../profil/profil.php" class="btn custom-btn">
					 <div class="col-12 my-2">
            <div class="profil-resmi">
                <img src="<?= $row['profil_resmi'] ?? '../resimler/profil.png'; ?>" alt="Profil Resmi">
            </div>
        </div>
                    
                    <p>PROFİL</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="../sıralama/sıralama.php" class="btn custom-btn">
                    <img src="../resimler/sıralama.png" alt="Avatar">
                    <p>SIRALAMA</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="../piyasa/piyasa.php" class="btn custom-btn">
                    <img src="../resimler/küresel_piyasa.png" alt="Avatar">
                    <p>KÜRESEL PİYASA</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="../hakkında/hakkında.php" class="btn custom-btn">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6dAzBOXd2XO_h6g0Wy-S51BoywzM-knNExg&s" alt="Avatar">
                    <p>OYUN HAKKINDA</p>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="../destek/destek.php" class="btn custom-btn">
                    <img src="../resimler/destek.png" alt="Avatar">
                    <p>DESTEK</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="../resimler/koperatif.png" alt="Avatar">
                    <p>KOPARATİF</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="../resimler/yakında.png" alt="Avatar">
                    <p>YAKINDA...</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="../resimler/yakında.png" alt="Avatar">
                    <p>YAKINDA...</p>
                </a>
            </div>
        </div>
    </div>
</div>

		
         <div class="footer">
       <div class="footer">
    <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
    <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
    <a href="mekan.php" class="btn btn-secondary">Mekan</a>
</div>
    </div>
	<pre>
	
	
	</pre>

</body>
	
</html>
