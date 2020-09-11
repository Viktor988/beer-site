<?php
namespace app\Models;
class Proizvodi{

public $baza;
function __construct( $baza){
    $this->baza=$baza;
}


function ispisiProizvod(){
 $upit="SELECT * from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  inner join vrsta vr on vr.idVrsta=pr.idvrsta inner join proizvodjac proiz on proiz.idMarka=pr.idmarka where pz.idZapremina=5 order by pz.datumPostavljanja LIMIT 4";
 $sve=$this->baza->izvrsiSve($upit);
return $sve;
}
function ispisiProizvod2(){
    $upit="SELECT * from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  inner join vrsta vr on vr.idVrsta=pr.idvrsta inner join proizvodjac proiz on proiz.idMarka=pr.idmarka where pz.idZapremina=5";
    $sve=$this->baza->izvrsiSve($upit);
   return $sve;
   }
function ispisiProizvodBezOgranicenja(){
    $upit="SELECT * from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  inner join vrsta vr on vr.idVrsta=pr.idvrsta inner join proizvodjac proiz on proiz.idMarka=pr.idmarka inner join zapremina zz on zz.idzapremina=pz.idZapremina";
    $sve=$this->baza->izvrsiSve($upit);
   return $sve;
   }
   function proveraZaKorpu($id,$idzap){
    $upit="SELECT * from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod WHERE pz.idproizvodZapremina=$id and pz.idZapremina=$idzap";
    $sve=$this->baza->izvrsiJedan($upit);
   return $sve;
   }
   function dohvatiNajveciId(){
    $upit="SELECT MAX(idProizvod) as proiz from proizvodi";
    $sve=$this->baza->izvrsiJedan($upit);
   return $sve; 
   }
function dohvatiProizvodSaOcenom($id){
    $upit="SELECT * FROM ocenjivanje oc INNER join proizvodi pr on pr.idProizvod=oc.idProizvod INNER JOIN korisnik ko on ko.idKorisnik=oc.idkorisnik INNER JOIN proizvodzapremina pz on pz.idProizvod=pr.idProizvod iNNER JOIN zapremina z on z.idzapremina=pz.idZapremina inner join proizvodjac proiz on proiz.idMarka=pr.idmarka inner join vrsta vv on vv.idVrsta=pr.idvrsta where ko.idKorisnik=$id";
    $sve=$this->baza->izvrsiSve($upit);
    return $sve;}
function dohvatiProizvod($id){
 $upit="SELECT * from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  inner join vrsta vr on vr.idVrsta=pr.idvrsta inner join proizvodjac proiz on proiz.idMarka=pr.idmarka inner join zemlja z on proiz.idZemlja=z.idZemlja inner join vrsta v on v.idvrsta=pr.idVrsta  where pr.idProizvod=$id";
 $sve=$this->baza->izvrsiJedan($upit);
   return $sve;}

   function dohvatiCetiriProizovda(){
    $upit=$this->baza->izvrsiSve("SELECT * FROM korpa k INNER JOIN proizvodzapremina pz on k.idProizvodZapremina=pz.idproizvodZapremina INNER join proizvodi p on pz.idProizvod=p.idProizvod INNER join vrsta v on p.idvrsta=v.idVrsta INNER JOIN proizvodjac pro on p.idmarka=pro.idMarka INNER join zemlja z on pro.idZemlja=z.idZemlja where pz.idZapremina=5 ORDER by k.Kolicina DESC limit 4");
    return $upit;
   }
   function dohvatiSve(){
    $upit=$this->baza->izvrsiSve("SELECT * FROM proizvodzapremina pz  INNER join proizvodi p on pz.idProizvod=p.idProizvod INNER join vrsta v on p.idvrsta=v.idVrsta INNER JOIN proizvodjac pro on p.idmarka=pro.idMarka INNER join zemlja z on pro.idZemlja=z.idZemlja INNER JOIN zapremina zz on zz.idzapremina=pz.idZapremina");
    return $upit;
   }
    
   function dovhvatiproizvodZapreminu($id){
    $upit=$this->baza->izvrsiJedan("SELECT * FROM proizvodzapremina pz  INNER join proizvodi p on pz.idProizvod=p.idProizvod INNER join vrsta v on p.idvrsta=v.idVrsta INNER JOIN proizvodjac pro on p.idmarka=pro.idMarka INNER join zemlja z on pro.idZemlja=z.idZemlja INNER JOIN zapremina zz on zz.idzapremina=pz.idZapremina where pz.idproizvodZapremina=$id");
    return $upit;
   }

