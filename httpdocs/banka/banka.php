

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
		   
		   
    </style>
<body>
    <div class="container mt-4">
        <div class="row">
        <!-- Üst Bölüm -->
<div class="container my-3">
    <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
        <div class="col-12">
            <h4>BANKA</h4>
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
		
		
		<div class="container">
	
    <div class="row">
		
        <div class="col-md-6 offset-md-3">
			
            <div class="card">
				
				
				
				
                <div class="card-header">
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
                <div class="card mt-1">   
<div class="container mt-1">
    <h2 class="text-center mb-1">Para Yatırma </h2>

    <form action="yatir.php" method="post">
        <div class="mb-1">
            <label for="yatirmaMiktar" class="form-label">Para Yatırma Miktarı:</label>
            <input type="text" class="form-control" id="yatirmaMiktar" name="yatirmaMiktar" required>
        </div>
        <button type="submit" class="btn btn-danger mt-2" name="yatirButton">Para Yatır</button>
    </form>
	<br>
</div>
		</div>		

					 <!-- Para Çekme Formu -->
					 <div class="card mt-1">
                 <div class="container mt-1">
    <h2 class="text-center mb-4">Para Çekme </h2>
    <form action="cek.php" method="post">
        <div class="mb-1">
            <label for="cekMiktar" class="form-label">Para Çekme Miktarı:</label>
            <input type="text" class="form-control" id="yatirmaMiktar" name="cekMiktar" required>
        </div>
        <button type="submit" class="btn btn-danger mt-1" name="cekButton">Para Çek</button>
    </form>
</div>
	<br>
  </div>
					
					

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
                        <button type="submit" class="btn btn-danger">Para Gönder</button>
                    </form>
                </div>
            </div>
        
                </div>
            </div>
        </div>
    </div>
</div>


		
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
