<?php 
namespace App\Controllers;
require_once "app/Models/Korisnik.php";
use app\Controllers\Controller;
use app\Models\Korisnik;
use App\Config\Baza;
use PDOException;
class PrijavaiRegistracijaController extends Controller{
    private $model;
    public function __construct(){
        $this->model = new Korisnik(Baza::instance());
       
    }
    public function registruj(){
        if(isset($_POST['ime'])){
        $reime="/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/";
        $reemail="/^[\w]+[\.\_\-\w]*[0-9]{0,3}\@[\w]+([\.][\w]+)+$/";
        $relozinka="/^[A-z]{3,}[0-9]{1,}/";
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $email=$_POST['email'];
        $lozinka=$_POST['lozinka'];
        $ponovo=$_POST['ponovo'];
        $greske=[];
        if($ime==""){
            $greske[]="Ime i prezime je obavezno!";}
            else if(!preg_match($reime,$ime))
            {$greske[]="Greska - ime";}
            if($email==""){
             $greske[]="E-mail je obavezan!";} 
                else if(!preg_match($reemail,$email))
                {
                $greske[]="Greska - E-mail!";}
                if($lozinka==""){
                    $greske[]="Lozinka je obavezna!";}
                    else if(!preg_match($relozinka,$lozinka))
                    {
                    $greske[]="Greska -Lozinka!";}
                    if($ponovo!=$lozinka){
                        $greske[]="Greska-Lozinke se ne poklapaju!";}
                    if(count($greske)){
                        foreach($greske as $gr){
                            echo $gr;}}
        else
        {
        try{
        $this->model->registruj($ime,$prezime,$email,$lozinka,$ponovo,'2');
        http_response_code(201);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage());
        }
    }}}

    public function prijavi(){
        if(isset($_POST['prijavaime'])){
        $emajl=$_POST['prijavaime'];
        $lozinka=$_POST['prijavasifra'];
        $reemail="/^[\w]+[\.\_\-\w]*[0-9]{0,3}\@[\w]+([\.][\w]+)+$/";
        $relozinka="/^[A-z]{3,}[0-9]{1,}/";
        $greske2=0;
        if(!preg_match($reemail,$emajl)){
        $greske2=1;
        }
        if(!preg_match($relozinka,$lozinka)){
            $greske2=1;
        }
        if($greske2==0){
        try{
        $this->model->prijavi($emajl,$lozinka);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage());
        }
}}}
public function odjavi(){
  
    unset($_SESSION['korisnik']);
    session_destroy();
    header("Location: index.php?page=pocetna");
}
}




