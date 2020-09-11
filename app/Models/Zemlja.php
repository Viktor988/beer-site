<?php 
namespace app\Models;
class Zemlja{

    public $baza;
    function __construct( $baza){
        $this->baza=$baza;
    }

    function ispisiZemlje(){
        $upit="SELECT * from zemlja";
        $sve=$this->baza->izvrsiSve($upit);
        return $sve;
        }


}
