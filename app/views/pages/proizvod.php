
<div id="pojsredina">
  <h1 id="pojnaslov"><?=$upit1->nazivProizvodjaca;?>-<?=$upit1->nazivVrste;?></h1>
  <hr id="pojlinija">
  <div id="prsredina">
      <div class="pojslika"><img src="<?=$upit1->slikam;?>" alt="slika"/></div>
      <div id="pojopis">
        <span class="naziv">Zemlja porekla:</span><span class="opisati"><?=$upit1->naziv;?></span><br/>
        <span class="naziv">Naziv:</span><span class="opisati"><?=$upit1->nazivProizvodjaca;?></span><br/>
        <span class="naziv">Stil:</span><span class="opisati"> <?=$upit1->nazivVrste;?></span><br/>
        <span class="naziv">Alkohol:</span><span class="opisati"> <?=$upit1->alkohol;?>%</span><br/>
        
        <span class="naziv">Zapremina:</span><span class="opisati">
      
     <?php  $ispis="<select name='zapremina' id='zap'>";
      
        foreach($upitz as $u){
      
    
     $ispis.="<option value='$u->idzapremina'>$u->kolicina</option>";
        }

       $ispis.="</select>";
       echo $ispis;?>
       </span><br/>
        
              <span id="cenaop">Cena:</span> <span id="cenaopp"><?=$upit1->cena;?> RSD</span><br/><br/>
              <a href="#" class="lkorpa gg" id="proz" value="0" data-id="<?=$upit1->idproizvodZapremina;?>" data-ids="<?=$upit1->idProizvod;?>">Dodaj u korpu</a>
              <span id="proba">   </span>
              
              
              
              <fieldset id="opispojedinacan">
                <legend id="legend">Opis</legend><span id="opis"><p id="opisati"><?=$upit1->opis;?></p></span>
               </fieldset> 
              
               <section class='rating-widget'>
  
  <!-- Rating Stars Box -->
  <div class='rating-stars text-center'>
     <ul id='stars'>
    <?php  for($i=1;$i<6;$i++){?>
    <li class='star' title='<?=$i;?>' data-proizvod='<?=$upit1->idProizvod;?>' data-value='<?=$i;?>'>
<i class='fa fa-star fa-fw'></i>

</li>
<?php };?>


    </ul> 
   
  
  </div>
<div id="ocenaproizvoda">
<p id="pocena" data-proizvod='<?=$upit1->idProizvod;?>'> 
<?php 
$ide=number_format($ocena->ocena, 2, '.', '');

if($ide>0){?>
<p id="pocena">(Prosecna ocena:<?= $ide?>,broj glasova:<?= $ocena->broj?>)</p>
<?php ;}
 else{?>
<p id="pocena">(Prosecna ocena:0,broj glasova:0)</p></p>
  
 <?php ; }?>
</div>
</section>
                  
      </div>
      



  </div>
      
  <div id="myModal8" class="modal">          
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">Morate biti prijavljeni da biste glasali!</p>
</div>
</div>
<div id="myModal9" class="modal">          
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">Za ovaj proizvod ste vec glasali ranije!</p>
</div>
</div>


  </div>











