<?php if(!isset($_SESSION['korisnik'])){?>

<div id="sredinak">
               <div class="login">
                <h1 id="prnaslov">Prijava</h1>
                <form action="#" method="post">
                <input type="email" placeholder="email" id="lemejl" class="polje"/>
              <input type="password" placeholder="Lozinka" id="llozinka" class="polje"/>
              
                <div id="prijavagreske">

                    
                </div>

                <input type="button" value="Prijava" id="ldugme" class="kdugme"/>
                    </form>
               </div>
               <div id="myModal4" class="modal">          
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-check-circle"></i>
  <p id="tekstkorpa">Uspešno ste napravili nalog.</p>
</div>
</div>

<div id="myModal5" class="modal">          
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">E-mail vec postoji!</p>
</div>
</div>
<div id="myModal6" class="modal">          
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">Morate prvo napraviti nalog!</p>
</div>

</div>
               <div class="login">
                    <h1 id="prnaslov">Registracija</h1>
                    <form action="#" method="post">
                    <input type="text" placeholder="Ime" id="rime" class="polje"/>
                    <div class="skrivenn">
                        <i class="fas fa-question-circle"> 
                  </i> <p id="aa"> Ime mora pocinjati velikim slovom, osoba moze imati vise imena</p></div>
                  
                 <input type="text" placeholder="prezime" id="rprezime" class="polje"/>
                 <div class="skrivenn">
                        <i class="fas fa-question-circle s2"> 
                  </i> <p id="aa"> Prezime mora pocinjati velikim slovom, osoba moze imati vise prezimena</p></div>
                <input type="email" placeholder="email" id="remejl"class="polje"/>
                <div class="skrivenn">
                        <i class="fas fa-question-circle s3"> 
                  </i> <p id="aa"> Molimo vas ostavite Vas e-mail</p></div>
                    <input type="password" placeholder="Lozinka" id="rlozinka"class="polje"/>
                    <div class="skrivenn">
                            <i class="fas fa-question-circle s4"> 
                      </i> <p id="aa"> Lozinika mora biti kombinacija samo slova i brojeva i prva tri karaktera moraju biti slova</p></div>
                    <input type="password" placeholder="Ponovite lozinku" id="rponlozinka"class="polje" />
                    <div class="skrivenn">
                            <i class="fas fa-question-circle s5"> 
                      </i> <p id="aa">Lozinke moraju da se poklapaju.</p></div>
                    <div id="greske">
                   
                    </div>
                    <input type="button" value="Registracija" id="rdugme" class="kdugme"/>
                    </form>
               </div>
               </div>
               <script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
               <script type="text/javascript" src="app/assets/js/registracija.js"></script>


               <?php }
                else{
                  header("Location:index.php?page=pocetna");
                }
               