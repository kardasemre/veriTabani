<?php

//Bu classı oluşturmamızın amacı dabasede kullandığımız viewlerin kullanıcılara gösterimini belirtmektir.
//Bir geliştirici gibi değil daha sadece bir şekilde kullanıcı verileri görüp ona göre işlem yapabilmektedir.


//Burada sadece viewler yani kullanıcılar herhangi bir arama yapacağı zaman sadeleştirilmiş şekilde gösterilecektir.



class UserView extends Db{

   

    public function listEtkinlikOturumBilgisi(){
        $sql = "SELECT * FROM etkinlikler_oturumlar";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }  
    public function listEtkinlikOturumBilgisiById(int $id){
        $sql = "SELECT * FROM etkinlikler_oturumlar WHERE EtkinlikID=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch();
    }
    

    public function searchEtkinlikOturumBilgisi($search){
        $sql = "SELECT * FROM etkinlikler_oturumlar WHERE 
                    EtkinlikID LIKE :search";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['search' => "%$search%"]);
        return $stmt->fetchAll();
    }
    
    
    


//-------------------------------------------------------------------------------------------------------------------


    public function listKatilimciEtkinlikBilgisi(){
        $sql = "SELECT * FROM katilimci_stant_bilgileri";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
  
public function listKatilimciEtkinlikBilgisiById(int $id){

    $sql = "SELECT * FROM katilimci_stant_bilgileri WHERE KatilimciID=:id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return $stmt->fetch();
}
public function searchKatilimciEtkinlikBilgisi($search){
    $sql = "SELECT * FROM katilimci_stant_bilgileri WHERE 
                KatilimciID LIKE :search";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(['search' => "%$search%"]);
    return $stmt->fetchAll();
}




//-------------------------------------------------------------------------------------------------------------------






    public function listKatilimciOturumBilgisi(){
        $sql = "SELECT * FROM katilimci_etkinlik_bilgileri";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listKatilimciOturumBilgisiById(int $id){
        $sql = "SELECT * FROM katilimci_etkinlik_bilgileri WHERE KatilimciID=:id ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch();
    }

    public function searchKatilimciOturumBilgisiById($id){
        $sql = "SELECT * FROM katilimci_etkinlik_bilgileri WHERE KatilimciID=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }
    


//-------------------------------------------------------------------------------------------------------------------





    public function listStantKatilimciBilgisi(){
        $sql = "SELECT * FROM tum_stantlar";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function listStantKatilimciBilgisiById(int $id){
        $sql = "SELECT * FROM tum_stantlar WHERE StantID=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch();

    }

    public function searchStantKatilimciBilgisi($id){
        $sql = "SELECT * FROM tum_stantlar WHERE StantID=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }




}


?>