<h1 id="pojnaslov">Početna</h1>
            <hr id="pojlinija">
            <div id="sredina">
               
                <div class="slika prva">
<img src="app/assets/slike/proba2.jpg"/>
                </div>
                <div class="slika">
<p id="tekstpocetna">BeerShop je online shop koji objedinjuje male i velike domaće i strane proizvođače piva. Zahvaljujući ovoj online prodavnici, više ne morate obilaziti različite prodavnice i podrume pića u potrazi za više različitih proizvođača iz celog sveta. Dovoljno je samo par klikova i vaše omiljeno piće u najkraćem roku dolazi na vašu adresu.Ukus  piva ne donosi gaziranost već prirodnu fermentaciju, punoću ukusa i obilje zdravih elemenata, oseća se prirodna gorčina hmelja, a prijatnost se povećava pri svakom novom gutljaju.BeerShop je nastao iz želje da svim ljubiteljima piva omogući da na jednom mestu pronađu asortiman piva iz celog sveta od kojih ih deli samo par klikova.</p>
                </div>
              

            </div>
       
            <div id="sr2">
<h2>Najprodavaniji proizvodi</h2>
<hr id="pojlinija">
        <div class="slider">
           
            <ul id="listapr">
           
            <?php 
            $ispis="";
            foreach($proizvod as $proiz){
               ?>
            <li><div class="proizvod pocetna">
            <img src="<?=$proiz->slikam;?>" alt="slika"/>
            <p id="marka"><?=$proiz->nazivProizvodjaca;?>-<?=$proiz->nazivVrste;?></p>
     <p id="cenao"><?=$proiz->cena?>,00 RSD</p>
     <a href="index.php?page=proizvod&id=<?=$proiz->idProizvod;?>" data-id=<?=$proiz->idProizvod;?> class="lopsirno" target="_blank">Opširnije</a>
            </div> </li><?php };?>
           
           
            
            </ul>
            <a href="#" class="slider-arrow sa-left"><i class="fas fa-angle-left"></i></a>

            <a href="#" class="slider-arrow sa-right"><i class="fas fa-angle-right"></i></a>
            </div>
          
           
</div>

  
