<?php
//Otomasyonda tablolarda ki crud işlemler için kullanılacak class

class tableCrud extends Db{
    
    //Ekrana yazdırma fonksiyonları:--------------------------------------------------------------------------------------------

    public function listEtkinlikler(){
        $sql = "SELECT * FROM etkinlikler";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function listKatilimcilar(){
        $sql = "SELECT * FROM katilimcilar";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function listKatilimcilarOturumlar(){
        $sql = "SELECT * FROM katilimcilar_oturumlar";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }


    public function listOturumlar(){
        $sql = "SELECT * FROM oturumlar";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function listGeçmisOturumlar(){
        $sql = "SELECT * FROM silinenoturumlar";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function listStantlar(){
        $sql = "SELECT * FROM stantlar";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

//-------------------------------------------------------------------------------------------------------------------------------


//Id ye göre ekrana yazdırma kodları



public function listEtkinliklerById(int $id){
    $sql = "SELECT * FROM etkinlikler WHERE EtkinlikID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
}

public function listKatilimcilarById(int $id){
    $sql = "SELECT * FROM katilimcilar WHERE KatilimciID = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();

}


public function listOturumlarById(int $id){
    $sql = "SELECT * FROM oturumlar WHERE OturumID = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();

}

public function listSilinenOturumlarById(int $id){
    $sql = "SELECT * FROM silinenoturumlar WHERE SilinenOturumID = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}



public function listStantlarById(int $id){
    $sql = "SELECT * FROM stantlar WHERE StantID = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();

}

//------------------------------------------------------------------------------------------------------------------------------------

//Veri Ekleme işlemleri

public function createEtkinlik($etkinlikAdi, $tarihSaat, $yer, $aciklama){
    $sql = "INSERT INTO etkinlikler (EtkinlikAdi, TarihSaat, Yer, Aciklama) VALUES (:etkinlikAdi,:tarihSaat,:yer, :aciklama)";
    $stmt = $this->connect()->prepare($sql);

   return $stmt->execute([

        'etkinlikAdi' => $etkinlikAdi,
        'tarihSaat' => $tarihSaat,
        'yer'=>$yer,
        'aciklama'=>$aciklama
    ]);
}


public function createKatilimci($ad, $soyad, $kurum, $iletisimBilgileri){
    $sql = "INSERT INTO katilimcilar (Ad, Soyad, Kurum, IletisimBilgileri,KayitTarihi) VALUES (:ad,:soyad,:kurum, :iletisim,:kayitTarihi)";
    $stmt = $this->connect()->prepare($sql);

   return $stmt->execute([

        'ad' => $ad,
        'soyad' => $soyad,
        'kurum'=>$kurum,
        'iletisim'=>$iletisimBilgileri,
        'kayitTarihi'=>date(
            'Y-m-d H:i:s'
        )
    ]);
}

public function createOturumlar($oturumAdi, $baslangicTarihiSaat, $bitisTarihiSaat, $konusmacilar,$etkinlikID){
    $sql = "INSERT INTO oturumlar (OturumAdi, BaslangicTarihiSaat, BitisTarihiSaat, Konusmacilar,EtkinlikID) VALUES (:oturumAd,:baslangicTarihSaat,:bitisSaat, :konusmacilar,:etkinlikId)";
    $stmt = $this->connect()->prepare($sql);

   return $stmt->execute([

        'oturumAd' => $oturumAdi,
        'baslangicTarihSaat' => $baslangicTarihiSaat,
        'bitisSaat'=>$bitisTarihiSaat,
        'konusmacilar'=>$konusmacilar,
        'etkinlikId'=>$etkinlikID
    ]);
}

public function createStant($stantNumarasi, $kiralamaTarihi, $kiralamaSuresi, $katilimciID){
    $sql = "INSERT INTO stantlar (StantNumarasi, KiralamaTarihi, KiralamaSuresi, KatilimciID) VALUES (:stantNumarasi, :kiralamaTarihi, :kiralamaSuresi, :katilimciID)";
    $stmt = $this->connect()->prepare($sql);

    return $stmt->execute([
        'stantNumarasi' => $stantNumarasi,
        'kiralamaTarihi' => $kiralamaTarihi,
        'kiralamaSuresi' => $kiralamaSuresi,
        'katilimciID' => $katilimciID
    ]);
}


//Insert işlemleri Bitti
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//Update İşlemleri


public function editEtkinlikler($etkinlikID,$etkinlikAdi, $tarihSaat, $yer, $aciklama){
    $sql = "UPDATE  etkinlikler SET EtkinlikAdi = :etkinlikAdi, TarihSaat = :tarihSaat, Yer = :yer, Aciklama=:aciklama WHERE EtkinlikID = :etkinlikID";
     $stmt = $this->connect()->prepare($sql);

    return $stmt->execute([
         'etkinlikID' => $etkinlikID,
         'etkinlikAdi' => $etkinlikAdi,
         'tarihSaat' => $tarihSaat,
         'yer'=>$yer,
         'aciklama'=>$aciklama
     ]);
 }


 public function editKatilimcilar($katilimciID,$ad, $soyad, $kurum, $iletisimBilgileri){
    $sql = "UPDATE  katilimcilar SET Ad = :ad, Soyad = :soyad, Kurum = :kurum, IletisimBilgileri=:iletisimBilgileri, KayitTarihi=:kayitTarihi WHERE KatilimciID = :katilimciId";
     $stmt = $this->connect()->prepare($sql);

    return $stmt->execute([
         'katilimciId' => $katilimciID,
         'ad' => $ad,
         'soyad' => $soyad,
         'kurum'=>$kurum,
         'iletisimBilgileri'=>$iletisimBilgileri,
         'kayitTarihi'=>date(
            'Y-m-d H:i:s'
         )
         
     ]);
 }


 public function editOturumlar($oturumID,$oturumAdi, $baslangicTarihiSaat, $bitisTarihiSaat, $konusmacilar, $etkinlikID){
    $sql = "UPDATE  oturumlar SET OturumAdi = :oturumAdi, BaslangicTarihiSaat = :baslangicTarihiSaat, BitisTarihiSaat = :bitisTarihiSaat, Konusmacilar=:konusmacilar, EtkinlikID=:etkinlikID WHERE OturumID = :oturumID";
     $stmt = $this->connect()->prepare($sql);

    return $stmt->execute([
         'oturumID' => $oturumID,
         'oturumAdi' => $oturumAdi,
         'baslangicTarihiSaat' => $baslangicTarihiSaat,
         'bitisTarihiSaat'=>$bitisTarihiSaat,
         'konusmacilar'=>$konusmacilar,
         'etkinlikID'=>$etkinlikID
     ]);
 }

 public function editStantlar($stantID, $stantNumarasi, $kiralamaTarihi, $kiralamaSuresi, $katilimciID){
    try {
        $sql = "UPDATE stantlar SET StantNumarasi = :stantNumarasi, KiralamaTarihi = :kiralamaTarihi, KiralamaSuresi = :kiralamaSuresi, KatilimciID = :katilimciID WHERE StantID = :stantID";
        $stmt = $this->connect()->prepare($sql);

        $result = $stmt->execute([
            'stantID' => $stantID,
            'stantNumarasi' => $stantNumarasi,
            'kiralamaTarihi' => $kiralamaTarihi,
            'kiralamaSuresi' => $kiralamaSuresi,
            'katilimciID' => $katilimciID
        ]);

        if ($result) {
            echo "Stant başarıyla güncellendi.";
        } else {
            echo "Stant güncelleme işlemi başarısız oldu.";
        }

        return $result;
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
        return false;
    }
}



 //Update işlemleri bitti



 //--------------------------------------------------------------------------------------------------------------------------------------------------------------------
 
//Delete işlemleri


public function deleteEtkinlikler($etkinlikID){
    $sql = "DELETE FROM etkinlikler WHERE EtkinlikID=:etkinlikId";
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([
        'etkinlikId'=> $etkinlikID
    ]);

}


public function deleteKatilimcilar($katilimciID){
    $sql = "DELETE FROM katilimcilar WHERE KatilimciID=:katilimciID";
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([
        'katilimciID'=> $katilimciID
    ]);

}
public function deleteOturumlar($oturumID){
    $pdo = $this->connect();
    try {
        $pdo->beginTransaction();

        // Oturumu sil
        $sqlDeleteOturum = "DELETE FROM oturumlar WHERE OturumID = :oturumID";
        $stmtDeleteOturum = $pdo->prepare($sqlDeleteOturum);
        $stmtDeleteOturum->execute(['oturumID' => $oturumID]);

        // İlgili etkinliği sil
        $sqlDeleteEtkinlik = "DELETE FROM etkinlikler WHERE EtkinlikID = (
            SELECT EtkinlikID FROM oturumlar WHERE OturumID = :oturumID
        )";
        $stmtDeleteEtkinlik = $pdo->prepare($sqlDeleteEtkinlik);
        $stmtDeleteEtkinlik->execute(['oturumID' => $oturumID]);

        $pdo->commit();
        return true;
    } catch (PDOException $e) {
        $pdo->rollBack();
        // Hata mesajını ekrana yazdır
        echo "Silme Hatası: " . $e->getMessage();
        return false;
    }
}









public function deleteStantlar($stantID) {
    try {
        $sql = "DELETE FROM stantlar WHERE StantID = :stantID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':stantID', $stantID, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result) {
            echo "Stant başarıyla silindi.";
        } else {
            echo "Stant silme işlemi başarısız oldu.";
        }

        return $result;
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
        return false;
    }
}













//Delete İşlemi Bitiş

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------













}





?>