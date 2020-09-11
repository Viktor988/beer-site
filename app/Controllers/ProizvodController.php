<?php 
namespace App\Controllers;

use App\Config\Baza;
use app\Controllers\Controller;
use App\Models\Proizvodi;
use App\Models\Zemlja;
use App\Models\Vrsta;
use App\Models\Zapremina;
use App\Models\Ocena;
use PDOException;
class ProizvodController extends Controller{
    private $model;
    public function __construct(){
        $this->model = new Proizvodi(Baza::instance());
        $this->model2 = new Zemlja(Baza::instance());
        $this->model3 = new Zapremina(Baza::instance());
        $this->model4 = new Ocena(Baza::instance());
    }

    public function dohvatiProizvode(){
      $id=$_GET['id'];
      try{
        $sve=$this->model->dohvatiProizvod($id);
        echo json_encode($sve);}
        catch(PDOException $e){
          $this->upisiGreskuUFajl($e->getMessage()); 
          }
    }

    public function dohvatiJedan(){
      if(isset($_GET['id'])){
        require_once "app/views/fixed/head.php";
        require_once "app/views/fixed/iznad.php";
        $ide=new Controller();
        $ide->vratMeni();
        require_once "app/views/fixed/header.php";
        $id=$_GET['id'];
        $proizvod=$this->model->dohvatiProizvod($id);
        $zapremina=$this->model3->ispisiZapremine();
        $ocena=$this->model4->prikaziProsecnuOcenu($id);
        view("pages/proizvod",["upit1"=>$proizvod,"upitz"=>$zapremina,"ocena"=>$ocena]);
        require_once "app/views/fixed/futer.php";
      }}

      public function dohvatiCenu(){
        if(isset($_GET['id'])){
          $id=$_GET['id'];
          $idzap=$_GET['idzap'];
          try{
        $cena=$this->model3->ispisiCenu($id,$idzap);
        echo json_encode($cena);}
        catch(PDOException $e){
          $this->upisiGreskuUFajl($e->getMessage());
      }
            }}

          public function oceni(){
       if(isset($_POST['idproizvod'])){
              $idko=$_SESSION['korisnik']->idKorisnik;
              $idpr=$_POST['idproizvod'];
              $ocena=$_POST['vr'];
            try{
              $sve=$this->model4->upisiGlasanje($idko,$idpr,$ocena);
          
            }
              catch(PDOException $e){
                $this->upisiGreskuUFajl($e->getMessage());
            }
            }}

              public function proveriGlasanje(){
                if(isset($_POST['idproizvod'])){
                $idko=$_SESSION['korisnik']->idKorisnik;
                  $idpr=$_POST['idproizvod'];
                  try{
                  $sve=$this->model4->proveri($idko,$idpr);
                echo json_encode($sve);}
                catch(PDOException $e){
                  $this->upisiGreskuUFajl($e->getMessage());
              }
                }}

           
}

  

    











