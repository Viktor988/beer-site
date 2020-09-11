<?php 
namespace App\Controllers;
require_once "app/Models/Korisnik.php";

use app\Controllers\Controller;
use app\Models\Korisnik;
use app\Models\Proizvodi;
use app\Models\Zapremina;
use app\Models\Zemlja;
use app\Models\Vrsta;
use app\Models\Korpa;
use App\Config\Baza;
use App\Models\Proizvodjac;
use PDOException;

class AdminController extends Controller{

    private $model;
    public function __construct(){
        $this->model = new Korisnik(Baza::instance());
        $this->model2 = new Proizvodi(Baza::instance());
        $this->model3 = new Zapremina(Baza::instance());
        $this->model4 = new Zemlja(Baza::instance());
        $this->model7 = new Korpa(Baza::instance());
        $this->model5 = new Vrsta(Baza::instance());
        $this->model6 = new Proizvodjac(Baza::instance());
    }

    public function PrikaziKorisnike(){
      
            if(isset($_SESSION['korisnik'])){
                if($_SESSION['korisnik']->idUloga=="1"){
                    try{
        $sve=$this->model->prikaziKorisnike();
        echo json_encode($sve);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage());
        }}}}

     

public function BrisanjeKorisnika(){
    if(isset($_POST['niz'])){
        $id=$_POST['niz'];
        $sve=implode(",",$id);
        try{
       $this->model->obrisiKorsisnika($sve);
    http_response_code(204);}
       catch(PDOException $e){
        $this->upisiGreskuUFajl($e->getMessage());
    }}}

    public function UbaciKorisnika(){
        if(isset($_POST['posalji'])){

        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $email=$_POST['email'];
        $lozinka=$_POST['lozinka'];
        $ponovo=$_POST['ponovo'];
        $uloga=$_POST['uloga'];
        $reime="/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/";
        $reemail="/^[\w]+[\.\_\-\w]*[0-9]{0,3}\@[\w]+([\.][\w]+)+$/";
        $relozinka="/^[A-z]{3,}[0-9]{1,}/";
        $greske2=[];
        if(!preg_match($reime,$ime)){
        $greske2[]="ime nije u dobrom formatu";
        }
        if(!preg_match($reime,$prezime)){
            $greske2[]="prezime nije u dobrom formatu";
        }
        if(!preg_match($reemail,$email)){
            $greske2[]="email nije u dobrom formatu";
        }
        if(!preg_match($relozinka,$lozinka)){
            $greske2[]="lozinka nije u dobrom formatu";
        }

        if($ponovo!=$lozinka){
            $greske2[]="lozinke se ne poklapaju";  
        }


        if(count($greske2)==0){
        try{
        $this->model->ubaciKorsinika($ime,$prezime,$email,$lozinka,$ponovo,$uloga);
            http_response_code(201);}

        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage());
        }
  }
  else{
      foreach($greske2 as $gr){
          echo "<script>alert('$gr')</script>";
    }}}}

    public function prikaziJednog(){
        if(isset($_POST['id'])){
        $id=$_POST['id'];
        try{
        $sve=$this->model->prikazJednogiKorisnika($id);
            echo json_encode($sve);}
            catch(PDOException $e){
                $this->upisiGreskuUFajl($e->getMessage());
            }
    }}
    public function azurirajKorisnika(){
        if(isset($_POST['posaljiUpdate'])){
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $email=$_POST['email'];
        $lozinka=$_POST['lozinka'];
        $ponovo=$_POST['ponovo'];
        $uloga=$_POST['uloga'];
        $skriveno=$_POST['skriveno'];
        try{
        $this->model->azurirajKorisnik($ime,$prezime,$email,$lozinka,$ponovo,$uloga,$skriveno);
        http_response_code(204);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage());
        }
    }}

    public function PrikaziProizvode(){
        try{
        $sve=$this->model2->dohvatiSve();
        echo json_encode($sve);}
        catch(PDOException $e){
            $this->upisiGreskuUFajl($e->getMessage());
        }
    }


        public function BrisanjeProizvoda(){
            if(isset($_POST['niz'])){
                $id=$_POST['niz'];
                $sve=implode(",",$id);
                try{
               $this->model2->obrisiProizvod($sve);
                http_response_code(204);}
               catch(PDOException $e){
                $this->upisiGreskuUFajl($e->getMessage());
            }
            }}

               function brojAktivnihKorisnika(){
                   $brojac=0;

                $fajl=file(ADRESAR);
              $ispis3="";
              for($i=0;$i<count($fajl);$i++){
                $novi=explode("\t",$fajl[$i]);
                @$daa=strtotime($novi[1]);
                 if($daa>time()-86400){
                     $brojac++;
              $ispis3=$brojac;
            }}
              return $ispis3;}

              public function novi(){
                  try{
                $sve=$this->model7->dohvatiNoveKupovine();
                return $sve;}
                catch(PDOException $e){
                    $this->upisiGreskuUFajl($e->getMessage());
                }
              }

               public function prikaziView(){
                require_once "app/views/fixed/head.php";
                require_once "app/views/fixed/iznad.php";
                $ide=new Controller();
                $ide->vratMeni();
                require_once "app/views/fixed/header.php";
                $sve=$this->model3->ispisiZapremine();
                $sve2=$this->model4->ispisiZemlje();
                $sve3=$this->model5->ispisiVrste();
                $sve4=$this->model6->ispisiProizvodjace();
                   $sve5=$this->brojAktivnihKorisnika();
                   $sve6=$this->dijagramPosecenostiStranicaUprocentima();
                   $sve7=$this->novi();
                   $sve8=$this->model2->ispisiProizvod2();

      
                view("pages/admin",["zapremine"=>$sve,"zemlje"=>$sve2,"vrste"=>$sve3,"marke"=>$sve4,"broj"=>$sve5,"posecenost"=>$sve6,"aktivni"=>$sve7,"proizvodi"=>$sve8]);
                

                require_once "app/views/fixed/futer.php";
               }
                function prikaziJedanProizvod(){
                    if(isset($_POST['id'])){
                        $id=$_POST['id'];
                        try{
                        $sve=$this->model2->dovhvatiproizvodZapreminu($id);
                            echo json_encode($sve);}
                            catch(PDOException $e){
                                $this->upisiGreskuUFajl($e->getMessage());
                            }
                 }}

                 public function azurirajProizvod(){
                     if(isset($_POST['ubacipp'])){
                    $opis=$_POST['area'];
                    $cena=$_POST['cena'];
                    $alkohol=$_POST['alkohol'];
                    // $model=$_POST['model'];
                    $idmarka=$_POST['markee'];
                    $idvrsta=$_POST['vrstee'];
                    $zapremine=$_POST['zapreminee'];
                        $idproizvod=$_POST['sakriveno1'];
                        $idproizvodZapremina=$_POST['sakriveno2'];
                      if($_FILES['userfile']['name']!=""){
                        $fileName = $_FILES['userfile']['name'];
       $uploadDir1 = 'app/assets/slike/'.time()."mala".$fileName;
       $uploadDir2 = 'app/assets/slike/'.time()."velika".$fileName;
      $this->azuriranjeSlike(200,350);

                        try{
                    $this->model2->azurirajProizvod($cena,$zapremine,$alkohol,$idmarka,$idvrsta,$opis,$uploadDir1, $uploadDir2,$idproizvodZapremina,$idproizvod);
                        http_response_code(204);
                }
                        catch(PDOException $e){
                            $this->upisiGreskuUFajl($e->getMessage());
                        }
                 }
                 else{ $this->model2->azurirajProizvodBezSlike($cena,$zapremine,$alkohol,$idmarka,$idvrsta,$opis,$idproizvodZapremina,$idproizvod);
                    http_response_code(204);}
                
                
                }
            }

               public function insertProizvoda(){
                if(isset($_POST['marke'])){
                    $opis=$_POST['area'];
                    $cena=$_POST['cena'];
                    $alkohol=$_POST['alkohol'];
                   
                    $marke=$_POST['marke'];
                    $vrste=$_POST['vrste'];
                    $zapremine=$_POST['zapremine'];
                  $slika=$_FILES['userfile'];
                    $fileName = $slika['name'];
                    $tmpName = $slika['tmp_name'];
                    $fileSize = $slika['size'];
                    $fileType = $slika['type'];
                    $fileError = $slika['error']; 
                    $upload1 = 'app/assets/slike/'.time()."mala".$fileName;
                    $uploadDir2 = 'app/assets/slike/'.time()."velika".$fileName;
                    $upload11 = 'app/assets/slike/'.time()."mala".$fileName;
                    $uploadDir22 = 'app/assets/slike/'.time()."velika".$fileName;
                    $greske=[];
                    if($opis==""){
                        $greske[]="Opis je obavezan";
                    }
                    if($cena==""){
                        $greske[]="Cena je obavezana";
                    }
                    if($alkohol==""){
                        $greske[]="Alkohol je obavezan";
                    }
                    if( $fileName==""){
                        $greske[]="Slika je obavezana";  
                    }
                    if(count($greske)!=0){
                        foreach($greske as $gr){
                            echo "<script>alert('$gr');</script>";
                        }

                    }
                    else{
                
                 
                        $this->azuriranjeSlike(200,350);
                  try{
                    $sve=$this->model2->insertProizvoda($opis,$upload11,$uploadDir22,$alkohol,$marke,$vrste);
                    http_response_code(201);
                
                $idp=$this->model2->dohvatiNajveciId();
                $idd=$idp->proiz;
           
                 
                        $d=$this->model2->insertProizvoda2($idd,$zapremine,$cena);
                    }
                    catch(PDOException $e){
                        $this->upisiGreskuUFajl($e->getMessage());
                    }


}}}
public function insertProizvodZapremina(){
    if(isset($_POST['ubacipz'])){
        $proizvod=$_POST["proizvod"];
        $zapremina=$_POST['zapremineu'];
        $cena=$_POST['cenau'];
        $d=$this->model2->insertProizvoda2($proizvod,$zapremina,$cena);



}}
function dijagramPosecenostiStranicaUprocentima(){
    $datotekaunizu=file(LOG_FAJL);
// statistike
$ispis="";
$niz=[];
$brojacautor=0;
$brojacadmin=0;
$brojacpocetna=0;
$brojacproizvodi=0;
$brojacproizvod=0;
$brojaclogin=0;
$brojackorpa=0;
$brojackontakt=0;
$brojacodjava=0;

    for($i=0;$i<count($datotekaunizu);$i++){
        $novi=explode("\t",$datotekaunizu[$i]);
        @$daa=strtotime($novi[1]);
   if($daa>time()-86400){
     
switch($novi[0]){
    case "/index.php?page=autor":
    $brojacautor=$brojacautor+1;
  
    break;
    case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=odjava":
    $brojacodjava=$brojacodjava+1;
   
    break;
    case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=admin":
    $brojacadmin=$brojacadmin+1;
   
    break;
    case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=pocetna":
    $brojacpocetna=$brojacpocetna+1;
    break;
    case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=proizvodi":
        $brojacproizvodi=$brojacproizvodi+1;
        break;
       
   
        case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=proizvod&id=":
            $brojacproizvod=$brojacproizvod+1;
            break;
    case "/index.php":
    $brojacpocetna=$brojacpocetna+1;
  
    break;
    case "/":
    $brojacpocetna=$brojacpocetna+1;

    break;
  
    break;
    case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=prijava":
    $brojaclogin=$brojaclogin+1;
 
    break;
    case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=kontakt":
    $brojackontakt=$brojackontakt+1;
  
    break;
    case "/PHP2-Prvi%20sajt/sajtPHP21/Obaranje/index.php?page=korpa":
    $brojackorpa=$brojackorpa+1;

    break;
    ?>
<?php }}}

return [$brojacpocetna,$brojacproizvodi,$brojacproizvod,$brojackorpa,$brojacadmin,$brojackontakt,$brojaclogin];
    

 



}}?>