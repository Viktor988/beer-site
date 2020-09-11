<?php 
namespace App\Controllers;
require_once "app/Models/Korisnik.php";

use app\Controllers\Controller;
use app\Models\Korisnik;
use App\Config\Baza;
use PDOException;

class KontaktController extends Controller{

    private $model;
    public function __construct(){
        $this->model = new Korisnik(Baza::instance());
 
    }

function posaljiPoruku(){
    if(isset($_POST['email'])){
$kome="viktorciric31@gmail.com";
$email=$_POST['email'];
$poruka=$_POST['poruka'];
try{
$this->model->posaljiPoruku($kome,$email,$poruka);}
catch(PDOException $e){
    $this->upisiGreskuUFajl($e->getMessage());
}}}}
