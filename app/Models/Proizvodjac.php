<?php
namespace app\Models;
class Proizvodjac{

public $baza;
function __construct( $baza){
    $this->baza=$baza;
}

public function ispisiProizvodjace(){
$upit="SELECT * from proizvodjac";
$sve=$this->baza->izvrsiSve($upit);
return $sve;
}


}
