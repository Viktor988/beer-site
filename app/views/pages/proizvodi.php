<div id="psredina">
               
               <button type="button" id="filterdugme"><i class="fas fa-filter"></i> | <i class="fas fa-sort-alpha-down"></i></button>
           <!-- <input type="button" value="Filteri" id="filterdugme"/> -->
           <div id="filteri">
               <form name="forma" action="#" method="POST">
               <div id="ide">
                   <div class="prvi zemlja">
<span class="tekstfilter">Zemlja:</span><select name="marke" class="liste" id="markal">

<option value="0">Izaberite..</option>
<?php 

foreach($zemlje as $zemlja){?>

<option value="<?=$zemlja->idZemlja;?>"><?=$zemlja->naziv;?></option>
<?php }?>

</select></div>

<div class="prvi marka">
`<span class="tekstfilter">Vrsta:</span><select name="pol" class="liste marke"id="pollista">
  <option value="0">Izaberite...</option>

<?php 

foreach($vrste as $vrsta){?>

<option value="<?=$vrsta->idVrsta;?>"><?=$vrsta->nazivVrste;?></option>
<?php }?>

</select>

 



</div>
<input type="text" id="trazi" placeholder="Pretraga..."/>
</div>
<div id="ide2">
   <div class="prvi">
           <span class="tekstfilter">Sortiraj:</span><select name="sortiraj" id="sort"class="liste sortiraj">
<option value="0">Izaberite...</option>
<option value="1">Po nazivu od A-Z</option>
<option value="2">Po nazivu od Z-A</option>
<option value="3">Po ceni opadajuce</option>
<option value="4">Po ceni rastuce</option>

</select>
</div>
<div class="prvi cenakl">
   <span class="tekstfilter">Cena do:</span><input type="range" id="cenas" min="80" max="1000" value="1000"/><i id="tekstc">1000</i>
</div>
<!-- <input type="button" id="dugme" value="Trazi"/> -->
<button type="button" id="dugme"><i class="fa fa-search"></i>Trazi</button>
</form>
<div id="izabrani">



</div>
</div>
           </div>
           <div id="proizvodi">
            
                  
           </div>


           <div class="pagination">
         <?php   $prikaz=ceil($broj->brojproizvoda/4);  
         
           if($prikaz!=0){
          for($i=1;$i<=$prikaz;$i++){?>
 
          <a href="javascript:void(0)"  data-id="<?=$i;?>"class="pag"><?=$i;?></a><?php }}
          else{?>
            <a href="javascript:void(0)" data-id="1"class="pag">1</a>`
            
            <?php };
          
          ?>
             </div>


       </div>