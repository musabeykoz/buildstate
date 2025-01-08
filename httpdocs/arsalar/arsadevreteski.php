<?php
session_start(); // Oturumu başlat

// Oturum açık mı kontrol et
if(!isset($_SESSION['kullanici_id'])) {
    header("Location: giris.php"); // Kullanıcı oturum açmadıysa giriş sayfasına yönlendir
    exit;
}

// MySQL bağlantısı
$servername = "localhost";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";

// Bağlantı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

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
            echo '<div class="alert alert-success" role="alert">Arsa başarıyla devredildi.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Hata: ' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Bu arsa size ait değil veya böyle bir arsa bulunamadı.</div>';
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsa Devir Sistemi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
			<a href="arsalarım.php" class="btn btn-primary">Geri Dön</a>
            <div class="card-body">
                <h2 class="card-title">Arsa Devret</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="devredecegi_arsa_id">Devredeceğiniz Arsa ID'si:</label>
                        <input type="text" class="form-control" id="devredecegi_arsa_id" name="devredecegi_arsa_id" required>
                    </div>
                    <div class="form-group">
                        <label for="devredecegi_kullanici_id">Devredeceğiniz Kişi ID'si:</label>
                        <input type="text" class="form-control" id="devredecegi_kullanici_id" name="devredecegi_kullanici_id" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Arsa Devret</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
