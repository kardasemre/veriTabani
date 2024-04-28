<?php
include "classes/db.class.php"; 
include "classes/tablesCrud.class.php";

$etkinlikler = new tableCrud();

// Veritabanından etkinlikleri çek
$etkinliklerListesi = $etkinlikler->listEtkinlikler();

// Silme ve Güncelleme işlemleri
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Veriyi sil
    if(isset($_POST['sil'])) {
        $etkinlikler->deleteEtkinlikler($id);
        // Silme işlemi yapıldıktan sonra yeniden etkinlik listesini çek
        $etkinliklerListesi = $etkinlikler->listEtkinlikler();
    }
    
    // Veriyi güncelle
    if(isset($_POST['guncelle'])) {
        $etkinlikler->editEtkinlikler($id, $_POST['etkinlikAdi'], $_POST['tarihSaat'], $_POST['yer'], $_POST['aciklama']);
        // Güncelleme işlemi yapıldıktan sonra yeniden etkinlik listesini çek
        $etkinliklerListesi = $etkinlikler->listEtkinlikler();
    }
}

// Ekleme işlemi
if(isset($_POST['ekle'])) {
    $etkinlikAdi = $_POST['etkinlikAdi'];
    $tarihSaat = $_POST['tarihSaat'];
    $yer = $_POST['yer'];
    $aciklama = $_POST['aciklama'];
    
    // Yeni etkinlik ekle
    $etkinlikler->createEtkinlik($etkinlikAdi, $tarihSaat, $yer, $aciklama);
    
    // Yeni etkinlik eklendikten sonra sayfayı yeniden yükle
    header("Location: etkinlikler.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlikler</title>
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
</head>
<body>
    <a href="index.php" class="home-link">Anasayfa</a>
    <div class="container">
        <h2>Etkinlikler</h2>
        <form method="post">
            <div class="form-container">
                <h3>Yeni Etkinlik Ekle</h3>
                <label for="etkinlikAdi">Etkinlik Adı:</label>
                <input type="text" id="etkinlikAdi" name="etkinlikAdi" required><br><br>
                <label for="tarihSaat">Tarih Saat:</label>
                <input type="text" id="tarihSaat" name="tarihSaat" class="datetimepicker" required><br><br>
                <label for="yer">Yer:</label>
                <input type="text" id="yer" name="yer" required><br><br>
                <label for="aciklama">Açıklama:</label>
                <input type="text" id="aciklama" name="aciklama"><br><br>
                <input type="submit" name="ekle" value="Ekle">
            </div>
        </form>
        
        <table>
            <thead>
                <tr>
                    <th>Etkinlik ID</th>
                    <th>Etkinlik Adı</th>
                    <th>Tarih Saat</th>
                    <th>Yer</th>
                    <th>Açıklama</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($etkinliklerListesi as $etkinlik):?>
                    <tr>
                        <td><?php echo $etkinlik->EtkinlikID?></td>
                        <td><?php echo $etkinlik->EtkinlikAdi?></td>
                        <td><?php echo $etkinlik->TarihSaat?></td>
                        <td><?php echo $etkinlik->Yer?></td>
                        <td><?php echo $etkinlik->Aciklama?></td>
                        <td>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $etkinlik->EtkinlikID?>">
                                <input type="submit" name="sil" value="Sil" onclick="return confirm('Bu etkinliği silmek istediğinize emin misiniz?')">
                            </form>
                            <button onclick="editModal('<?php echo $etkinlik->EtkinlikID?>', '<?php echo $etkinlik->EtkinlikAdi?>', '<?php echo $etkinlik->TarihSaat?>', '<?php echo $etkinlik->Yer?>', '<?php echo $etkinlik->Aciklama?>')">Güncelle</button>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <!-- Güncelleme Modalı -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Etkinlik Güncelle</h3>
            <form method="post" class="form-container">
                <label for="modalEtkinlikAdi">Etkinlik Adı:</label>
                <input type="text" id="modalEtkinlikAdi" name="etkinlikAdi" required><br><br>
                <label for="modalTarihSaat">Tarih Saat:</label>
                <input type="text" id="modalTarihSaat" name="tarihSaat" class="datetimepicker" required><br><br>
                <label for="modalYer">Yer:</label>
                <input type="text" id="modalYer" name="yer" required><br><br>
                <label for="modalAciklama">Açıklama:</label>
                <input type="text" id="modalAciklama" name="aciklama"><br><br>
                <input type="hidden" id="modalID" name="id">
                <input type="submit" name="guncelle" value="Güncelle">
            </form>
        </div>
    </div>

    <!-- flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // flatpickr ile datetimepicker'ı etkinleştir
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(".datetimepicker", {
                enableTime: true, // Saat seçimini etkinleştir
                dateFormat: "Y-m-d H:i", // Tarih formatı
                time_24hr: true // 24 saat formatını kullan
            });
        });

        // Güncelleme Modalı açma
        function editModal(id, etkinlikAdi, tarihSaat, yer, aciklama) {
            document.getElementById("modalID").value = id;
            document.getElementById("modalEtkinlikAdi").value = etkinlikAdi;
            document.getElementById("modalTarihSaat").value = tarihSaat;
            document.getElementById("modalYer").value = yer;
            document.getElementById("modalAciklama").value = aciklama;
            document.getElementById("editModal").style.display = "block";
        }

        // Güncelleme Modalı kapatma
        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>
</body>
</html>
