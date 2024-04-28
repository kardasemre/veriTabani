<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .nav-links {
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-links a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            background-color: #f0f0f0;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #ccc;
        }

        .special-link {
            background-color: #007bff;
            color: #fff;
        }

        .special-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Anasayfa</h1>
        <div class="nav-links">
            <a href="etkinlikler.php">Etkinlikler</a>
            <a href="katilimcilar.php">Katılımcılar</a>
            <a href="oturumlar.php">Oturumlar</a>
            <a href="stantlar.php">Stantlar</a>
            <a href="kullanici_index_view.php" class="special-link">Kullanıcının Göreceği Veriler</a>
        </div>
    </div>
</body>
</html>
