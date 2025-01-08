<?php
 include '../config/config.php';
// Formdan gelen verileri al
$ad = $_POST['ad'];
$mesaj = $_POST['mesaj'];

// Veritabanına mesajı ekle
$sql = "INSERT INTO destek (ad, mesaj) VALUES ('$ad', '$mesaj')";

if ($conn->query($sql) === TRUE) {
header("Location: ../hata/destek/destek_başarılı.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
