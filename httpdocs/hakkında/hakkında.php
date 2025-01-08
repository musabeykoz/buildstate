<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkında</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* İlave CSS Stilleri */
        body {
            background-image: url('https://i.dunya.com/storage/old/files/2018/3/2/405519/405519.jpg');
            background-size: cover;
            background-position: center;
            color: #ffffff;
        }
        .about-content {
            margin-top: 30px;
        }
        .jumbotron, .card {
            background-color: rgba(0, 0, 0, 0.5);
            color: #ffffff;
        }
        /* Güncellenen stil: Yazı rengi */
        h1, h2, p, a {
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <a href="../kullanici.php" class="btn btn-primary mb-2">Geri Dön</a>
        <div class="jumbotron">
            <h1 class="display-4">Hakkında</h1>
            <p class="lead">Online Ticaret Oyunu</p>
            <hr class="my-4">
            <p>Diğer oyunlara göre farklı çeşitli özelliklere sahip, gerçekçi sistemler entegre edilmiş ticaret oyunudur.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="oyunhakkında.php" role="button">Daha Fazla Bilgi</a>
            </p>
        </div>

        <div class="row about-content">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">BuildState Nedir?</h2>
                        <p class="card-text">Online ticaret oyunu, farklı özelliklere sahip, gerçekçi sistemler entegre edilmiş bir oyun türüdür. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Neden BuildState?</h2>
                        <p class="card-text">Bu oyun, diğer oyunlardan farklı özelliklere sahip olması ve gerçekçi ticaret sistemleri sunması nedeniyle tercih edilmektedir.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS ve Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
