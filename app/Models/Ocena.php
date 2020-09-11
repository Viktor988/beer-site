<?php
namespace app\Models;

use PDOException;

class Ocena{

public $baza;
function __construct( $baza){
    $this->baza=$baza;
}

public function upisiGlasanje($idkorisnik,$idproizvod,$idocena){
    try{
$upit=$this->baza->izvrsiInsert("INSERT INTO ocenjivanje (idkorisnik,idProizvod,idOcena) VALUES(?,?,?)",[$idkorisnik,$idproizvod,$idocena]);
   http_response_code(201); }

    catch(PDOException $e){
        echo $e->getMessage();
        http_response_code(401);
    }


}

public function proveri($idkorisnik,$idproizvod){
    $upit= "SELECT count(*) as broj from ocenjivanje where idkorisnik=:idk and idProizvod=:idp";
    $sve=$this->baza->konekcija->prepare($upit);
    $sve->bindParam(":idk",$idkorisnik);
    $sve->bindParam(":idp",$idproizvod);
    try{
    $rezultat=$sve->execute();
    return $sve->fetch();}
    catch(\PDOException $e){
        echo $e->getMessage();
          http_response_code(500);}}
        


public function prikaziProsecnuOcenu($id){

    return $this->baza->izvrsiJedan("SELECT AVG(idOcena) as ocena,COUNT(idkorisnik) as broj FROM ocenjivanje WHERE idProizvod=$id");

}

        
        }
