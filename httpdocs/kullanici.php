<?php include 'config/config.php'; ?>

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
            <h4>ŞEHİR</h4>
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
                <a href="parakazan/para_kazan.php" class="btn custom-btn">
                    <img src="resimler/para_kazan.png" alt="Avatar">
                    <p>PARA KAZAN</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="depo/depo.php" class="btn custom-btn">
                    <img src="resimler/depo.png" alt="Avatar">
                    <p>DEPO</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="arsalar/arsalar.php" class="btn custom-btn">
                    <img src="resimler/arsalar.png" alt="Avatar">
                    <p>ARSALAR</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="ithalat/ithalat.php" class="btn custom-btn">
                    <img src="resimler/ithalat.png" alt="Avatar">
                    <p>İTHALAT</p>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="banka/banka.php" class="btn custom-btn">
                    <img src="resimler/banka.png" alt="Avatar">
                    <p>BANKA</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="resimler/karargah.png" alt="Avatar">
                    <p>KARARGAH</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="resimler/pazar.png" alt="Avatar">
                    <p>PAZAR</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="resimler/yakında.png" alt="Avatar">
                    <p>YAKINDA...</p>
                </a>
            </div>
        </div>
    </div>
</div>

		 <div class="row">
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="resimler/yakında.png" alt="Avatar">
                    <p>YAKINDA...</p>
                </a>
            </div>
        </div>
       <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="resimler/yakında.png" alt="Avatar">
                    <p>YAKINDA...</p>
                </a>
            </div>
        </div>
         <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="resimler/yakında.png" alt="Avatar">
                    <p>YAKINDA...</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card custom-card">
                <a href="#" class="btn custom-btn">
                    <img src="resimler/yakında.png" alt="Avatar">
                    <p>YAKINDA...</p>
                </a>
            </div>
        </div>
    </div>
		
         <div class="footer">
       <div class="footer">
    <a href="sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
    <a href="kullanici.php" class="btn btn-secondary">Şehir</a>
    <a href="mekan/mekan.php" class="btn btn-secondary">Mekan</a>
</div>
    </div>
	<pre>
	
	
	</pre>

 

	
</body>
	
</html>
