<?php
include 'classes/db.class.php';
include 'classes/userView.class.php';

// userView sınıfından bir örnek oluşturalım
$userView = new UserView();

// Tüm etkinlik oturum bilgilerini alalım ve ekrana yazdıralım
$etkinliklerOturumlar = $userView->listStantKatilimciBilgisi();

// ID'ye göre etkinlik oturum bilgisini alalım ve ekrana yazdıralım
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $etkinlikOturum = $userView->listStantKatilimciBilgisiById($id);
}

// Arama yapıldığında sonuçları alalım
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $etkinliklerOturumlar = $userView->searchStantKatilimciBilgisi($search);
        // Eğer arama sonucu boşsa bilgilendirme mesajı oluştur
        if (empty($etkinliklerOturumlar)) {
            $not_found_message = "Aranan ID'ye ait veri bulunamadı.";
        }
    }
}

// Tüm verileri tekrar getirmek için
if (isset($_POST['get_all'])) {
    $etkinliklerOturumlar = $userView->listStantKatilimciBilgisi();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlik Oturumları</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            padding: 5px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            color: #dc3545;
            margin-top: 10px;
        }
        a {
            display: block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <a href="kullanici_index_view.php">Kullanıcı Anasayfa</a>
    <h1>Tüm Stantlar</h1>
    
    <!-- Arama Formu -->
    <form method="POST" action="">
        <label for="search">Stant ID ile Ara:</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Ara">
        <input type="submit" name="get_all" value="Tüm Verileri Getir">
    </form>

    <!-- Bilgilendirme Mesajı -->
    <?php if (isset($not_found_message)) : ?>
        <p class="message"><?php echo $not_found_message; ?></p>
    <?php endif; ?>

    <!-- Tüm etkinlik oturum bilgileri -->
    <h2>Tüm Stant Bilgileri</h2>
    <table>
        <tr>
            <th>Stant ID</th>
            <th>Stant Numarası</th>
            <th>Kiralama Tarihi</th>
            <th>Kiralama Süresi</th>
            <th>Katılımcı Adı</th>
            <th>Katılımcı Soyadı</th>
        </tr>
        <?php foreach ($etkinliklerOturumlar as $etkinlik) : ?>
            <tr>
                <td><?php echo $etkinlik->StantID; ?></td>
                <td><?php echo $etkinlik->StantNumarasi; ?></td>
                <td><?php echo $etkinlik->KiralamaTarihi; ?></td>
                <td><?php echo $etkinlik->KiralamaSuresi; ?></td>
                <td><?php echo $etkinlik->KatilimciAdi; ?></td>
                <td><?php echo $etkinlik->KatilimciSoyadi; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
