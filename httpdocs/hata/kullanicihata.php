<?php
session_start();

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

$sql = "SELECT id, ad, soyad, mail, onaylimi, telefon, premium, para, elmas,banka,demir,odun,plastik,petrol,bor,elektrik,internet,su,pasker,er,komando,itibar FROM kullanicilar WHERE id = $kullanici_id";
$result = $conn->query($sql);

$row = $result && $result->num_rows > 0 ? $result->fetch_assoc() : [];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
	   <style>
        body {
            background-image: url('https://cdn.pixabay.com/photo/2022/01/11/17/04/city-6931092_1280.jpg');
            background-size: cover;
            background-position: center;
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
<body>
    <div class="container mt-4">
        <div class="row">
        <!-- Üst Bölüm -->
<div class="row mt-2" style="background-color: rgba(255, 255, 255, 0.7);border-radius: 20px;text-align:center;">
    <div class="col-md-11 text-center">
        <h4>Para ve Elmaslar 💰💎</h4>
        <p class="d-inline-block mx-3">💵: <span id="para"><?= $row["para"] ?? 0; ?></span></p>
        <p class="d-inline-block mx-3">💎: <?= $row["elmas"] ?? 0; ?></p>
		<p class="d-inline-block mx-3">💳:<?= $row["banka"] ?? 0; ?></p>
		<p class="d-inline-block mx-3">👑:<?= $row["itibar"] ?? 0; ?></p>
      
    </div>
</div>
        </div>
		<br>
		<div class="alert alert-danger" role="alert">
  İşlem Başarısız Oldu
</div>
        <div class="row">
            <!-- Chat Bölümü -->
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <h2 class="mb-4">SOHBET 👥</h2>
                        <div class="chat-box" id="chat-box">
                            <?php
                            $sql_messages = "SELECT messages.*, kullanicilar.ad AS sender_name, kullanicilar.id AS sender_id FROM messages INNER JOIN kullanicilar ON messages.sender_id = kullanicilar.id ORDER BY messages.timestamp DESC LIMIT 10";
                            $result_messages = $conn->query($sql_messages);

                            if ($result_messages->num_rows > 0) {
                                while ($row_message = $result_messages->fetch_assoc()) {
                                    $sender_name = $row_message['sender_name'];
                                    $sender_id = $row_message['sender_id'];
                                    $message_content = $row_message['message'];

                                    echo "<div><strong>{$sender_name} (ID: {$sender_id}):</strong> {$message_content}</div>";
                                }
                            }
                            ?>
                        </div>
                        <!-- Chat formu -->
                        <form id="chat-form" method="post" action="sendMessage.php">
                            <div class="input-group mb-3">
                                <input type="text" name="message" class="form-control" placeholder="Mesajınızı yazın">
                                <button type="submit" class="btn btn-primary">Gönder</button>
                                <button type="button" class="btn btn-secondary" onclick="location.reload();">Yenile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<!-- İletişim Formu Mesajları Bölümü -->
<div class="col-md-4">
    <div class="mt-4 card">
        <div class="card-body">
            <h2 class="mb-4">Şehir📬💼</h2>

            <button onclick="artirPara()" class="btn btn-success mb-2">
                 Para Kazan 💵
            </button>
            <a href="depo/depo.php" class="btn btn-warning mb-2">
                Depo 📦
            </a>

            <a href="ithalat/ithalatbag.php" class="btn btn-danger mb-2">
                 İthalat 📥
            </a>

            <a href="banka/bankabag.php" class="btn btn-secondary mb-2">
                 Banka 🏛️
            </a>
            <a href="karargah/karargah.php" class="btn btn-primary mb-2">
                 Karargah 🚩
            </a>
		
            <a href="odunpazar/odunpazar.php" class="btn btn-primary mb-2">
                 Odun Pazarı 🌳
            </a>

            <a href="demirpazar/demirpazar.php" class="btn btn-primary mb-2">
                Demir Pazarı ⚙️
            </a>

            <a href="supazar/supazar.php" class="btn btn-primary mb-2">
                 Nehir 💧
            </a>

            <a href="petrolpazar/petrolpazar.php" class="btn btn-primary mb-2">
                Petrol İstasyonu 🛢
            </a>
            <a href="borpazar/borpazar.php" class="btn btn-primary mb-2">
                 Bor Madeni ☁️
            </a> 
          
			  
			  <a href="elektrikpazar/elektrikpazar.php" class="btn btn-primary mb-2">
                 Elektrik Santrali 💡
            </a>
			  <a href="sorucevap/sorucevap.php" class="btn btn-primary mb-2">
                <i class="fas fa-cog"></i> soru-cevap
            </a>
        </div>
    </div>
</div>
<!-- Kullanıcı Bilgileri Butonu ve Kartı -->
<div class="col-md-4">
    <div class="mt-4 card">
        <div class="card-body">
            <h2 class="mb-4">Kullanıcı Bilgileri 🧑💻</h2>

            <a href="profil/profil.php" class="btn btn-primary mb-2">
                <i class="fas fa-user"></i> Profil 👨🏻‍🦱
            </a>

            <a href="sıralama/sıralama.php" class="btn btn-warning mb-2">
                 Sıralama 🥇
            </a>

			   <a href="piyasa/piyasa.php" class="btn btn-secondary mb-2">
                 Küresel Piyasa 🌍
            </a>
			
            <a href="hakkında/hakkında.php" class="btn btn-success mb-2">
                 Oyun Hakkında 🧷
            </a>
            <a href="destek/destek.php" class="btn btn-danger mb-2">
                 Destek 📩
            </a>
            <a href="ayarlar/ayarlar.php" class="btn btn-dark mb-2">
                 Ayarlar 🛠
            </a>
        </div>
    </div>
</div>

        
			
			
        </div>
		

		
		<!-- Oturumu Kapat Butonu -->
<form action="oturumkapat.php" method="post" class="mt-4">
    <button type="submit" class="btn btn-danger">Oturumu Kapat 👋🏻</button>
</form>
		
    </div>
	

   <script>
    function artirPara() {
        // Kullanıcıdan cevabı al
        var cevap = prompt("35+10 kaçtır?");

        // AJAX ile para artırma isteği gönder
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "artirPara.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Sunucuya gönderilecek veri (örneğin kullanıcı ID'si ve cevap)
        var data = "kullanici_id=<?= $kullanici_id ?>&cevap=" + encodeURIComponent(cevap);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Sunucudan gelen cevap burada işlenebilir (isteğe bağlı)
                console.log(xhr.responseText);
                location.reload();
            }
        };

        xhr.send(data);
    }
</script>
<script>
// 5 saniye sonra başka bir sayfaya yönlendirme işlemi
setTimeout(function() {
    window.location.href = "../kullanici.php"; // Yönlendirilecek sayfanın URL'si
}, 5000); // 5000 milisaniye = 5 saniye
</script>
	
</body>
</html>
