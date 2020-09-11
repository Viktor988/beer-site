<?php 
namespace App\Controllers;
require_once "app/Models/Proizvodi.php";

use app\Controllers\Controller;
use app\Models\Proizvodi;
use App\Config\Baza;
use App\Models\Korpa;
use PDOException;
class KorpaController extends Controller{

    private $model;
    public function __construct(){
        $this->model = new Korpa(Baza::instance());
        $this->model2 = new Proizvodi(Baza::instance());
       
    }

public function ispisiProizvodeUkorpi(){
    try{
    $sve=$this->model2->ispisiProizvodBezOgranicenja();
    echo json_encode($sve);}
    catch(PDOException $e){
        $this->upisiGreskuUFajl($e->getMessage());
    }
}

public function ubaciUkorpu(){

    $idko=$_SESSION['korisnik']->idKorisnik;
    $idpz=$_POST['id'];
    $kolicina=$_POST['kol'];
    $isporuka=$_POST['isporuka'];
    try{
    $sve=$this->model->ubaci($idko,$idpz,$kolicina,$isporuka);
   }
    catch(PDOException $e){
        $this->upisiGreskuUFajl($e->getMessage());
    }

}

    public function prikaziIzKorpe(){
        try{
        $sve=$this->model->prikaziUadminPamenu();
        echo json_encode($sve);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage());
        }
    }
}