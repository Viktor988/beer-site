<?php if(isset($_SESSION['korisnik'])){
  if($_SESSION['korisnik']->idUloga=="1"){?>

<div id="adminsr">
<div id="side">
<p class="admlink korisnik">Korisnici</p>
<p class="admlink adproizvod">Proizvodi</p>
<p class="admlink adkorpa">Korpa</p>
<p class="admlink adstatistike">Statistike</p>

</div>
<div id="ostalo">
<div class="admkorisnik">
    <input type="button" value="Korisnici" name="korisnicid" class="dugmeadmin dugkor"/>
    <div class="korisniciadmin"></div>
    <div class="azurforma"></div>
    <input type="button" value="Dodaj korisnika" class="dugmeadmin dodajkorisnikadugme"/>
    <div class="dodajkorisnika">
        <form method="post" action="index.php?page=admin">
    <input type="text" placeholder="Ime" id="rime" class="polje2" name="ime"/><br/>
    <input type="text" placeholder="prezime" id="rprezime" class="polje2"name="prezime"/><br/>
    <input type="email" placeholder="email" id="remejl"class="polje2"name="email"/><br/>
    <input type="password" placeholder="Lozinka" id="rlozinka"class="polje2"name="lozinka"/><br/>
    <input type="password" placeholder="Ponovite lozinku" id="rponlozinka"class="polje2" name="ponovo"/><br/>
    <select id="listauloga" name="uloga"><br/>
    <option value="2">Korisnik</option>
    <option value="1">Admin</option>
    </select>
    <input type="submit" name="posalji" value="Ubaci" class="dugmezaadmin"/>
        </form>
    </div>
</div>
<div class="admproizvod">
    <input type="button" value="Proizvodi" class="dugmeadmin dugproizvod"/>
    <div class="proizvodiadmin"></div>
    <input type="button" value="Dodaj proizvod" class="dugmeadmin"/>

     <div class="dodajproizvod">
     <form name="prikaz" action="index.php?page=admin" method="POST" id="popuniga"enctype="multipart/form-data" ><br/>
               <select name="marke" id="marke" class="listezadodavanje">
               <?php foreach($marke as $z){?>
                <option value="<?=$z->idMarka;?>"><?=$z->nazivProizvodjaca;?></option>

              <?php };?>    
               </select>
               <select name="vrste" id="vrste" class="listezadodavanje">
               <?php foreach($vrste as $z){?>
                <option value="<?=$z->idVrsta;?>"><?=$z->nazivVrste;?></option>

              <?php };?>    
               </select>
               <select name="zapremine" id="zapremine" class="listezadodavanje">
               <?php foreach($zapremine as $z){?>
                <option value="<?=$z->idzapremina;?>"><?=$z->kolicina;?></option>

              <?php };?>    
               </select>
               
               
               <br/>
                <textarea name="area"  id="opi" placeholder="Opis" class="formezadodvanje"></textarea><br/>
                <input name="userfile" type="file" id="fajl"/><br/>
        
                <input type="text" placeholder="Cena" name="cena" id="cena" class="formezadodvanje cc"/><br/>
                <input type="text" placeholder="Alkohol" name="alkohol" id="cen" class="formezadodvanje aa"/><br/>
                <input type="submit" name="ubacip" value="Ubaci" id="ubacip"/><br/>
                </form>`
                
                <form action="index.php?page=admin" method="post" id="formazap">
                <select name="proizvod" id="proizvodu" class="listezadodavanje">
               <?php foreach($proizvodi as $z){?>
                <option value="<?=$z->idProizvod;?>"><?=$z->nazivProizvodjaca;?>,<?=$z->nazivVrste;?></option>

              <?php };?> 
                </select>
                <select name="zapremineu" id="zapremineu" class="listezadodavanje">
               <?php foreach($zapremine as $z){?>
                <option value="<?=$z->idzapremina;?>"><?=$z->kolicina;?></option>

              <?php };?>    
               </select><br/>


                <input type="text" name="cenau" id="ucena" placeholder="cena"/><br/>
                <input type="submit" name="ubacipz" value="Ubaci zapreminu" id="ubacipz"/><br/>
                </form>


               
     </div>
     <div id="azurirati">
     <form name="prikaz" action="index.php?page=admin" method="POST" id="azuriraj"enctype="multipart/form-data" ><br/>
               <select name="markee" id="markee" class="listezadodavanje" >
               <?php foreach($marke as $z){?>
                <option value="<?=$z->idMarka;?>"><?=$z->nazivProizvodjaca;?></option>

              <?php };?>    
               </select>
               <select name="vrstee" id="vrstee" class="listezadodavanje">
               <?php foreach($vrste as $z){?>
                <option value="<?=$z->idVrsta;?>"><?=$z->nazivVrste;?></option>

              <?php };?>    
               </select>
               <select name="zapreminee" id="zapreminee" class="listezadodavanje">
               <?php foreach($zapremine as $z){?>
                <option value="<?=$z->idzapremina;?>"><?=$z->kolicina;?></option>

              <?php };?>    
               </select>
               
               
               <br/>
               <input type="hidden" placeholder="Cena" name="sakriveno1" id="sakriveno1"/><br/>
               <input type="hidden" placeholder="Cena" name="sakriveno2" id="sakriveno"/><br/>
                <textarea name="area"  id="opiss" placeholder="Opis" class="formezadodvanje"></textarea><br/>
                <p id="slikaad"></p>
                <input name="userfile" type="file" id="fajll"/><br/>
                <input type="text" placeholder="Cena" name="cena" id="cenaa" class="formezadodvanje cc"/><br/>
                <input type="text" placeholder="Alkohol" name="alkohol" id="alkohol" class="formezadodvanje aa"/><br/>
                <input type="submit" name="ubacipp" value="Azuriraj" id="ubacipp"/><br/>
                </form>`
     </div>
</div>
<div class="admkorpa">
    <input type="button" value="Korpa" class="dugmeadmin" id="dugkorpa"/>
    <div id="korpaa"></div>
</div>
<div id="brojposecenosti">
<table id="tabelabroj">
 <p class="brojaktivnih">Broj posecenosti stranica u poslednja 24h</p>

  <tr><th>Pocetna</th><th>Proizvodi</th><th>Korpa</th><th>Admin</th><th>Kontakt</th><th>Prijava</th></tr>
<tr><td><?=$posecenost[0];?></td><td><?=$posecenost[1];?></td><td><?=$posecenost[3];?></td><td><?=$posecenost[4];?></td><td><?=$posecenost[5];?></td><td><?=$posecenost[6];?></td>
</tr>



</table>
<div id="brojKorisnika">
<p class="brojaktivnih">Broj prijavljenih korisnika u poslednja 24h</p>
<p id="brojaktivnih"><?=$broj;?></p>
<p class="brojaktivnih">Broj kupovina</p>
<?php 
echo $aktivni->brojKupovina;
?>
</div>
</div>

</div>


</div>
               <?php }
                else{
                  header("Location:http://prodavnicapiva.epizy.com/index.php?page=pocetna");
                }
               
              }
               else{
                 header("Location:index.php?page=pocetna");
               }