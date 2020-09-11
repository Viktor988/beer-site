<?php 
namespace app\Models;
class Vrsta{

    public $baza;
    function __construct( $baza){
        $this->baza=$baza;
    }

    function ispisiVrste(){
        $upit="SELECT * from vrsta";
        $sve=$this->baza->izvrsiSve($upit);
        return $sve;
        }


}