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

$sql = "SELECT id, ad, soyad, mail, onaylimi, telefon, premium, para, elmas,banka,demir,odun,plastik,petrol,bor,elektrik,internet,su,pasker,er,komando FROM kullanicilar WHERE id = $kullanici_id";
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
            background-image: url('https://cdn.pixabay.com/photo/2016/07/25/19/24/camouflage-1541188_1280.jpg'); /* Arkaplan resminin dosya adını buraya ekleyin */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

	</style>
<body>
	<div class="col-md-12 text-center">
		<h1 class="mt-5">KARARGAH</h1>
		 <a href="../kullanici.php" class="btn btn-primary ">Geri Dön</a>
	</div>
	
	   <!-- Üst Bölüm -->
<div class="row mt-3" style="background-color: rgba(255, 255, 255, 0.7);border-radius: 20px;text-align:center;">
	
    <div class="col-md-12 text-center">

        <p class="d-inline-block mx-3">Paralı Asker 👮🏻: <span id="para"><?= $row["pasker"] ?? 0; ?></span></p>
        <p class="d-inline-block mx-3">Er👨🏻‍✈️: <span id="demir"><?= $row["er"] ?? 0; ?></span></p>
        <p class="d-inline-block mx-3">Komando 💂‍♀️: <span id="odun"><?= $row["komando"] ?? 0; ?></span></p>
	
    </div>
</div>
	<div class="container">
		<div class="row">
			
			<!-- 1 -->
			<div class="col-md-4 mx-auto">
			
				<div class="card mt-4 text-center mx-1">	<h3>ORDU</h3>
	
					<!-- Bootstrap butonu -->
<button type="button" class="btn btn-primary" onclick="alertFunc()">Ordu Bilgisi</button>

<script>
    function alertFunc() {
        alert("Alert butonuna basıldı!");
    }
</script>
					
					<div class="card-body">
						<button class="btn btn-warning" data-toggle="collapse" data-target="#sectionpasker">👮</button>
						<button class="btn btn-warning" data-toggle="collapse" data-target="#sectioner">👨🏻‍✈️</button>
						<button class="btn btn-warning" data-toggle="collapse" data-target="#sectionkomando">💂‍</button>
				
						
					    <!--Paralı Asker BÖLÜMÜ-->
					    <div id="sectionpasker" class="collapse mt-3">
                        <div class="card item-card">
                        <div class="card-body">
                        <h5 class="card-title">Paralı Asker 👮 <?php echo $row["pasker"]; ?> adet</h5>
                        <form method="post" action="ordu/paskergonder.php">
                        <div class="mb-3">
                        <input type="text" class="form-control" id="aliciID" name="id" placeholder="Düşman ID" required>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" id="pasker" name="pasker" placeholder="Miktar" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Saldır!</button>
                        </form>
                        </div>
                        </div>
                        </div>
                       
						 <!--Er BÖLÜMÜ-->
					    <div id="sectioner" class="collapse mt-3">
                        <div class="card item-card">
                        <div class="card-body">
                        <h5 class="card-title">Er 👨🏻‍✈️ <?php echo $row["er"]; ?> adet</h5>
                        <form method="post" action="ergonder.php">
                        <div class="mb-3">
                        <input type="text" class="form-control" id="aliciID" name="id" placeholder="Düşman ID" required>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" id="er" name="er" placeholder="Miktar" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Saldır!</button>
                        </form>
                        </div>
                        </div>
                        </div>
                       
						 <!--Paralı Asker BÖLÜMÜ-->
					    <div id="sectionkomando" class="collapse mt-3">
                        <div class="card item-card">
                        <div class="card-body">
                        <h5 class="card-title">Komando 💂‍ <?php echo $row["komando"]; ?> adet</h5>
                        <form method="post" action="komandogonder.php">
                        <div class="mb-3">
                        <input type="text" class="form-control" id="aliciID" name="id" placeholder="Düşman ID" required>
                        </div>
                        <div class="mb-3">
                        <input type="text" class="form-control" id="komando" name="komando" placeholder="Miktar" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Saldır!</button>
                        </form>
                        </div>
                        </div>
                        </div>
                       
						
			</div> 
		
	<!-- Add the Bootstrap JS and Popper.js scripts here --> 
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
	
	
	</body>

</html>
