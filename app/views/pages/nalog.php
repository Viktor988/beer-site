<?php if(isset($_SESSION['korisnik'])){?>
<div id="sredinak">
               <div class="promena">
                <h1 id="izmenan">Izmena naloga</h1>
                <form action="#" method="post">
                    <?php if(isset($_SESSION['korisnik'])){
                        ?>
                <fieldset class="izmenakor">
                <legend id="opiskor">Ime</legend>  
                <input type="text" value="<?=$_SESSION['korisnik']->ime;?>" id="izime" class="polje"/>
                <input type="hidden" value="<?=$_SESSION['korisnik']->idKorisnik;?>" id="izid" class="polje"/>
               </fieldset>
               <fieldset class="izmenakor">
                <legend id="opiskor">Prezime</legend>  
                <input type="text" value="<?=$_SESSION['korisnik']->prezime;?>" id="izprezime" class="polje"/>
               </fieldset> 
               <fieldset class="izmenakor">
                <legend id="opiskor">Lozinka</legend>  
                <input type="password" value="<?=$_SESSION['korisnik']->lozinka;?>" id="izlozinka" class="polje"/>
               </fieldset> 
               <fieldset class="izmenakor">
                <legend id="opiskor">Ponovite lozinku</legend>  
                <input type="password" value="<?=$_SESSION['korisnik']->lozinkaponovo;?>" id="izponlozinka" class="polje"/>
               </fieldset>
               <input type="button" value="Izmeni"id="dugmeiz"/>
                    <?php };?>  
</div></div>
<?php }
else{header("Location:index.php?page=pocetna");}
?>