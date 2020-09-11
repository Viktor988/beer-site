




            <div id="navigacija">
            <div id="navbar">

<div id="logo">
   <a href="index.html" id="logolink"> 
       <img src="app/assets/slike/rsz_logo5.jpg"/>
      </a>
</div> 
<div id="meni">
    <div id="X"><i class="fas fa-times izadji"></i>
        
        <span id="zatvori">Zatvori</span></div>
    <i class="fas fa-bars navdugme"></i>
    <?php 
  
global $prikaz;
    ?>
    <?php 

    $ispis="<ul class='snip1226'>";
   foreach($parametri['prikaz'] as $pr):
        $ispis.="<li><a href='index.php?page=$pr->link'>$pr->text</a></li>";endforeach;
       $ispis.= "<li><a href='index.php?page=korpa'><i class='fas fa-shopping-cart' id='inkkorpa'></i>
       </a><span class='badge badge-warning' id='lblCartCount'>0</span></li>";
 $ispis.="</ul>";
 echo $ispis;
    ?>
</div>



            </div></div>