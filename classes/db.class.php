<?php

class Db{
    private $hots = "localhost";
    private $user = "root";
    private $password = "ivad310rb";
    private $dbName = "veritabani";


    protected function connect(){
        try{
            $dsn = "mysql:host=". $this->hots.";dbname=". $this->dbName;
            $pdo = new PDO($dsn,$this->user,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

            return $pdo;
            
        }catch(PDOException $e){
            echo "Bağlantı Hatası". $e->getMessage();

        }
    }

}


?>