<?php
include_once "classes/db.class.php";
include "classes/tablesCrud.class.php";

$oturumlar = new tableCrud();

// Ekleme işlemi
if(isset($_POST['ekle'])) {
    $oturumAdi = $_POST['oturum_adi'];
    $baslangicTarihiSaat = $_POST['baslangic'];
    $bitisTarihiSaat = $_POST['bitis'];
    $konusmacilar = $_POST['konusmacilar'];
    $etkinlikID = $_POST['etkinlik_id'];

    $eklemeBasarili = $oturumlar->createOturumlar($oturumAdi, $baslangicTarihiSaat, $bitisTarihiSaat, $konusmacilar, $etkinlikID);

    if($eklemeBasarili) {
        echo '<script>alert("Oturum başarıyla eklendi."); window.location.href = "oturumlar.php";</script>';
    } else {
        echo '<script>alert("Oturum eklenirken bir hata oluştu.");</script>';
    }
}

// Güncelleme işlemi
if(isset($_POST['guncelle'])) {
    $oturumID = $_POST['id'];
    $oturumAdi = $_POST['oturum_adi'];
    $baslangicTarihiSaat = $_POST['baslangic'];
    $bitisTarihiSaat = $_POST['bitis'];
    $konusmacilar = $_POST['konusmacilar'];
    $etkinlikID = $_POST['etkinlik_id'];

    $guncellemeBasarili = $oturumlar->editOturumlar($oturumID, $oturumAdi, $baslangicTarihiSaat, $bitisTarihiSaat, $konusmacilar, $etkinlikID);

    if($guncellemeBasarili) {
        echo '<script>alert("Oturum başarıyla güncellendi."); window.location.href = "oturumlar.php";</script>';
    } else {
        echo '<script>alert("Oturum güncellenirken bir hata oluştu.");</script>';
    }
}

// Silme işlemi
if(isset($_POST['sil'])) {
    $oturumID = $_POST['id'];

    $silmeBasarili = $oturumlar->deleteOturumlar($oturumID);

    if($silmeBasarili) {
        echo '<script>alert("Oturum başarıyla silindi."); window.location.href = "oturumlar.php";</script>';
    } else {
        echo '<script>alert("Oturum silinemedi.");</script>';
    }
}

