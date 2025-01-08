<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost:3306";
    $username = "";
    $password = "";
    $dbname = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    if (!isset($_SESSION['kullanici_id'])) {
        header("Location: girisyap.html");
        exit();
    }

    $kullanici_id = $_SESSION['kullanici_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (sender_id, message) VALUES ($kullanici_id, '$message')";
    
    if ($conn->query($sql) === TRUE) {
        // Gönderilen mesajı ekledikten sonra index.php sayfasına yönlendir
        header("Location: sohbet.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Geçersiz istek.";
}
?>
