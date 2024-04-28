<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Taraf</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Açık gri arka plan rengi */
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            text-align: center; /* Bağlantıları ortala */
            margin-bottom: 20px; /* Linkler ile içerik arasındaki boşluk */
        }

        .navbar a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            padding: 20px;
            margin: auto;
            width: 50%; /* İçerik alanının genişliği */
            background-color: white; /* İçerik alanının beyaz arka planı */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Hafif gölge */
            border-radius: 8px; /* Köşeleri yuvarlat */
            margin-top: 20px; /* Yukarıdan boşluk */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Anasayfa</a>
        <a href="etkinlikleroturumlar_view.php">Etkinliğe Ait Oturumlar</a>
        <a href="katilimcistantbilgileri_view.php">Katılımcı Stant Bilgileri</a>
        <a href="katilimcietkinlikbilgileri_view.php">Katılımcı Etkinlik Bilgileri</a>
        <a href="tumstantlar_view.php">Tüm Stant Bilgileri</a>
    </div>

    <div class="content">
        <!-- Buraya sayfa içeriği gelebilir -->
    </div>
</body>
</html>
