<?php include '../config/config.php'; ?>  
<!DOCTYPE html> 
<html lang="tr"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 	 	
    <link href="buton.css" rel="stylesheet"> 
</head> 	  
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
<body>     
    <div class="container mt-4">
        <!-- Üst Destek Barı -->
        <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
            <div class="col-12">             
                <h4>DESTEK</h4>         
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

        <!-- İletişim Formu Kartı -->
        <div class="d-flex justify-content-center mt-4">
            <div class="card col-md-5 mx-auto">         
                <div class="card-header">             
                    <h2 class="card-title">İletişim Formu</h2>         
                </div>         
                <div class="card-body" style="text-align:center;">             
                    <form action="destek1.php" method="post">                 
                        <div class="mb-3">                     
                            <label for="ad" class="form-label">Adınız:</label>                     
                            <input type="text" class="form-control" id="ad" name="ad" required>                 
                        </div>                 
                        <div class="mb-3">                     
                            <label for="mesaj" class="form-label">Mesajınız:</label>                     
                            <textarea class="form-control" id="mesaj" name="mesaj" rows="4" required></textarea>                 
                        </div>                 
                        <button type="submit" class="btn btn-primary">Gönder</button>             
                    </form>         
                </div>                      
            </div>     
        </div> 
    </div> 	

    <div class="footer">        
        <a href="../sohbet/sohbet.php" class="btn btn-secondary">Sohbet</a>     
        <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>     
        <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a> 
    </div>
</body> 	 
</html>
