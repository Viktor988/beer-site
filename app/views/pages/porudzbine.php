
<div id="sredinapor">

<div class="oceneproiz">
<h1 class="pornaslov">Ocenjeni proizvodi</h1>
<?php if(count($upit1)==0){
    ?><h2 class="porudzbinaois">Niste ocenili proizvod!</h2><?php
}
else{
?>
<table class="ocene">
<tr id="red">
      <th>Redni broj</th>
      <th>Slika</th>
      <th>Proizvodjac</th>
      <th>Vrsta</th>
      <th>Cena</th>
        <th>Ocena</th>
     
  </tr>
  <?php 

  $rb=1;
  foreach($upit1 as $upit){?>
<tr><td><?=$rb;?></td><td><img src="<?=$upit->slikam;?>" class="ocslika"/></td><td><?=$upit->nazivProizvodjaca;?></td><td><?=$upit->nazivVrste;?></td><td><?=$upit->cena;?></td><td><?=$upit->idOcena;?></td>

  <?php
  $rb++; 
}?>

</table>
<?php }?>
</div>


<div class="oceneproiz">
<h1 class="pornaslov">Naručeni proizvodi</h1>
<?php if(count($upit2)==0){
    ?><h2 class="porudzbinaois">Niste izvršili porudzbinu!</h2><?php
}
else{
?>
<table class="ocene"cellspacing="0" cellpadding="0">
<tr id="red">
      <th>Redni broj</th>
      <th>Slika</th>
      <th>Proizvodjac</th>
      <th>Vrsta</th>
      <th>Zapremina</th>
      <th>Cena</th>
      <th>Kolicina</th>
      <th>Datum porudzbine</th>
     
  </tr>
 <?php  $rb=1;

  foreach($upit2 as $upit3){?>
<tr><td><?=$rb;?></td><td><img src="<?=$upit3->slikam;?>" class="ocslika"/></td><td><?=$upit3->nazivProizvodjaca;?></td><td><?=$upit3->nazivVrste;?></td><td><?=$upit3->kolicina;?></td><td><?=$upit3->cena*$upit3->Kolicina;?></td><td><?=$upit3->Kolicina;?></td><td><?=$upit3->VremePorudzbine;?></td></tr>

  <?php
  $rb++; 
}?>
</table>
<?php }?>
</div>


















</div>
