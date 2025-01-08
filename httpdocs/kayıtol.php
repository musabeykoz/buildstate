<?php
header('Content-Type: text/html; charset=utf-8'); // Karakter setini belirle

$servername = "localhost:3306"; // MySQL sunucu adresi
$username = "musa"; // MySQL kullanıcı adı
$password = "beykoz"; // MySQL şifre
$dbname = "yapaynetwork"; // Kullanılacak veritabanı adı

// MySQL bağlantısı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// POST verilerini al
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$email = $_POST['mail'];
$telefon = $_POST['telefon'];
$sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT); // Şifreyi güvenli bir şekilde sakla

// E-posta adresinin daha önce kayıtlı olup olmadığını kontrol et
$check_query = "SELECT id FROM kullanicilar WHERE mail = '$email'";
$check_result = $conn->query($check_query);

if ($check_result->num_rows > 0) {
    // E-posta adresi daha önce kullanılmış
		
	 header("Location:hata/kayıt/kayıt_başarısız.php");

} else {
    // E-posta adresi kullanılmamış, kayıt işlemini gerçekleştir
    // Veritabanına kullanıcı ekle
    $sql = "INSERT INTO kullanicilar (ip,ad, soyad, mail, onaylimi, telefon, sifre, premium,para,elmas,banka,demir,odun,plastik,petrol,bor,elektrik,internet,su,pasker,er,komando,itibar) VALUES ('0','$ad', '$soyad', '$email', 'Hayır', '$telefon', '$sifre', 'Yok','100','5','0','0','0','0','0','0','0','0','0','0','0','0','0')";

		 
	
    if ($conn->query($sql) === TRUE) {
		header("Location: hata/kayıt/kayıt_başarılı.php");
    
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
	

}




// Bağlantıyı kapat
$conn->close();
?>
