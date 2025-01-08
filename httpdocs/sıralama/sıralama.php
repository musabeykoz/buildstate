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
                        <h4>SIRALAMA</h4>
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
    <h2 class="mb-4 text-center" style="color:white;">⸻ ZENGİNLER 💵 ⸻</h2>
    <div class="row justify-content-center">
        <?php
        // En çok itibara sahip olan 5 kişiyi sorgula
        $sqlpara = "SELECT ad, id, para FROM kullanicilar ORDER BY para DESC LIMIT 5";
        $resultpara = $conn->query($sqlpara);

        $rank = 1;
        if ($resultpara->num_rows > 0) {
            while ($rowpara = $resultpara->fetch_assoc()) {
                echo "
                <div class='col-md-3'>
                    <div class='card mb-4'>
                        <div class='card-body text-center'>
                            <img src='../resimler/{$rank}.png' alt='Kullanıcı Resmi' class='rounded-circle mb-2' style='width: 40px; height: 40px;'>
                            <h5 class='card-title'>{$rowpara['ad']}</h5>
                            <p class='card-text'>ID: {$rowpara['id']}</p>
                            <p class='card-text'>💵 Para: {$rowpara['para']}</p>
                        </div>
                    </div>
                </div>";
                $rank++;
            }
        } else {
            echo "<p class='text-center'>Hiç kayıt bulunamadı</p>";
        }
        ?>
    </div>
</div>
		
     <div class="container mt-5">
       <h2 class="mb-4 text-center" style="color:white;">⸻ İTİBAR SAHİPLERİ 👑 ⸻</h2>
    <div class="row justify-content-center">
        <?php
        // En çok itibara sahip olan 5 kişiyi sorgula
        $sqlItibar = "SELECT ad, id, itibar FROM kullanicilar ORDER BY itibar DESC LIMIT 5";
        $resultItibar = $conn->query($sqlItibar);

        $rank = 1;
        if ($resultItibar->num_rows > 0) {
            while ($rowItibar = $resultItibar->fetch_assoc()) {
                echo "
                <div class='col-md-3'>
                    <div class='card mb-4'>
                        <div class='card-body text-center'>
                            <img src='../resimler/{$rank}.png' alt='Kullanıcı Resmi' class='rounded-circle mb-2' style='width: 40px; height: 40px;'>
                            <h5 class='card-title'>{$rowItibar['ad']}</h5>
                            <p class='card-text'>ID: {$rowItibar['id']}</p>
                            <p class='card-text'>👑 İtibar: {$rowItibar['itibar']}</p>
                        </div>
                    </div>
                </div>";
                $rank++;
            }
        } else {
            echo "<p class='text-center'>Hiç kayıt bulunamadı</p>";
        }
        ?>
    </div>
</div>

<pre>



</pre>
        <div class="footer">
            <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
            <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
            <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
        </div>
    </div>
</body>
</html>
