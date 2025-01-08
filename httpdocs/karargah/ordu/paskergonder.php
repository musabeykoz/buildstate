<?php
session_start();

// Gerçek veritabanı bilgilerinizi kullanın.
$servername = "localhost:3306";
$username = "";
$password = "";
$dbname = "";

// Bağlantı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan kullanıcının girdiği bilgileri al
    $hedef_id = $_POST["id"];
    $savaş_miktarı = $_POST["pasker"];

    // Eğer kullanıcı giriş yapmışsa
    if (isset($_SESSION['kullanici_id'])) {
        $saldiran_id = $_SESSION['kullanici_id'];

        // Güvenlik: Formdan gelen miktarı kontrol etmek için uygun güvenlik önlemlerini alın
        $savaş_miktarı = intval($savaş_miktarı); // Sadece sayısal değeri almak için intval kullanıldı

        // Formdan gelen id'nin veritabanında varlığını kontrol et
        $stmtCheckId = $conn->prepare("SELECT COUNT(*) FROM kullanicilar WHERE id = ?");
        $stmtCheckId->bind_param("i", $hedef_id);
        $stmtCheckId->execute();
        $stmtCheckId->bind_result($id_count);
        $stmtCheckId->fetch();
        $stmtCheckId->close();

        if ($id_count == 0) {
            echo "Hedef kullanıcı bulunamadı!";
        } else {
            // SQL sorgularını hazırla
            $stmtUpdateSaldiran = $conn->prepare("UPDATE kullanicilar SET pasker = pasker - ? WHERE id = ?");
            $stmtUpdateSaldiran->bind_param("ii", $savaş_miktarı, $saldiran_id);

            $stmtUpdateHedef = $conn->prepare("UPDATE kullanicilar SET itibar = GREATEST(itibar - ?, 0) WHERE id = ?");
            $stmtUpdateHedef->bind_param("ii", $savaş_miktarı, $hedef_id);

            $stmtUpdateOturumAcan = $conn->prepare("UPDATE kullanicilar SET itibar = itibar + ? WHERE id = ?");
            $stmtUpdateOturumAcan->bind_param("ii", $savaş_miktarı, $saldiran_id);

            // Formdan gelen savaş miktarı kontrolü
            if ($savaş_miktarı <= 0) {
                echo "Hatalı savaş miktarı!";
                // Hata durumunda gerekli diğer işlemleri buraya ekleyebilirsiniz.
            } else {
                // Saldıranın pasker miktarını kontrol et
                $stmtCheckPasker = $conn->prepare("SELECT pasker FROM kullanicilar WHERE id = ?");
                $stmtCheckPasker->bind_param("i", $saldiran_id);
                $stmtCheckPasker->execute();
                $stmtCheckPasker->bind_result($saldiran_pasker);
                $stmtCheckPasker->fetch();
                $stmtCheckPasker->close();

                // Yeterli pasker varsa işlemlere devam et
                if ($saldiran_pasker >= $savaş_miktarı) {
                    // Saldıranın pasker miktarını güncelleme
                    if ($stmtUpdateSaldiran->execute() === TRUE) {
                        // Hedefin itibar miktarını güncelleme
                        if ($stmtUpdateHedef->execute() === TRUE) {
                            // Oturum açan kullanıcının itibarını güncelleme
                            if ($stmtUpdateOturumAcan->execute() === TRUE) {
                                // Eğer düşmanın itibarı 0'dan küçükse sıfır olarak bırak
                                $stmtCheckItibar = $conn->prepare("SELECT itibar FROM kullanicilar WHERE id = ?");
                                $stmtCheckItibar->bind_param("i", $hedef_id);
                                $stmtCheckItibar->execute();
                                $stmtCheckItibar->bind_result($hedef_itibar);
                                $stmtCheckItibar->fetch();
                                $stmtCheckItibar->close();

                                if ($hedef_itibar < 0) {
                                    $stmtUpdateHedefZero = $conn->prepare("UPDATE kullanicilar SET itibar = 0 WHERE id = ?");
                                    $stmtUpdateHedefZero->bind_param("i", $hedef_id);
                                    $stmtUpdateHedefZero->execute();
                                    $stmtUpdateHedefZero->close();
                                }

                                echo "Savaş başarılı! Hedefin itibarı azaldı. Oturum açan kullanıcının itibarı arttı.";
                            } else {
                                echo "Hata: " . $stmtUpdateOturumAcan->error;
                            }
                        } else {
                            echo "Hata: " . $stmtUpdateHedef->error;
                        }
                    } else {
                        // Saldıranın pasker güncelleme başarısız ise hata mesajını yazdır
                        echo "Hata: " . $stmtUpdateSaldiran->error;
                    }
                } else {
                    // Yetersiz pasker bakiyesi
                    echo "Yetersiz pasker bakiyesi. Saldıranın hesabında yeterli pasker bulunmamaktadır.";
                }
            }

            // Bağlantıyı kapat
            $stmtUpdateSaldiran->close();
            $stmtUpdateHedef->close();
            $stmtUpdateOturumAcan->close();
        }
    } else {
        // Kullanıcı oturum açmamışsa burada bir işlem yapabilirsiniz.
        echo "Kullanıcı oturum açmamış!";
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
