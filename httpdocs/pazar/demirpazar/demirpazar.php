<?php
session_start();


// Veritabanı bağlantısı
$servername = "localhost:3306";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kullanıcının odun stoğunu ve bakiyesini al
$receiverUserId = $_SESSION["kullanici_id"];

$getReceiverStockQuery = "SELECT demir, para FROM kullanicilar WHERE id = $receiverUserId";
$resultReceiver = $conn->query($getReceiverStockQuery);

if ($resultReceiver->num_rows > 0) {
    $rowReceiver = $resultReceiver->fetch_assoc();
    $currentReceiverStock = $rowReceiver["demir"];
    $currentReceiverMoney = $rowReceiver["para"];
} else {
    echo "<script>alert('Kullanıcı bulunamadı.');</script>";
    exit(); // Kodun devamını çalıştırma
}

// Gönderen kullanıcının stoğunu al
$senderUserId = 1;
$getSenderStockQuery = "SELECT demir FROM kullanicilar WHERE id = $senderUserId";
$resultSender = $conn->query($getSenderStockQuery);

if ($resultSender->num_rows > 0) {
    $rowSender = $resultSender->fetch_assoc();
    $currentSenderStock = $rowSender["demir"];
} else {
    echo "<script>alert('Gönderen kullanıcı bulunamadı.');</script>";
    exit(); // Kodun devamını çalıştırma
}

// Kullanıcının gönderdiği satın alma isteğini kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST["quantity"];
    $unitPrice = 12; // Her bir ürün için fiyat

    if ($currentSenderStock >= $quantity) {
        // Stok yeterli, transfer işlemi gerçekleştir
        $newSenderStock = $currentSenderStock - $quantity;
        $newReceiverStock = $currentReceiverStock + $quantity;

        // Para kontrolü
        $requiredMoney = $quantity * $unitPrice; // Transfer edilen miktar kadar para gerekiyor

        if ($currentReceiverMoney >= $requiredMoney) {
            // Alıcı yeterli paraya sahip, para çek ve işlemi tamamla
            $newReceiverMoney = $currentReceiverMoney - $requiredMoney;
            $updateReceiverMoneyQuery = "UPDATE kullanicilar SET para = $newReceiverMoney WHERE id = $receiverUserId";

            // Stokları güncelle
            $updateSenderStockQuery = "UPDATE kullanicilar SET demir = $newSenderStock WHERE id = $senderUserId";
            $updateReceiverStockQuery = "UPDATE kullanicilar SET demir = $newReceiverStock WHERE id = $receiverUserId";

            if ($conn->query($updateSenderStockQuery) === TRUE &&
                $conn->query($updateReceiverStockQuery) === TRUE &&
                $conn->query($updateReceiverMoneyQuery) === TRUE) {
                // Transfer işlemi başarılı. Yeni stoklar ve para miktarını ekrana yazdır
                echo "<script>alert('Transfer işlemi başarılı. Yeni stoklar: Gönderen($senderUserId): $newSenderStock, Alıcı($receiverUserId): $newReceiverStock. Yeni Para: $newReceiverMoney TL');</script>";

                // Geriye kalan stoğu ve bakiyeyi ekrana yazdır
                echo "<p>Geriye kalan Stoğunuz: $newSenderStock adet</p>";
                echo "<p>Güncel Bakiyeniz: $newReceiverMoney TL</p>";

                header("Location: ../kullanici.php");
            } else {
                echo "<script>alert('Hata oluştu: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Yetersiz bakiye. Transfer işlemi gerçekleştirilemedi.');</script>";
        }
    } else {
        echo "<script>alert('Yetersiz stok. Transfer işlemi gerçekleştirilemedi.');</script>";
    }
}

// Bağlantıyı kapat
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pazar Sistemi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
	<style>
	  body {
            background-image: url('https://cdn.pixabay.com/photo/2014/08/09/11/34/architecture-414035_1280.jpg'); /* Arkaplan resminin dosya adını buraya ekleyin */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
	</style>
<body>
<div class="container mt-5">
    <div class="card col-md-6 mx-auto">
        <div class="card-body"> 
			   <a href="../kullanici.php" class="btn btn-primary">Geri Dön</a>
            <h2 class="card-title">Demir pazarı ⚙️</h2>
   <p class="price-label">Fiyat:💵12</p>
            <div class="user-info">
                <p class="balance-label">Mevcut Bakiye:💵<?php echo $currentReceiverMoney; ?> </p>
         
                <p class="current-stock">Mevcut Stoğumuz: <?php echo $currentSenderStock; ?> adet</p>
            </div>
            <hr>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="quantity">Transfer Edilecek Miktar:</label>
                    <input type="number" class="form-control" name="quantity" min="0" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Transfer Et</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS ve Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>