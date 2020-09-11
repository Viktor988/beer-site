
        <?php 
    session_start();
    require_once "app/Config/helpers.php";
    require_once "app/Config/autoload.php";
    require "app/Config/database.php";
use App\Controllers\AdminController;
use App\Controllers\ProizvodiControler;
 use App\Controllers\KorpaController;
 use App\Controllers\ProizvodController;
 use App\Controllers\Controller;
use App\Controllers\IzmenaController;
use App\Controllers\KontaktController;
use App\Controllers\KorisniciController;
use App\Controllers\PocetnaController;
use App\Controllers\PrijavaiRegistracijaController;
use App\Controllers\PorudzbineController;
use App\Models\Korisnik;
if(isset($_GET['page'])){

    switch($_GET['page']){
        case 'pocetna':
            $kontroler=new PocetnaController();
            $kontroler->ucitajView();
            
            break;
            case 'izmeni':
                $proizvod=new ProizvodiControler();
                $proizvod->dohvatiPodatkezastranicu($promenjiva="nalog"); 
            break;
            case 'kontakt':
                $kontakt=new KontaktController();
                $kontakt->dohvatiPodatkezastranicu($promenjiva="kontakt"); 
                $kontakt->posaljiPoruku();
            break;
            case 'proizvodi':
            $proizvod=new ProizvodiControler();
            $proizvod->prikaziView();
            break;
            case 'proizvod':
                $proizvod=new ProizvodController();
                $proizvod->dohvatiJedan();
            break;
            case 'prijava':
              $kontrolerKorisnik=new PrijavaiRegistracijaController();
              $kontrolerKorisnik->prijavi();
              $kontrolerKorisnik->dohvatiPodatkezastranicu($promenjiva="prijava");
            break;
            case 'porudzbine':
                $porudzbine=new PorudzbineController();
                
                $porudzbine->prikaziView();
            break;
            case 'odjava':
                $prijavaKontroler=new PrijavaiRegistracijaController();
                $prijavaKontroler->odjavi();  
            break;
            case 'admin':
                $kontrolerKorisnik=new AdminController();
                $kontrolerKorisnik->prikaziView();
                $kontrolerKorisnik->UbaciKorisnika();
                $kontrolerKorisnik->azurirajKorisnika();
                $kontrolerKorisnik->insertProizvoda();
                $kontrolerKorisnik->azurirajProizvod();
                $kontrolerKorisnik->insertProizvodZapremina();
            break;
            case 'korpa':
                $kontrolerKorisnik=new AdminController();
                $kontrolerKorisnik->dohvatiPodatkezastranicu($promenjiva="korpa");
            break;
          }}
    if(!isset($_GET['page']) && !isset($_GET['ajax']))
    {    
        $kontroler=new PocetnaController();
        $kontroler->ucitajView();
       
    }
    function zabeleziPristupStranici(){
        $open = fopen(LOG_FAJL, "a");
        if($open){
            $date = date('d-m-Y H:i:s');
         
            fwrite($open, "{$_SERVER['REQUEST_URI']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\n");
            fclose($open);
        }
    }
    zabeleziPristupStranici();
  
    if(isset($_GET['ajax'])){
        switch($_GET['ajax']){
            //ispisivanje proizvoda i delova te stranice
            case "ispisiProizvode":
            $proizvod=new ProizvodiControler();
            $proizvod->ispisiProizvode();  
                break;
            case "ispisiPaginaciju":
                $proizvod=new ProizvodiControler();
                $proizvod->ispisPaginacije();  
                break;
            case "filteripaginacija":
                $proizvod=new ProizvodiControler();
                $proizvod->filteripaginacija();  
                break;
            case "brojPaginaciju":
                $proizvod=new ProizvodiControler();
                $proizvod->ispisPaginacije();  
                break;
            case "dohvatiProizvod":
                $proizvodKontroler=new ProizvodController();
                $proizvodKontroler->dohvatiProizvode();  
                break; 

            case "ispisiCenu":
                $proizvod=new ProizvodController();
                $proizvod->dohvatiCenu();  
                break;

                //prijava i registracija
            case "prijavi":
                $prijavaKontroler=new PrijavaiRegistracijaController();
                $prijavaKontroler->prijavi();  
                break;   
            case "registruj":
                $prijavaKontroler=new PrijavaiRegistracijaController();
                $prijavaKontroler->registruj();  
                break; 
           
                //admin
            case "prikaziKorisnike":
                
                $korKontroler=new AdminController();
                $korKontroler->PrikaziKorisnike();  
                break; 

            case "BrisanjeKorisnika":
                $korKontroler=new AdminController();
                $korKontroler->BrisanjeKorisnika();  
                break;
            case "PrikaziJednogKorisnika":
                $korKontroler=new AdminController();
                $korKontroler->prikaziJednog();  
                break;
            case "prikaziProizvode":
                $korKontroler=new AdminController();
                $korKontroler->PrikaziProizvode();  
                break;

            case "BrisanjeProizvoda":
                   $korKontroler=new AdminController();
                $korKontroler->BrisanjeProizvoda();  
                    break;
            case "PrikaziJedanProizvod":
                 $korKontroler=new AdminController();
                $korKontroler->prikaziJedanProizvod();  
                    break;

                //korpa
            case "PrikaziProizvodUkorpi":
                $korpa=new KorpaController();
                $korpa->ispisiProizvodeUkorpi();  
                break;
            case "UpisiUkorpu":
                $korpa=new KorpaController();
                $korpa->ubaciUkorpu();  
                break;
            case "PrikaziUadminu":
                $korpa=new KorpaController();
                $korpa->prikaziIzKorpe();  
                break;


                // izmena naloga
            case "izmenaNaloga":
                $izmenaNaloga=new IzmenaController();
                $izmenaNaloga->izmeniNalog();  
                 break;

                 //oceni proizvod
            case "glasanje":
                $oceni=new ProizvodController();
                $oceni->oceni();  
                break;
            case "proveraGlasanje":
                $oceni=new ProizvodController();
                $oceni->proveriGlasanje();  
                break;
                
           
        }}
         

           