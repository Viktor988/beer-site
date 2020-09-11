<?php 
namespace app\Models;
class Zapremina{

    public $baza;
    function __construct( $baza){
        $this->baza=$baza;
    }

    function ispisiZapremine(){
        $upit="SELECT * from zapremina";
        $sve=$this->baza->izvrsiSve($upit);
        return $sve;
        }
        function ispisiCenu($id,$idzap){
            $upit="SELECT * from proizvodzapremina where idProizvod=:id and idZapremina=:idzap";
            $sve=$this->baza->konekcija->prepare($upit);
            $sve->bindParam(":id",$id);
            $sve->bindParam(":idzap",$idzap);
            $ide=$sve->execute();
            $da=$sve->fetch();
            return $da;
           }


}