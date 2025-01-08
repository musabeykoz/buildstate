<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	
	<link href="../buton.css" rel="stylesheet">
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
        <div class="row">
        <!-- Üst Bölüm -->
<div class="container my-3">
    <div class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 20px; text-align: center; padding: 20px;">
        <div class="col-12">
            <h4>SOHBET</h4>
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
		
		
		
		
     <!-- Chat Bölümü -->
            <div class="col-md-9">
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
       


			<pre>
			
			
			</pre>
 <div class="footer">
       <div class="footer">
    <a href="sohbet.php" class="btn btn-secondary">Sohbet</a>
    <a href="../kullanici.php" class="btn btn-secondary">Şehir</a>
    <a href="../mekan/mekan.php" class="btn btn-secondary">Mekan</a>
</div>

    </div>
        </div>
	<pre>
	
	
	</pre>

</body>
	
</html>
