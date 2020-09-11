<h1 id="pojnaslov">Kontakt</h1>
            <hr id="pojlinija">
            <p id="podnaslovk">Ako imate neka pitanja ili nedoumice obratite se putem E-maila.</p>
            <div id="kontsredina">
           
                <div id="informacije">
                    <h2 id="inf">INFORMACIJE:</h2>
                    <p class="inf">Adresa:</p><p class="opisinf">Zaplanjska broj 32. </p>
                    <p class="inf">Email:</p><p class="opisinf">viktorciric31@gmail.com</p>
                    <p class="inf">Telefon:</p><p class="opisinf">064-1212-121</p>

                </div>
                    <div id="kontaktforma">
                    <?php
                    if(isset($_SESSION['korisnik'])){?>
                    <input type="email" name="email"class="kmejl" value="<?=$_SESSION['korisnik']->email;?>" id="mejl" placeholder="E-mail"/><?php }
                    else{?>

                    <input type="email" name="email" class="kmejl" id="mejl" placeholder="E-mail"/>
                    <?php };?>
                    <input type="text" class="kmejl" id="naslov" placeholder="Naslov poruke"/>
                    <textarea rows="7" cols="50" name="poruka"id="tekstk" placeholder="Tekst poruke"></textarea>
                     <input type="button" value="Posaljite" id="kondugme"/>
                    </div>
            </div>