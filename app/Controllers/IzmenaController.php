<?php 
namespace App\Controllers;
require_once "app/Models/Korisnik.php";

use app\Controllers\Controller;
use app\Models\Korisnik;
use App\Config\Baza;
use PDOException;

class IzmenaController extends Controller{

    private $model;
    public function __construct(){
        $this->model = new Korisnik(Baza::instance());
 
    }

    function izmeniNalog(){
    $reime="/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/";
    $relozinka="/^[A-z]{3,}[0-9]{1,}/";
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $id=$_POST['id'];
    $lozinka=$_POST['lozinka'];
    $ponovo=$_POST['ponovo'];
    $greske=[];
    if($ime==""){
        $greske[]="Ime i prezime je obavezno!";
    }	
        else if(!preg_match($reime,$ime))
        {
        $greske[]="Greska - ime";}
            if($lozinka==""){
            $greske[]="Lozinka je obavezna!";
            }
                else if(!preg_match($relozinka,$lozinka))
                {
                $greske[]="Greska -Lozinka!";    
                }
                if($ponovo!=$lozinka){
                    $greske[]="Greska-Lozinke se ne poklapaju!";
                }
                if(count($greske)){
                    foreach($greske as $gr){
                        echo $gr;}}
    else{
    try{
    $this->model->izmeniKorisnik($ime,$prezime,$lozinka,$ponovo,$id);
    http_response_code(204);
    }
    catch(PDOException $e){
        $this->upisiGreskuUFajl($e->getMessage());
    }}}}