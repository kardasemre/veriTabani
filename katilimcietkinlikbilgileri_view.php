<?php
include 'classes/db.class.php';
include 'classes/userView.class.php';

// userView sınıfından bir örnek oluşturalım
$userView = new UserView();

// Tüm etkinlik oturum bilgilerini alalım ve ekrana yazdıralım
$etkinliklerOturumlar = $userView->listKatilimciOturumBilgisi();

// ID'ye göre etkinlik oturum bilgisini alalım ve ekrana yazdıralım
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $etkinlikOturum = $userView->listKatilimciOturumBilgisiById($id);
}

// Arama yapıldığında sonuçları alalım
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $etkinliklerOturumlar = $userView->searchKatilimciOturumBilgisiById($search);
        // Eğer arama sonucu boşsa bilgilendirme mesajı oluştur
        if (empty($etkinliklerOturumlar)) {
            $not_found_message = "Aranan ID'ye ait veri bulunamadı.";
        }
    }
}

// Tüm verileri tekrar getirmek için
if (isset($_POST['get_all'])) {
    $etkinliklerOturumlar = $userView->listKatilimciOturumBilgisi();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katılımcı Etkinlik Bilgileri</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1, h2 {
            color: #007bff;
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
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            color: #dc3545;
            margin-top: 10px;
        }
        a.button {
            display: inline-block;
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button:hover {
            background-color: #0056b3;
        }
        a.link-box {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        a.link-box:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="kullanici_index_view.php">Kullanıcı Anasayfa</a>
    <h1>Katılımcı Etkinlikleri</h1>
    
    <!-- Arama Formu -->
    <form method="POST" action="">
        <label for="search">Etkinlik ID ile Ara:</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Ara">
        <input type="submit" name="get_all" value="Tüm Verileri Getir">
    </form>

    <!-- Bilgilendirme Mesajı -->
    <?php if (isset($not_found_message)) : ?>
        <p class="message"><?php echo $not_found_message; ?></p>
    <?php endif; ?>

    <!-- Tüm etkinlik oturum bilgileri -->
    <h2>Tüm Etkinlik Oturum Bilgileri</h2>
    <table>
        <tr>
            <th>Katılımcı ID</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Etkinlik ID</th>
            <th>Etkinlik Adı</th>
            <th>Tarih Saat</th>
            <th>Yer</th>
            <th>Açıklama</th>
            <th>Oturum ID</th>
            <th>Oturum Adı</th>
            <th>Baslangiç Tarihi Saati</th>
            <th>Bitiş Tarihi Saati</th>
        </tr>
        <?php foreach ($etkinliklerOturumlar as $etkinlik) : ?>
            <tr>
                <td><?php echo $etkinlik->KatilimciID; ?></td>
                <td><?php echo $etkinlik->Ad; ?></td>
                <td><?php echo $etkinlik->Soyad; ?></td>
                <td><?php echo $etkinlik->EtkinlikID; ?></td>
                <td><?php echo $etkinlik->EtkinlikAdi; ?></td>
                <td><?php echo $etkinlik->TarihSaat; ?></td>
                <td><?php echo $etkinlik->Yer; ?></td>
                <td><?php echo $etkinlik->Aciklama; ?></td>
                <td><?php echo $etkinlik->OturumID; ?></td>
                <td><?php echo $etkinlik->OturumAdi; ?></td>
                <td><?php echo $etkinlik->BaslangicTarihiSaat; ?></td>
                <td><?php echo $etkinlik->BaslangicTarihiSaat; ?></td>

                BitisTarihiSaat





            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
