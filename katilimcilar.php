<?php
include "classes/db.class.php"; 
include "classes/tablesCrud.class.php";

$katilimcilar = new tableCrud();

// Ekleme işlemi
if(isset($_POST['ekle'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kurum = $_POST['kurum'];
    $iletisim = $_POST['iletisim'];
    $kayitTarihi = date("Y-m-d H:i:s"); // Şu anki tarih ve saat

    $katilimcilar->createKatilimci($ad, $soyad, $kurum, $iletisim, $kayitTarihi);
}

// Silme işlemi
if(isset($_POST['sil'])) {
    $id = $_POST['id'];
    $katilimcilar->deleteKatilimcilar($id);
}

// Güncelleme işlemi
if(isset($_POST['guncelle'])) {
    $id = $_POST['id'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kurum = $_POST['kurum'];
    $iletisim = $_POST['iletisim'];
    $katilimcilar->editKatilimcilar($id, $ad, $soyad, $kurum, $iletisim);
}

$katilimcilarListesi = $katilimcilar->listKatilimcilar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katılımcılar</title>
    <style>
        /* Global CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 10px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Anasayfa Link Style */
        .home-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .home-link:hover {
            background-color: #0056b3;
        }
    </style>
    <a href="index.php" class="home-link">Anasayfa</a>
</head>
<body>
    <h2>Katılımcılar</h2>

    <!-- Ekleme Formu -->
    <div class="form-container">
        <h3>Katılımcı Ekle</h3>
        <form method="post">
            <label for="ad">Ad:</label>
            <input type="text" id="ad" name="ad" required><br>
            <label for="soyad">Soyad:</label>
            <input type="text" id="soyad" name="soyad" required><br>
            <label for="kurum">Kurum:</label>
            <input type="text" id="kurum" name="kurum" required><br>
            <label for="iletisim">İletişim Bilgileri:</label>
            <input type="text" id="iletisim" name="iletisim" required><br>
            <input type="submit" name="ekle" value="Ekle">
        </form>
    </div>

    <!-- Katılımcılar Tablosu -->
    <table>
        <thead>
            <tr>
                <th>Katılımcı ID</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Kurum</th>
                <th>İletişim Bilgileri</th>
                <th>Kayıt Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($katilimcilarListesi as $katilimci):?>
                <tr>
                    <td><?php echo $katilimci->KatilimciID?></td>
                    <td><?php echo $katilimci->Ad?></td>
                    <td><?php echo $katilimci->Soyad?></td>
                    <td><?php echo $katilimci->Kurum?></td>
                    <td><?php echo $katilimci->IletisimBilgileri?></td>
                    <td><?php echo $katilimci->KayitTarihi?></td>
                    <td>
                        <!-- Silme Formu -->
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $katilimci->KatilimciID?>">
                            <input type="submit" name="sil" value="Sil" onclick="return confirm('Bu katılımcıyı silmek istediğinize emin misiniz?')">
                        </form>
                        <!-- Güncelleme Butonu -->
                        <button onclick="editModal(
                            '<?php echo $katilimci->KatilimciID?>',
                            '<?php echo $katilimci->Ad?>',
                            '<?php echo $katilimci->Soyad?>',
                            '<?php echo $katilimci->Kurum?>',
                            '<?php echo $katilimci->IletisimBilgileri?>')">Güncelle</button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <!-- Güncelleme Modalı -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Katılımcı Güncelle</h3>
            <form method="post" class="form-container">
                <label for="ad">Ad:</label>
                <input type="text" id="modalAd" name="ad" required><br>
                <label for="soyad">Soyad:</label>
                <input type="text" id="modalSoyad" name="soyad" required><br>
                <label for="kurum">Kurum:</label>
                <input type="text" id="modalKurum" name="kurum" required><br>
                <label for="iletisim">İletişim Bilgileri:</label>
                <input type="text" id="modalIletisim" name="iletisim" required><br>
                <input type="hidden" id="modalID" name="id">
                <input type="submit" name="guncelle" value="Güncelle">
            </form>
        </div>
    </div>

    <script>
        // Güncelleme Modalı açma
        function editModal(id, ad, soyad, kurum, iletisim) {
            document.getElementById("modalID").value = id;
            document.getElementById("modalAd").value = ad;
            document.getElementById("modalSoyad").value = soyad;
            document.getElementById("modalKurum").value = kurum;
            document.getElementById("modalIletisim").value = iletisim;
            document.getElementById("editModal").style.display = "block";
        }

        // Güncelleme Modalı kapatma
        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>
</body>
</html>

