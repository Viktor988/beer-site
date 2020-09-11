<?php 
namespace App\Config;
class Baza{
    public $konekcija;
    private static $db;

    private function __construct(){
        // echo "DB klasa napravljena!";
        $this->connect();
    }

    public static function instance(){
        if(self::$db === null){
            self::$db = new Baza();
        }
        return self::$db;
    }

    private function connect(){
        $this->konekcija = new \PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME,PASSWORD);
        $this->konekcija->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $this->konekcija->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


 function izvrsiSve($qveri){
return $this->konekcija->query($qveri)->fetchAll();
}
 function izvrsiJedan($qveri){
    return $this->konekcija->query($qveri)->fetch();
    }
    public function izvrsiInsert($query,$params=[]){
        $prepare = $this->konekcija->prepare($query);
        $prepare->execute($params);
     
    
    }
    public function Izvrsi($query,$params=[]){
        $prepare = $this->konekcija->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    
    }
  
      




}