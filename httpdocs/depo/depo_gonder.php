<?php
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kaynak = $_POST["kaynak"];
    $aliciID = intval($_POST["id"]);
    $miktar = intval($_POST["miktar"]);

    if (!in_array($kaynak, ['demir', 'odun', 'plastik', 'petrol', 'bor', 'elektrik', 'internet', 'su'])) {
        echo "Geçersiz kaynak seçildi.";
        exit();
    }

    if (!is_numeric($aliciID) || !is_numeric($miktar) || $miktar <= 0) {
          // Geçersiz yazı veya miktar
		header("Location: ../hata/depo/depo_gecerli_sayi_girin.php");
        exit();
    }

    $kullanici_id = $_SESSION['kullanici_id'];

    // Alıcı ID kontrolü
    $sql = "SELECT id FROM kullanicilar WHERE id = $aliciID";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
		// geçersiz alıcı id
        header("Location: ../hata/depo/depo_gecersiz_alici_id.php");
        exit();
    }

    // Oturum açan kullanıcının item miktarını kontrol et
    $sql = "SELECT $kaynak FROM kullanicilar WHERE id = $kullanici_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row[$kaynak] < $miktar) {
        header("Location: ../hata/depo/depo_yetersiz_miktar.php");
        exit();
    }

    // Miktarı azalt
    $sql = "UPDATE kullanicilar SET $kaynak = $kaynak - $miktar WHERE id = $kullanici_id";
    if ($conn->query($sql) === TRUE) {
        // Alıcıya ekle
        $sql = "UPDATE kullanicilar SET $kaynak = $kaynak + $miktar WHERE id = $aliciID";
        if ($conn->query($sql) === TRUE) {
            // item başarıyla gönderildi
			header("Location: ../hata/depo/depo_başarılı.php");
        } else {
            echo "İtem gönderme başarısız oldu.";
        }
    } else {
        echo "Kaynak azaltma başarısız oldu.";
    }
}
?>
