<?php 
namespace App\Controllers;

use app\Controllers\Controller;
use app\Models\Proizvodi;
use App\Config\Baza;
use App\Models\Korpa;
use PDOException;
class PorudzbineController extends Controller{
    private $model;
    public function __construct(){
        $this->model = new Proizvodi(Baza::instance());
        $this->model2 = new Korpa(Baza::instance());
    }

    public function prikaziView(){
if(isset($_SESSION['korisnik'])){
     
$id=$_SESSION['korisnik']->idKorisnik;}
     require_once "app/views/fixed/head.php";
     require_once "app/views/fixed/iznad.php";
     $ide=new Controller();
     $ide->vratMeni();
     require_once "app/views/fixed/header.php";
     if(isset($_SESSION['korisnik'])){
        $id=$_SESSION['korisnik']->idKorisnik;
        $proizvod=$this->model->dohvatiProizvodSaOcenom($id);
        $kupovine=$this->model2->prikaziPorudzbine($id);
            view("pages/porudzbine",["upit1"=>$proizvod,"upit2"=>$kupovine]);}
require_once "app/views/fixed/futer.php";
     
        
        
    }

}