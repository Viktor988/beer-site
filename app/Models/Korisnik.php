<?php

namespace app\Models;
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
class Korisnik{
public $baza;

function __construct($baza){
    $this->baza=$baza;
}

function registruj($ime,$prezime,$email,$lozinka,$ponovo,$uloga){
try{
  $upit=$this->baza->izvrsiInsert("INSERT INTO korisnik (ime,prezime,email,lozinka,lozinkaponovo,idUloga) VALUES(?,?,?,?,?,2)",[$ime,$prezime,$email,$lozinka,$ponovo]);
$code=200;
;}
catch(\PDOException $e){
 echo $e->getMessage();
    $code= 409;}
http_response_code($code);}

function posaljiPoruku($kome,$kosalje,$poruka){
  return mail($kome,$kosalje,$poruka);
}

function prijavi($email,$lozinka){
$upit= "SELECT * from korisnik where email=:email and lozinka=:lozinka";
$sve=$this->baza->konekcija->prepare($upit);
$sve->bindParam(":email",$email);
$sve->bindParam(":lozinka",$lozinka);
$rezultat=$sve->execute();
if($sve->rowCount()==1){
    $korisnik =$sve->fetch();
    header("Location: http://localhost/PHP2-Prvi%20sajt/sajtPHP21/SajtPHP2s1/Obaranje/index.php?page=pocetna");
    $jedan=$_SESSION['korisnik']=$korisnik;
    $date = date('d-m-Y H:i:s');
    $open=fopen(ADRESAR,"a");
    fwrite($open,"{$_SESSION['korisnik']->idKorisnik}\t{$date}\n");
    fclose($open);
    return $jedan;
}
if($sve->rowCount()==0){  
  http_response_code(403);
}}

function izmeniKorisnik($ime,$prezime,$lozinka,$ponovo,$id){
  try{
$upit=$this->baza->izvrsiInsert("UPDATE korisnik SET ime=?,prezime=?,lozinka=?,lozinkaponovo=? where idKorisnik=?",[$ime,$prezime,$lozinka,$ponovo,$id]);
  }
    catch(\PDOException $e){
     echo $e->getMessage();
       }
}

function prikaziKorisnike(){
  $upit="SELECT k.idKorisnik,k.ime,k.prezime,k.email,u.naziv from korisnik k inner join uloge u on k.idUloga=u.idUloga";
  $sve=$this->baza->izvrsiSve($upit);
    return $sve;}


 function obrisiKorsisnika($sve){
  $query=$this->baza->konekcija->prepare("DELETE FROM korisnik WHERE idKorisnik in($sve)");
  $query->execute();
  return $query;
}



function prikazJednogiKorisnika($id){
  $upit="SELECT * from korisnik k inner join uloge u on k.idUloga=u.idUloga where idKorisnik=$id";
  $sve=$this->baza->izvrsiJedan($upit);
    return $sve;}

function ubaciKorsinika($ime,$prezime,$email,$lozinka,$ponovo,$uloga){
  try{
    $upit=$this->baza->izvrsiInsert("INSERT INTO korisnik (ime,prezime,email,lozinka,lozinkaponovo,idUloga) VALUES(?,?,?,?,?,?)",[$ime,$prezime,$email,$lozinka,$ponovo,$uloga]);
  $code=200;
  ;}
  catch(\PDOException $e){
   echo $e->getMessage();
      $code= 409;}
  http_response_code($code);}

function azurirajKorisnik($ime,$prezime,$email,$lozinka,$ponovo,$uloga,$skriveno){

  $upit=$this->baza->izvrsiInsert("UPDATE korisnik SET ime=?,prezime=?,email=?,lozinka=?,lozinkaponovo=?,idUloga=? where idKorisnik=?",[$ime,$prezime,$email,$lozinka,$ponovo,$uloga,$skriveno]);

}

}






