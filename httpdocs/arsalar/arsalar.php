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
                        <h4>ARSALAR</h4>
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
            <a href="arsalarım.php" class="btn btn-primary">Arsalarım</a>
            <hr>

            <div class="row">
                <?php
                // Karakter kodlamasını belirt
                $conn->set_charset("utf8mb4");

                // Veritabanından verileri çek
           $sql = "SELECT * FROM arsalar WHERE sahibi = 'yok' ORDER BY id DESC";


                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Verileri kart şeklinde ekrana yazdır
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='col-lg-2 col-md-4 col-6 mb-3'>"; // col-lg-2 for 5 cards on large screens, col-md-4 for 3 cards on medium screens, col-6 for 2 cards on mobile
                        // Kart tasarımı bölümü
                        echo "<div class='card mb-4' style='background-color: #DDD; border-radius: 10px; height: 400px;'>";
                        // Resim tasarımı bölümü
                        echo "<img style='border-radius: 10px; height: 180px; padding: 10px;' class='card-img-top' src='" . $row["arsa_resim"] . "' alt='Arsa Resmi'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row["arsa_adi"] . "</h5>";
                        echo "<p class='card-text'><strong>Arsa id:</strong> " . $row["id"] . "</p>";
                        echo "<p class='card-text'><strong>Sahibi:</strong> " . $row["sahibi"] . "</p>";
                        echo "<p class='card-text'><strong>Bölge:</strong> " . $row["bolge"] . "</p>";
                        echo "<p class='card-text'><strong>Arsa Alanı:</strong> " . $row["arsa_alani"] . " m²</p>";
                        echo "</div></div><br></div>";
                    }
                } else {
                    echo "<p>Henüz hiç arsa eklenmedi.</p>";
                }
                $conn->close();
                ?>
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
