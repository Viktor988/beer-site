<?php 
namespace App\Controllers;
use App\Config\Baza;
use app\Controllers\Controller;
use App\Models\Proizvodi;
use App\Models\Zemlja;
use App\Models\Vrsta;
use PDOException;

class ProizvodiControler extends Controller{
    private $model;
    public function __construct(){
        $this->model = new Proizvodi(Baza::instance());
        $this->model2 = new Zemlja(Baza::instance());
        $this->model3 = new Vrsta(Baza::instance());

    }

   
function ispisiProizvode(){
    try{
$sve=$this->model->ispisiProizvod();
http_response_code(200);
echo json_encode($sve);}
catch(PDOException $e){
    $this->upisiGreskuUFajl($e->getMessage());
}}


function ispisiDrzave(){
    try{
    $sve=$this->model2->ispisiZemlje();
    http_response_code(200);
    echo json_encode($sve);}
    catch(PDOException $e){
    $this->upisiGreskuUFajl($e->getMessage()); 
    }
}
function ispisVrsta(){
    try{
    $sve=$this->model3->ispisiVrste();
    echo json_encode($sve);}
    catch(PDOException $e){
        $this->upisiGreskuUFajl($e->getMessage()); 
        }
}
function ispisPaginacije(){
    if(isset($_POST['send2'])){
        $zemlja=$_POST['zemlja'];
        $marka=$_POST['marka'];
        $trazi=$_POST['trazi'];
        $cena=$_POST['cena'];
        $sort=$_POST['sort'];
        try{
        $sve=$this->model->brojProizovdeZaFiltriranje($zemlja,$marka,$trazi,$sort,$cena);
        echo json_encode($sve);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage()); 
            }}
    else{
        try{
        $sve=$this->model->brojProizvode();
        echo json_encode($sve);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage()); 
            }
    }}
     public function prikaziView(){
        require_once "app/views/fixed/head.php";
        require_once "app/views/fixed/iznad.php";
        $ide=new Controller();
        $ide->vratMeni();
        require_once "app/views/fixed/header.php";
    
        $sve2=$this->model2->ispisiZemlje();
        $sve3=$this->model3->ispisiVrste();
        $sve4=$this->model->brojProizvode();
       


        view("pages/proizvodi",["zemlje"=>$sve2,"vrste"=>$sve3,"broj"=>$sve4]);
        

        require_once "app/views/fixed/futer.php";
       }

function filteripaginacija(){
    if(isset($_POST['send'])){
        $pag=($_POST['pag']-1)*4;
        $zemlja=$_POST['zemlja'];
        $marka=$_POST['marka'];
        $trazi=$_POST['trazi'];
        $cena=$_POST['cena'];
        $sort=$_POST['sort'];
        try{
        $sve=$this->model->filtriranje($zemlja,$marka,$trazi,$sort,$cena,$pag);
        echo json_encode($sve);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage()); 
            }
}}
public function dajJedan(){
    $id=$_GET['id'];
    try{
    $upit1=$this->model->dohvatiProizvod($id);
    view("pages/proizvod",["upit1"=>$upit1]);}
    catch(PDOException $e){
        $this->upisiGreskuUFajl($e->getMessage()); 
        }}}