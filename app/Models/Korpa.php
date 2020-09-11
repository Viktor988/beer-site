<?php 

namespace app\Models;
class Korpa{

public $baza;

function __construct( $baza){
    $this->baza=$baza;
}

function ubaci($idk,$idpz,$kolicina,$isporuka){
    try{
    $upit=$this->baza->izvrsiInsert("INSERT INTO korpa (idkorisnik,idProizvodZapremina,Kolicina,adresaIsporuke) VALUES(?,?,?,?)",[$idk,$idpz,$kolicina,$isporuka]);
http_response_code(200);}
catch(\PDOException $e){
    echo $e->getMessage();
   http_response_code(401);}}


   function prikaziUadminPamenu(){

    $upit=$this->baza->izvrsiSve("SELECT * from korpa kk INNER JOIN proizvodzapremina pz on kk.idProizvodZapremina=pz.idproizvodZapremina INNER JOIN proizvodi p on p.idProizvod=pz.idProizvod INNER join zapremina zap on zap.idzapremina=pz.idZapremina INNER JOIN vrsta v on v.idVrsta=p.idvrsta inner JOIN proizvodjac pro on pro.idMarka=p.idmarka order by VremePorudzbine desc");
    return $upit;
   }

   public function dohvatiNoveKupovine(){
    $upit=$this->baza->izvrsiJedan("SELECT COUNT(*) as brojKupovina from korpa");
    return $upit;
   }

   public function prikaziPorudzbine($id){
       $upit=$this->baza->izvrsiSve("SELECT * FROM korpa kk inner join proizvodzapremina pz on pz.idproizvodZapremina=kk.idProizvodZapremina INNER JOIN proizvodi pr on pr.idProizvod=pz.idProizvod inner join korisnik kor on kor.idKorisnik=kk.idkorisnik inner join zapremina z on z.idzapremina=pz.idZapremina inner join vrsta v on v.idVrsta=pr.idvrsta inner join proizvodjac proizdj on proizdj.idMarka=pr.idmarka where kor.idKorisnik=$id");
    return $upit;
    }
}