<?php 

namespace App\Controllers;

use App\Config\Baza;
use app\Models\Meni;
use App\Models\Zemlja;
use PDOException;
class Controller {
    private $model;
    public function __construct(){
        $this->model = new Meni(Baza::instance());
        $this->model2 = new Zemlja(Baza::instance());
    }

    public function dohvatiPodatkezastranicu($promenjiva){
        require_once "app/views/fixed/head.php";
        require_once "app/views/fixed/iznad.php";
        $ide=new Controller();
        $ide->vratMeni();
        require_once "app/views/fixed/header.php";
        require_once "app/views/pages/$promenjiva.php";
        require_once "app/views/fixed/futer.php";}

public function vratMeni(){
global $prikaz;
    if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->idUloga==2){
        $prikaz= $this->model->prikaziMeni(0,3);}
        else if($_SESSION['korisnik']->idUloga==1){
            $prikaz= $this->model->prikaziMeni2(0,3,1);}}
            else{
                $prikaz= $this->model->prikaziMeni(0,2);
            }
            view("fixed/nav",["prikaz"=>$prikaz]);

}

function upisiGreskuUFajl($greska){
    $formazaupis=$greska."\t".date("d-m-y H:i:s")."\n";
    @$open=fopen(GRESKE,'a');
    @fwrite($open,$formazaupis);
   @fclose($open);
}

public function azuriranjeSlike($novaVisinaa,$novaVisinaa2){            
    $fileName = $_FILES['userfile']['name'];
       $tmpName = $_FILES['userfile']['tmp_name'];
       $fileSize = $_FILES['userfile']['size'];
       $fileType = $_FILES['userfile']['type'];
       $fileError = $_FILES['userfile']['error'];
       $uploadDir1 = 'app/assets/slike/'.time()."mala".$fileName;
       $uploadDir2 = 'app/assets/slike/'.time()."velika".$fileName;
    list($sirina, $visina) = getimagesize($tmpName);


    // Kreiranje nove slike (resource) od fajla ili URL-a
    if( $fileType == "image/jpeg" ) { $postojecaSlika = imagecreatefromjpeg($tmpName); }
    elseif( $fileType == "image/gif" ) { $postojecaSlika = imagecreatefromgif($tmpName); }
    elseif( $fileType == "image/png" ) { $postojecaSlika = imagecreatefrompng($tmpName); }
    $novaVisina=$novaVisinaa;
    $novaSirina=$sirina*$novaVisina/$visina;
    
    //Kreiranje nove slike u koloru
    $prazna_image = imagecreatetruecolor($novaSirina, $novaVisina);
    imagecopyresampled($prazna_image, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);
    $white = imagecolorallocate($prazna_image, 255, 255, 255);
        imagefill($prazna_image, 0, 0, $white);
        $novaSlika = $prazna_image;
    $novaSlika = $prazna_image;
    
    //Snimanje
    $compression=75;
    if( $fileType == "image/jpeg" ) { imagejpeg($novaSlika,$uploadDir1,$compression); }
    elseif( $fileType == "image/gif" ) { imagegif($novaSlika,$uploadDir1); }
    elseif( $fileType == "image/png" ) { imagepng($novaSlika,$uploadDir1); }
    
    
    
    //velika slika
    list($sirina2, $visina2) = getimagesize($tmpName);
    
    
    // Kreiranje nove slike (resource) od fajla ili URL-a
    if( $fileType == "image/jpeg" ) { $postojecaSlika2 = imagecreatefromjpeg($tmpName); }
    elseif( $fileType == "image/gif" ) { $postojecaSlika2 = imagecreatefromgif($tmpName); }
    elseif( $fileType == "image/png" ) { $postojecaSlika2 = imagecreatefrompng($tmpName); }
    $novaVisina2=$novaVisinaa2;
       $novaSirina2=$sirina2*$novaVisina2/$visina2;
    
    //Kreiranje nove slike u koloru
    $prazna_image2 = imagecreatetruecolor($novaSirina2, $novaVisina2);
    imagecopyresampled($prazna_image2, $postojecaSlika2, 0, 0, 0, 0, $novaSirina2, $novaVisina2, $sirina2, $visina2);
    $white = imagecolorallocate($prazna_image2, 255, 255, 255);
        imagefill($prazna_image2, 0, 0, $white);
        $novaSlika = $prazna_image2; 
    $novaSlika2 = $prazna_image2;
    
    //Snimanje
    $compression=75;
    if( $fileType == "image/jpeg" ) { imagejpeg($novaSlika2,$uploadDir2,$compression); }
    elseif( $fileType == "image/gif" ) { imagegif($novaSlika2,$uploadDir2); }
    elseif( $fileType == "image/png" ) { imagepng($novaSlika2,$uploadDir2); }



}

