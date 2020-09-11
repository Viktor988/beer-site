<?php 
namespace App\Controllers;
require_once "app/Models/Proizvodi.php";
require_once "app/Models/Zemlja.php";
require_once "app/Models/Zapremina.php";
require_once "app/Config/helpers.php";

use App\Config\Baza;
use app\Controllers\Controller;
use App\Models\Proizvodi;
use PDOException;

class PocetnaController extends Controller{

    private $model;
    public function __construct(){
        $this->model = new Proizvodi(Baza::instance());}


        public function vratiCetiri(){
            try{
            $sve=$this->model->dohvatiCetiriProizovda();
            view("pages/pocetna",["proizvod"=>$sve]);}
            catch(PDOException $e){
                $this->upisiGreskuUFajl($e->getMessage());
            }}

        public function ucitajView(){
        require_once "app/views/fixed/head.php";
        require_once "app/views/fixed/iznad.php";
        $ide=new Controller();
        $ide->vratMeni();
        require_once "app/views/fixed/header.php";
        $sve=$this->model->dohvatiCetiriProizovda();
        view("pages/pocetna",["proizvod"=>$sve]);
        require_once "app/views/fixed/futer.php";
        }
      
       
        

}