   function dohvatiZapremine($id){
    $upit="SELECT * from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  where pz.idProizvod=$id";
    $sve=$this->baza->izvrsiSve($upit);
      return $sve;}

function brojProizvode(){
    $upit="SELECT count(*) as brojproizvoda from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  inner join vrsta vr on vr.idVrsta=pr.idvrsta inner join proizvodjac proiz on  proiz.idMarka=pr.idmarka where pz.idZapremina=5";
    $sve=$this->baza->izvrsiJedan($upit);
    return $sve;

}
function azurirajProizvod($cena,$zapremina,$alkohol,$idmarka,$idvrsta,$opis,$slikam,$slikav,$idproizvodZapremina,$idProizvod){
    $upit=$this->baza->izvrsiInsert("UPDATE proizvodzapremina pz,proizvodi p SET cena=?,idZapremina=?,alkohol=?,idmarka=?,idvrsta=?,opis=?,slikam=?,slikav=? WHERE pz.idproizvodZapremina=? and p.idProizvod=?",[$cena,$zapremina,$alkohol,$idmarka,$idvrsta,$opis,$slikam,$slikav,$idproizvodZapremina,$idProizvod]);
return $upit;
}
function azurirajProizvodBezSlike($cena,$zapremina,$alkohol,$idmarka,$idvrsta,$opis,$idproizvodZapremina,$idProizvod){
    $upit=$this->baza->izvrsiInsert("UPDATE proizvodzapremina pz,proizvodi p SET cena=?,idZapremina=?,alkohol=?,idmarka=?,idvrsta=?,opis=? WHERE pz.idproizvodZapremina=? and p.idProizvod=?",[$cena,$zapremina,$alkohol,$idmarka,$idvrsta,$opis,$idproizvodZapremina,$idProizvod]);
return $upit;
}

function obrisiProizvod($sve){
    $query=$this->baza->konekcija->prepare("DELETE FROM proizvodzapremina WHERE idproizvodZapremina in($sve)");
    $query->execute();
    return $query;
  }
function filtriranje($zemlja,$marka,$trazi,$sort,$cena,$pag){
$upit="SELECT * from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  inner join vrsta vr on vr.idVrsta=pr.idvrsta inner join proizvodjac proiz on proiz.idMarka=pr.idmarka inner join zemlja z on z.idZemlja=proiz.idZemlja where pz.idZapremina=5 and pz.cena<=$cena";
if($zemlja!='0'){
    $upit.=" and proiz.idZemlja=$zemlja";}
if($marka!='0'){
    $upit.=" and pr.idvrsta=$marka";}
if($trazi!=''){
    $upit.=" and proiz.nazivProizvodjaca like '%$trazi%' or vr.nazivVrste like '%$trazi%'";}
if($sort=="0"){
    $upit.=" order by pz.datumPostavljanja asc";}
if($sort=="1"){
    $upit.=" order by proiz.nazivProizvodjaca asc";}
if($sort=="2"){
    $upit.=" order by proiz.nazivProizvodjaca desc";}
if($sort=="3"){
    $upit.=" order by pz.cena desc";}
if($sort=="4"){
    $upit.=" order by pz.cena asc";}
$upit.=" LIMIT 4 OFFSET $pag";
$sve=$this->baza->izvrsiSve($upit);
return $sve;
}
function brojProizovdeZaFiltriranje($zemlja,$marka,$trazi,$sort,$cena){
    $upit="SELECT count(*) as brojproizvoda from proizvodi pr inner join proizvodzapremina pz on pr.idProizvod=pz.idProizvod  inner join vrsta vr on vr.idVrsta=pr.idvrsta inner join proizvodjac proiz on proiz.idMarka=pr.idmarka inner join zemlja z on z.idZemlja=proiz.idZemlja where pz.idZapremina=5 and pz.cena<=$cena";
    if($zemlja!='0'){
        $upit.=" and proiz.idZemlja=$zemlja";}
        if($marka!='0'){
        $upit.=" and pr.idmarka=$marka";}
        if($trazi!=''){
        $upit.=" and proiz.nazivProizvodjaca like '%$trazi%'";}
        else{  $upit.="";}
 if($sort=="1"){
        $upit.=" order by z.naziv desc";}
    if($sort=="2"){
        $upit.=" order by z.naziv asc";}
    if($sort=="3"){
        $upit.=" order by pz.cena desc";}
    if($sort=="4"){
        $upit.=" order by pz.cena asc";}
    $sve=$this->baza->izvrsiJedan($upit);
    return $sve;}

public function insertProizvoda($opis,$slikam,$slikav,$alkohol,$idmarka,$idvrsta){
    $upit=$this->baza->izvrsiInsert("INSERT INTO proizvodi (opis,slikam,slikav,alkohol,idmarka,idvrsta) VALUES(?,?,?,?,?,?)",[$opis,$slikam,$slikav,$alkohol,$idmarka,$idvrsta]);   
}
public function insertProizvoda2($idproizvod,$idZapremina,$cena){
    $upit=$this->baza->izvrsiInsert("INSERT INTO proizvodzapremina (idProizvod,idZapremina,cena) VALUES(?,?,?)",[$idproizvod,$idZapremina,$cena]);   
}



}