function prikaziRazlicitTitle(){
    if(isset($_GET['page'])){
        switch($_GET['page']){
        
        case 'pocetna':?>
        <title>Prodavnica piva-Pocetna</title>
        <meta name="description" content="BeerShop je online shop koji objedinjuje male i velike domaće i strane proizvođače piva. Zahvaljujući ovoj online prodavnici, više ne morate obilaziti različite prodavnice i podrume pića u potrazi za više različitih proizvođača iz celog sveta. Dovoljno je samo par klikova i vaše omiljeno piće u najkraćem roku dolazi na vašu adresu.Ukus piva ne donosi gaziranost već prirodnu fermentaciju, punoću ukusa i obilje zdravih elemenata, oseća se prirodna gorčina hmelja, a prijatnost se povećava pri svakom novom gutljaju."/>
        <?php break;
        case 'kontakt':?>
        <title>Prodavnica piva-Kontakt</title>
        <meta name="description" content="Ako imate neka pitanja ili nedoumice obratite se putem E-maila."/>
        <?php break;
        case 'proizvod':?>
            <title>Prodavnica piva-Proizvod</title>
            <meta name="description" content="BeerShop je online shop koji objedinjuje male i velike domaće i strane proizvođače piva. Zahvaljujući ovoj online prodavnici, više ne morate obilaziti različite prodavnice i podrume pića u potrazi za više različitih proizvođača iz celog sveta. Dovoljno je samo par klikova i vaše omiljeno piće u najkraćem roku dolazi na vašu adresu.Ukus piva ne donosi gaziranost već prirodnu fermentaciju, punoću ukusa i obilje zdravih elemenata, oseća se prirodna gorčina hmelja, a prijatnost se povećava pri svakom novom gutljaju."/>
            <?php break;
        case 'proizvodi':?>
            <title>Prodavnica piva-Proizvodi</title>
            <meta name="description" content="Proizvodi BeerShopa,najveci izbor kraft piva."/>
            <?php break;
        case 'izmeni':?>
            <title>Prodavnica piva-Izmeni profil</title>
            <meta name="description" content="Izmena korisnickih informacija"/>
            <?php break;
        case 'prijava':?>
        <title>Prodavnica piva-Prijava</title>
        <meta name="description" content="Prijava i registracija korisnika da bi se narucio proizvod"/>
        <?php break;
        case 'admin':?>
        <title>Prodavnica piva-Admin</title>
        <meta name="description" content="Admin,upravljanje celokupnim sajtom."/>
        <?php break;
        case 'korpa':?>
        <title>Prodavnica piva-Korpa</title>
        <meta name="description" content="Korpa,kupovina proizvoda"/>
        <?php break;
        }}
        else{
          ?>  <title>Prodavnica piva-Pocetna</title> 
            <meta name="description" content="BeerShop je online shop koji objedinjuje male i velike domaće i strane proizvođače piva. Zahvaljujući ovoj online prodavnici, više ne morate obilaziti različite prodavnice i podrume pića u potrazi za više različitih proizvođača iz celog sveta. Dovoljno je samo par klikova i vaše omiljeno piće u najkraćem roku dolazi na vašu adresu.Ukus piva ne donosi gaziranost već prirodnu fermentaciju, punoću ukusa i obilje zdravih elemenata, oseća se prirodna gorčina hmelja, a prijatnost se povećava pri svakom novom gutljaju."/>
        <?php }}
}

 