$oturumlarListesi = $oturumlar->listOturumlar();
$etkinliklerListesi = $oturumlar->listEtkinlikler();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oturumlar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <style>

    a#anasayfa-link {
        display: inline-block;
        padding: 10px 20px; /* Kutunun içerisindeki boşluk */
        color: #fff; /* Yazı rengi */
        background-color: #007bff; /* Kutu rengi */
        text-decoration: none; /* Altı çizili olmasın */
        border-radius: 5px; /* Kenarları yuvarla */
        transition: background-color 0.3s ease; /* Renk değişimini yumuşak yapar */
         }

        a#anasayfa-link:hover {
        background-color: #0056b3; /* Hover efekti ile renk değişimi */
        }   


        /* CSS kodları burada */
        /* CSS kodları burada */
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
            margin-top: 20px;
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
            margin-top: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container select {
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

        .form-container h3 {
            margin-top: 0;
        }

        .form-container .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<a href="index.php" id="anasayfa-link">Anasayfa</a>
<body>
    <h2>Oturumlar</h2>

<!-- Ekleme Formu -->
<div class="form-container">
    <h3>Oturum Ekle</h3>
    <form method="post">
        <div class="form-group">
            <label for="oturum_adi">Oturum Adı:</label>
            <input type="text" id="oturum_adi" name="oturum_adi" required>
        </div>
        <div class="form-group">
            <label for="baslangic">Başlangıç Tarihi ve Saati:</label>
            <div class="input-group date" id="baslangic_datetimepicker" data-target-input="nearest">
                <input type="text" id="baslangic" name="baslangic" class="form-control datetimepicker-input" data-target="#baslangic_datetimepicker" required />
                <div class="input-group-append" data-target="#baslangic_datetimepicker" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="bitis">Bitiş Tarihi ve Saati:</label>
            <div class="input-group date" id="bitis_datetimepicker" data-target-input="nearest">
                <input type="text" id="bitis" name="bitis" class="form-control datetimepicker-input" data-target="#bitis_datetimepicker" required />
                <div class="input-group-append" data-target="#bitis_datetimepicker" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="konusmacilar">Konusmacılar:</label>
            <input type="text" id="konusmacilar" name="konusmacilar" required>
        </div>
        <div class="form-group">
            <label for="etkinlik_id">Etkinlik Adı:</label>
            <select id="etkinlik_id" name="etkinlik_id" required>
                <?php foreach($etkinliklerListesi as $etkinlik): ?>
                    <option value="<?php echo $etkinlik->EtkinlikID; ?>"><?php echo $etkinlik->EtkinlikAdi; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="ekle" value="Ekle">
        </div>
    </form>
</div>





    <!-- Oturumlar Tablosu -->
    <table>
        <thead>
            <tr>
                <th>Oturum ID</th>
                <th>Oturum Adı</th>
                <th>Başlangıç Tarihi ve Saati</th>
                <th>Bitiş Tarihi ve Saati</th>
                <th>Konusmacılar</th>
                <th>Etkinlik ID</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($oturumlarListesi as $oturum):?>
                <tr>
                    <td><?php echo $oturum->OturumID?></td>
                    <td><?php echo $oturum->OturumAdi?></td>
                    <td><?php echo $oturum->BaslangicTarihiSaat?></td>
                    <td><?php echo $oturum->BitisTarihiSaat?></td>
                    <td><?php echo $oturum->Konusmacilar?></td>
                    <td><?php echo $oturum->EtkinlikID?></td>
                    <td>
                        <!-- Silme Formu -->
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $oturum->OturumID?>">
                            <button type="submit" name="sil">Sil</button>
                        </form>
                        <!-- Güncelleme Formu -->
                        <button onclick="editModal(
                            '<?php echo $oturum->OturumID?>',
                            '<?php echo $oturum->OturumAdi?>',
                            '<?php echo $oturum->BaslangicTarihiSaat?>',
                            '<?php echo $oturum->BitisTarihiSaat?>',
                            '<?php echo $oturum->Konusmacilar?>',
                            '<?php echo $oturum->EtkinlikID?>')">Güncelle</button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <!-- Güncelleme Modalı -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="form-container">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Oturum Güncelle</h3>
            <form method="post">
                <div class="form-group">
                    <label for="modal_oturum_adi">Oturum Adı:</label>
                    <input type="text" id="modal_oturum_adi" name="oturum_adi" required>
                </div>
                <div class="form-group">
                    <label for="modal_baslangic">Başlangıç Tarihi ve Saati:</label>
                    <input type="text" id="modal_baslangic" name="baslangic" placeholder="Seçiniz" required>
                </div>
                <div class="form-group">
                    <label for="modal_bitis">Bitiş Tarihi ve Saati:</label>
                    <input type="text" id="modal_bitis" name="bitis" placeholder="Seçiniz" required>
                </div>
                <div class="form-group">
                    <label for="modal_konusmacilar">Konusmacılar:</label>
                    <input type="text" id="modal_konusmacilar" name="konusmacilar" required>
                </div>
                <div class="form-group">
                    <label for="modal_etkinlik_id">Etkinlik ID:</label>
                    <select id="modal_etkinlik_id" name="etkinlik_id" required>
                        <?php foreach($etkinliklerListesi as $etkinlik): ?>
                            <option value="<?php echo $etkinlik->EtkinlikID; ?>"><?php echo $etkinlik->EtkinlikAdi; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" id="modal_ID" name="id">
                    <input type="submit" name="guncelle" value="Güncelle">
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            // Başlangıç Tarihi ve Saati için datetimepicker
            $('#baslangic').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss'
                }
            });

            // Bitiş Tarihi ve Saati için datetimepicker
            $('#bitis').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss'
                }
            });
        });

        function editModal(id, oturumAdi, baslangic, bitis, konusmacilar, etkinlikID) {
            document.getElementById("modal_ID").value = id;
            document.getElementById("modal_oturum_adi").value = oturumAdi;
            document.getElementById("modal_baslangic").value = baslangic;
            document.getElementById("modal_bitis").value = bitis;
            document.getElementById("modal_konusmacilar").value = konusmacilar;
            document.getElementById("modal_etkinlik_id").value = etkinlikID;
            document.getElementById("editModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>
</body>
</html>
