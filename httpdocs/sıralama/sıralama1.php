<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En Çok Paraya Sahip Olan 5 Kişi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <a href="../kullanici.php" class="btn btn-primary">Geri Dön</a>
    <h2 class="mb-4">ZENGİNLER 💵</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Sırası</th>
            <th scope="col">İd</th>
            <th scope="col">ad</th>
            <th scope="col">Para</th>
        </tr>
        </thead>
        <tbody>

        <?php
        // MySQL bağlantısı
        $servername = "localhost:3306";
        $username = "musa";
        $password = "beykoz";
        $dbname = "yapaynetwork";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Bağlantı hatası: " . $conn->connect_error);
        }

        // En çok paraya sahip olan 5 kişiyi sorgula
        $sql = "SELECT ad, id, para FROM kullanicilar ORDER BY para DESC LIMIT 5";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $rank = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'>$rank</th>
                        <td>{$row['id']}</td>
                        <td>{$row['ad']}</td>
                        <td>{$row['para']}</td>
                      </tr>";
                $rank++;
            }
        } else {
            echo "<tr><td colspan='4'>Hiç kayıt bulunamadı</td></tr>";
        }

        ?>

        </tbody>
    </table>
</div>

<br>

<!-- İkinci -->
<div class="container mt-5">
    
    <h2 class="mb-4">İtibar Sahipleri 👑</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Sırası</th>
            <th scope="col">İd</th>
            <th scope="col">ad</th>
            <th scope="col">İtibar</th>
        </tr>
        </thead>
        <tbody>

        <?php
        // En çok itibara sahip olan 5 kişiyi sorgula
        $sqlItibar = "SELECT ad, id, itibar FROM kullanicilar ORDER BY itibar DESC LIMIT 5";
        $resultItibar = $conn->query($sqlItibar);

        if ($resultItibar->num_rows > 0) {
            $rank = 1;
            while ($rowItibar = $resultItibar->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'>$rank</th>
                        <td>{$rowItibar['id']}</td>
                        <td>{$rowItibar['ad']}</td>
                        <td>{$rowItibar['itibar']}</td>
                      </tr>";
                $rank++;
            }
        } else {
            echo "<tr><td colspan='4'>Hiç kayıt bulunamadı</td></tr>";
        }

        $conn->close();
        ?>

        </tbody>
    </table>
</div>

</body>
</html>
