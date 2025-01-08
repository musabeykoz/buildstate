<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pop-up Özel Alert ve Yönlendirme</title>
<style>
  /* Overlay stil */
  .overlay {
    display: none; /* Başlangıçta gizli */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('https://s.tmimgcdn.com/scr/800x500/105600/e-commerce-app-flat-illustration-vector-image-105692_105692-original.jpg'); /* Arkaplan resmi */
    background-size: 100% 100%;
    background-position: center;
    z-index: 1000; /* Diğer içeriklerin üstünde olacak */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Uyarı kartı stil */
  .alert-card {
    background-color: #ffcccc; /* Kırmızı arka plan rengi */
    border-radius: 20px; /* Kenar yuvarlaklığı */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Güçlendirilmiş gölgelendirme */
    padding: 30px;
    max-width: 400px; /* Maksimum genişlik */
    text-align: center; /* Metin hizalaması */
  }

  .alert-card .alert {
    font-size: 18px; /* Metin boyutu */

    color: #721c24; /* Metin rengi */
  }
</style>
</head>
<body>

<div class="overlay" id="overlay">
  <div class="alert-card">
    <div class="alert alert-warning" role="alert">
      Yetersiz Bakiye-Lütfen Bekleyiniz..
    </div>
  </div>
</div>

<script>
  // Popup penceresini göster
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('overlay').style.display = 'flex';
  });

  // 5 saniye sonra yeni sayfaya yönlendir
  setTimeout(function() {
    window.location.href = "../kullanici.php"; // Yeni sayfaya yönlendirme
  }, 2000); // 2000 milisaniye = 2 saniye
</script>

</body>
</html>
