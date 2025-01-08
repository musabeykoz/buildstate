<?php
session_start();

$servername = "localhost:3306";
$username = "musa";
$password = "beykoz";
$dbname = "yapaynetwork";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if (!isset($_SESSION['kullanici_id'])) {
    exit("Oturum açık değil.");
}

$kullanici_id = $_SESSION['kullanici_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alici_id = (int)$_POST["alici_id"];
    $gonderilen_para = (float)$_POST["gonderilen_para"];

    // Kullanıcının kendi hesabına para göndermesini engelle
    if ($alici_id == $kullanici_id) {
        echo "Kendi hesabınıza para gönderemezsiniz!";
        exit();
    }

    // Gönderenin bakiyesi yeterli mi kontrolü
    $sql_sorgu = $conn->prepare("SELECT banka FROM kullanicilar WHERE id = ?");
    $sql_sorgu->bind_param("i", $kullanici_id);
    $sql_sorgu->execute();
    $result_sorgu = $sql_sorgu->get_result();
    $row_sorgu = $result_sorgu->fetch_assoc();

    if ($row_sorgu && $row_sorgu["banka"] >= $gonderilen_para && $gonderilen_para > 0) {
        // Gönderenin yeni bakiyesi hesaplanır
        $yeni_bakiye_gonderen = $row_sorgu["banka"] - $gonderilen_para;

        // Alıcının mevcut bakiyesini al
        $sql_alici_sorgu = $conn->prepare("SELECT banka FROM kullanicilar WHERE id = ?");
        $sql_alici_sorgu->bind_param("i", $alici_id);
        $sql_alici_sorgu->execute();
        $result_alici_sorgu = $sql_alici_sorgu->get_result();
        $row_alici_sorgu = $result_alici_sorgu->fetch_assoc();

        if ($row_alici_sorgu) {
            $yeni_bakiye_alici = $row_alici_sorgu["banka"] + $gonderilen_para;

            // Bakiyeleri güncelle
            $sql_gonder = $conn->prepare("UPDATE kullanicilar SET banka = ? WHERE id = ?");
            $sql_gonder->bind_param("di", $yeni_bakiye_gonderen, $kullanici_id);

            $sql_alici = $conn->prepare("UPDATE kullanicilar SET banka = ? WHERE id = ?");
            $sql_alici->bind_param("di", $yeni_bakiye_alici, $alici_id);

            if ($sql_gonder->execute() && $sql_alici->execute()) {
                header("Location: banka.php");
            } else {
                echo "Hata: " . $conn->error;
            }
        } else {
            echo "Alıcı bulunamadı!";
        }
    } else {
        echo "Yetersiz bakiye veya geçersiz tutar!";
    }
}

$conn->close();
?>
