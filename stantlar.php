<?php
include "classes/db.class.php"; 
include "classes/tablesCrud.class.php";

$stantlar = new tableCrud();

// Ekleme işlemi
if(isset($_POST['ekle'])) {
    $stantNumarasi = $_POST['stant_numarasi'];
    $kiralamaTarihi = $_POST['kiralama_tarihi'];
    $kiralamaSuresi = $_POST['kiralama_suresi'];
    $katilimciID = $_POST['katilimci_id'];

    $stantlar->createStant($stantNumarasi, $kiralamaTarihi, $kiralamaSuresi, $katilimciID);
    header("Location: stantlar.php"); // Yönlendirme
}

// Silme işlemi
if(isset($_POST['sil'])) {
    $id = $_POST['id'];
    echo "Silinecek Stant ID: " . $id . "<br>"; // Bu satırı ekleyin
    $success = $stantlar->deleteStantlar($id);
    if ($success) {
        header("Location: stantlar.php"); // Yönlendirme
    } else {
        echo "Silme işlemi başarısız!";
    }
}

// Güncelleme işlemi
if(isset($_POST['guncelle'])) {
    $id = $_POST['id'];
    $stantNumarasi = $_POST['stant_numarasi'];
    $kiralamaTarihi = $_POST['kiralama_tarihi'];
    $kiralamaSuresi = $_POST['kiralama_suresi'];
    $katilimciID = $_POST['katilimci_id'];

    $stantlar->editStantlar($id, $stantNumarasi, $kiralamaTarihi, $kiralamaSuresi, $katilimciID);
    header("Location: stantlar.php"); // Yönlendirme
}

$stantlarListesi = $stantlar->listStantlar();
$katilimciListesi = $stantlar->listKatilimcilar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stantlar</title>
    <!-- jQuery ve jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <style>
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        nav a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #f2f2f2;
            margin: 0 5px;
        }

        nav a:hover {
            background-color: #ccc;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Container */
        .form-container {
            margin: auto;
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
            margin-top: 20px;
        }

        

        /* Input Style */
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .update-button {
            background-color: #008CBA;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #005C7A;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Anasayfa</a>
    </nav>

    <!-- Ekleme Formu -->
    <div class="form-container">
        <h3>Stant Ekle</h3>
        <form method="post">
            <div class="form-group">
                <label for="stant_numarasi">Stant Numarası:</label>
                <input type="text" id="stant_numarasi" name="stant_numarasi" required>
            </div>
            <div class="form-group">
                <label for="kiralama_tarihi">Kiralama Tarihi ve Saati:</label>
                <input type="text" id="kiralama_tarihi_ekle" name="kiralama_tarihi" class="datepicker" required>
            </div>
            <div class="form-group">
                <label for="kiralama_suresi">Kiralama Süresi (saat olarak):</label>
                <input type="number" id="kiralama_suresi" name="kiralama_suresi" required>
            </div>
            <div class="form-group">
                <label for="katilimci_id">Katılımcı Adı:</label>
                <select id="katilimci_id" name="katilimci_id" required>
                    <?php foreach($katilimciListesi as $katilimci): ?>
                        <option value="<?php echo $katilimci->KatilimciID; ?>"><?php echo $katilimci->Ad; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="ekle" value="Ekle">
            </div>
        </form>
    </div>


    <!-- Stantlar Tablosu -->
    <table>
        <thead>
            <tr>
                <th>Stant ID</th>
                <th>Stant Numarası</th>
                <th>Kiralama Tarihi ve Saati</th>
                <th>Kiralama Süresi (saat)</th>
                <th>Katılımcı ID</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($stantlarListesi as $stant):?>
                <tr>
                    <td><?php echo $stant->StantID?></td>
                    <td><?php echo $stant->StantNumarasi?></td>
                    <td><?php echo $stant->KiralamaTarihi?></td>
                    <td><?php echo $stant->KiralamaSuresi?></td>
                    <td><?php echo $stant->KatilimciID?></td>
                    <td>
                        <!-- Silme Formu -->
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $stant->StantID?>">
                            <input type="submit" name="sil" value="Sil" onclick="return confirm('Bu stantı silmek istediğinize emin misiniz?')">
                        </form>
                        <!-- Güncelleme Butonu -->
                        <button class="update-button" onclick="editModal(
                            '<?php echo $stant->StantID?>',
                            '<?php echo $stant->StantNumarasi?>',
                            '<?php echo $stant->KiralamaTarihi?>',
                            '<?php echo $stant->KiralamaSuresi?>',
                            '<?php echo $stant->KatilimciID?>')">Güncelle</button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <!-- Güncelleme Modalı -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Stant Güncelle</h3>
            <form method="post" class="form-container">
                <label for="stant_numarasi">Stant Numarası:</label>
                <input type="text" id="modalStantNumarasi" name="stant_numarasi" required><br>
                <label for="kiralama_tarihi">Kiralama Tarihi ve Saati:</label>
                <input type="text" id="modalKiralamaTarihi" name="kiralama_tarihi" class="datepicker" required><br>
                <label for="kiralama_suresi">Kiralama Süresi (saat olarak):</label>
                <input type="number" id="modalKiralamaSuresi" name="kiralama_suresi" required><br>
                <label for="katilimci_id">Katılımcı Adı:</label>
                <select id="modalKatilimciID" name="katilimci_id" required>
                    <?php foreach($katilimciListesi as $katilimci):?>
                        <option value="<?php echo $katilimci->KatilimciID;?>"><?php echo $katilimci->Ad;?></option>
                    <?php endforeach;?>
                </select>
                <input type="hidden" id="modalID" name="id">
                <input type="submit" name="guncelle" value="Güncelle" class="update-button" onclick="updateStant()">
            </form>
        </div>
    </div>
    
    <script>
        

        $('#kiralama_tarihi_ekle').datetimepicker({
                format: 'Y-m-d H:i:s',
                step: 30
            });


        // Güncelleme Modalı açma
        function editModal(id, stant_numarasi, kiralama_tarihi, kiralama_suresi, katilimci_id) {
            document.getElementById("modalID").value = id;
            document.getElementById("modalStantNumarasi").value = stant_numarasi;
            document.getElementById("modalKiralamaTarihi").value = kiralama_tarihi;
            document.getElementById("modalKiralamaSuresi").value = kiralama_suresi;
            document.getElementById("modalKatilimciID").value = katilimci_id;
            document.getElementById("editModal").style.display = "block";

            // Datepicker ayarları
            $('#modalKiralamaTarihi').datetimepicker({
                format: 'Y-m-d H:i:s',
                step: 30
            });
        }

        // Güncelleme Modalı kapatma
        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }

        // Güncelleme işlemi
        function updateStant() {
            var id = document.getElementById("modalID").value;
            var stantNumarasi = document.getElementById("modalStantNumarasi").value;
            var kiralamaTarihi = document.getElementById("modalKiralamaTarihi").value;
            var kiralamaSuresi = document.getElementById("modalKiralamaSuresi").value;
            var katilimciID = document.getElementById("modalKatilimciID").value; // Doğru ID'yi al

            // Ajax ile güncelleme işlemi
            $.ajax({
                type: "POST",
                url: "editStant.php",
                data: {
                    id: id,
                    stant_numarasi: stantNumarasi,
                    kiralama_tarihi: kiralamaTarihi,
                    kiralama_suresi: kiralamaSuresi,
                    katilimci_id: katilimciID // Güncellenen katılımcının ID'si
                },
                success: function (response) {
                    alert(response); // Sonucu alert olarak göster
                    location.reload(); // Sayfayı yenile
                }
            });
        }
    </script>
</body>
</html>
