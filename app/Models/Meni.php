<?php 
namespace app\Models;
class Meni{

    public $baza;
    function __construct( $baza){
        $this->baza=$baza;
    }


function prikaziMeni($status1,$status2){

$upit="SELECT * from meni where status=:status1 or status=:status2";
$sve=$this->baza->konekcija->prepare($upit);
$sve->bindParam("status1",$status1);
$sve->bindParam("status2",$status2);
 $sve->execute();
 return $sve->fetchAll();
}
function prikaziMeni2($status1,$status2,$status3){
  
    $upit="SELECT * from meni where status=:status1 or status=:status2 or status=:status3";
    $sve=$this->baza->konekcija->prepare($upit);
    $sve->bindParam("status1",$status1);
    $sve->bindParam("status2",$status2);
    $sve->bindParam("status3",$status3);
     $sve->execute();
     return $sve->fetchAll();  
    }


}
