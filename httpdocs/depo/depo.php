<?php
include '../config/config.php';


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="buton.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://cdn.pixabay.com/photo/2022/01/18/16/49/town-6947538_1280.jpg');
            background-size: cover;
            background-position: center;
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
        .footer .btn {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="container my-3">
                <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
                    <div class="col-12">
                        <h4>ŞEHİR</h4>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>💵: <span id="para"><?= $row["para"] ?? 0; ?></span></p>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>💎: <?= $row["elmas"] ?? 0; ?></p>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>💳: <?= $row["banka"] ?? 0; ?></p>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <p>👑: <?= $row["itibar"] ?? 0; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3" style="background-color: rgba(255, 255, 255, 0.7);border-radius: 20px;text-align:center;">
            <div class="col-md-12 text-center">
                <p class="d-inline-block mx-3">⚙️: <span id="demir"><?= $row["demir"] ?? 0; ?></span></p>
                <p class="d-inline-block mx-3">🌳: <span id="odun"><?= $row["odun"] ?? 0; ?></span></p>
                <p class="d-inline-block mx-3">🧣: <span id="plastik"><?= $row["plastik"] ?? 0; ?></span></p>
                <p class="d-inline-block mx-3">🛢: <span id="petrol"><?= $row["petrol"] ?? 0; ?></span></p>
                <p class="d-inline-block mx-3">☁️: <span id="bor"><?= $row["bor"] ?? 0; ?></span></p>
                <p class="d-inline-block mx-3">💡: <span id="elektrik"><?= $row["elektrik"] ?? 0; ?></span></p>
                <p class="d-inline-block mx-3">🌐: <span id="internet"><?= $row["internet"] ?? 0; ?></span></p>
                <p class="d-inline-block mx-3">💧: <span id="su"><?= $row["su"] ?? 0; ?></span></p>
            </div>
        </div>
        <br>
           <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Kaynak Gönder</h5>
            <form method="post" action="depo_gonder.php">
                <div class="mb-3">
                    <select class="form-select" name="kaynak" required>
                        <option value="" disabled selected>Kaynak Seçin</option>
                        <option value="demir">Demir ⚙️</option>
                        <option value="odun">Odun 🌳</option>
                        <option value="plastik">Plastik 🧣</option>
                        <option value="petrol">Petrol 🛢</option>
                        <option value="bor">Bor ☁️</option>
                        <option value="elektrik">Elektrik 💡</option>
                        <option value="internet">İnternet 🌐</option>
                        <option value="su">Su 💧</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="aliciID" name="id" placeholder="Alıcı ID" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="kaynakMiktar" name="miktar" placeholder="Miktar" required>
                </div>
                <button type="submit" class="btn btn-secondary w-100">Gönder</button>
            </form>
        </div>
    </div>
<br><br>
        <div class="footer">
            <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>
            <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
            <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRzXR3z6csuFZRIpIIOa0UPb+ZmDIho+0Jb4WWoPp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybWeFd3N5K7E6LfFNr3eRC0rK5iCiw4OMkE9c2uw0CZIp6HIQ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-JawI6
