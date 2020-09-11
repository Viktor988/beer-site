
$('.slider').lbSlider({

    leftBtn: '.sa-left', // left button selector
    rightBtn: '.sa-right', // right button selector
    visible: 3, // visible elements quantity
    autoPlay: true, // autoscroll
    autoPlayDelay: 4 // delay of autoscroll in seconds
 
})

    $(document).ready(function(){
        slideShow();
      });
      
      function slideShow() {
        var trenutni = $('#slajder .aktivna');
        var next = trenutni.next().length ? trenutni.next() :trenutni.parent().children(':first');
        
        trenutni.hide().removeClass('aktivna');
        next.fadeIn().addClass('aktivna');
        
        setTimeout(slideShow, 4000);
      }


$(document).ready(function(){
  function proizvodUKorpi() {
 
return   JSON.parse(localStorage.getItem("products"));

  }
  
$("#proba").on("click",".ggc",function(){
  izvrsi($(this).data("id"))
})
$(".gg").click(function(){
  izvrsi($(this).data("id"))
})
function izvrsi(id){
    var id= id
    var zapremina=$("#zap").val();
 
 

    var products = proizvodUKorpi();
  
    if(products) {
        if(productIsAlreadyInCart()) {
            updateQuantity();
        } else {
            addToLocalStorage()
        }
    } else {
        addFirstItemToLocalStorage();
    }
 
    alert("Proizvod ste dodali u korpu! Potvrdite kupovinu klikom na korpu!");

    
    function productIsAlreadyInCart() {
        return products.filter(p => p.id == id).length;
    }

    function addToLocalStorage() {
        let products = proizvodUKorpi();
        products.push({
            id : id,
            quantity : 1,
            zapremina : zapremina,
     
       
        });
        localStorage.setItem("products", JSON.stringify(products));
    }

    function updateQuantity() {
        let products = proizvodUKorpi();
        for(let i in products)
        {
          
           
          
        
        if(products[i].id == id && products[i].zapremina!=zapremina){
          products.push({
            id : id,
            quantity : 1,
            zapremina :zapremina,
     
        
        });
        console.log("ubacuje")
    
      }}

        localStorage.setItem("products", JSON.stringify(products));
    }



    function addFirstItemToLocalStorage() {
        let products = [];
        products[0] = {
            id : id,
            quantity : 1,
            zapremina : $("#zap").val(),
       
       } 
      
        localStorage.setItem("products", JSON.stringify(products));
       
  
      }
}

// ispis proizvoda!!!!!




$.ajax({
url:"index.php?ajax=ispisiProizvode",
type:"get",
dataType:"json",
success:function(x){

  ispisi(x)
 
},
error:function(xhr,status,error){
  console.log(xhr,status)
}})
$(".ocene tr:odd").css({"background-color":"#231f20","color":"white"});
$(".ocene tr:even").css({"background-color":"#fda41d","color":"black"});
function ispisi(x){
var i=x;
var ispis="";
if(i.length>0){
for(var proiz of i){
  ispis+=` <div class="proizvod">
  <img src="${proiz.slikam}" alt="slika"/>
     <p id="marka">${proiz.nazivProizvodjaca}-${proiz.nazivVrste}</p>
     <p id="cenao">${proiz.cena},00 RSD</p>
     <a href="index.php?page=proizvod&id=${proiz.idProizvod}" data-id=${proiz.idProizvod} class="lopsirno" target="_blank">Opširnije</a>
    
    </div>`
}
$(".pagination").css("visibility","initial");
}
else{
  ispis+=`<h2 id='nema'>Nema proizvoda po zadatom kristerijumu!<i class="far fa-frown"></i></h2>`
  $(".pagination").css("visibility","hidden");
}
$("#proizvodi").html(ispis);

}



//ispis paginacije

  function pisipaginaciju(c){
    
    var brojproizvoda=c.brojproizvoda;
    var prikaz=Math.ceil(brojproizvoda/4);
    var ispis=""
    if(prikaz!="0"){
    ispis+=``;
   for(let i=1;i<=prikaz;i++){
    ispis+=` 
    <a href="javascript:void(0)"  data-id="${i}"class="pag">${i}</a>`
   }
ispis+=``}
else{ispis+=`
<a href="javascript:void(0)" data-id="1"class="pag">1</a>

`}
$(".pagination").html(ispis)}

//filtriraj proizvode
$(".pagination").on("click",".pag",function(){
let zemlja=$(".liste").val();
let marka=$(".marke").val();
let trazi=$("#trazi").val();
let sort=$(".sortiraj").val();
let cena=$("#cenas").val();
let pag=$(this).data("id");
$.ajax({
  url:"index.php?ajax=filteripaginacija",
  type:"post",
  dataType:"json",
  data:{pag:pag,zemlja:zemlja,marka:marka,trazi:trazi,cena:cena,sort:sort,send:true},
  success:function(x){
    
ispisi(x)
  },
  error:function(xhr,status,error){
    console.log(xhr,status)
}})})


$("#dugme").click(function(){
  let zemlja=$(".liste").val();
  let marka=$(".marke").val();
  let trazi=$("#trazi").val();
  let sort=$(".sortiraj").val();
  let cena=$("#cenas").val();
  let pag=$(".pag").data("id");
  $.ajax({
    url:"index.php?ajax=filteripaginacija",
    type:"post",
    dataType:"json",
    data:{pag:pag,zemlja:zemlja,marka:marka,trazi:trazi,cena:cena,sort:sort,send:true},
    success:function(x){
  ispisi(x)
    },
    error:function(xhr,status,error){
      console.log(xhr,status)
  }})
// pisanje broja paginacije
  $.ajax({
  url:"index.php?ajax=brojPaginaciju",
  type:"post",
  dataType:"json",
  data:{pag:pag,zemlja:zemlja,marka:marka,trazi:trazi,cena:cena,sort:sort,send2:true},
  success:function(v){
  pisipaginaciju(v)
 
    },
  error:function(xhr,status,error){
  console.log(xhr,status)
  }})
})})

// promena cene na proizvodu i ispis


$("#zap").change(function(){
  let idzap=$("#zap").val();
  let id=$(".gg").data("ids");
  $.ajax({
    url:"index.php?ajax=ispisiCenu",
    type:"get",
  dataType:"json",
    data:{id:id,idzap:idzap},
    success:function(v){
     
      $("#proz").css("visibility","visible")
      if(v!=false){
        $("#cenaopp").html(v.cena+" RSD")
    
      
        $(".ggc").css("visibility","initial")
          $(".ggc").css("display","block")
          $("#proz").css("visibility","hidden")
          $("#proz").css("display","none")
        var ispis=`<a href="#" class="lkorpa ggc" data-id="${v.idproizvodZapremina}">Dodaj u korpu</a>`
       $("#proba").html(ispis)
        
      }
      else{
        let p=`<span class="nema">Nije dostupna</span><br/><span>Trenutno nema na stanju!</span>`
        $("#cenaopp").html(p)
          // $("#cenaopp").html("Trenutno nema na stanju!")
          $("#proz").css("visibility","hidden")
          $(".ggc").css("visibility","hidden")
          $(".ggc").css("display","none")
   
    }},error:function(xhr,status,error){
      console.log(xhr,status)
     ;}
  
    })
  })
//slanje preko kontakt forme
$("#kondugme").click(function(){
let email=$("#mejl");
let naslov=$("#naslov");
let tekstk=$("#tekstk");
let remail=/^[\w]+[\.\_\-\w]*[0-9]{0,3}\@[\w]+([\.][\w]+)+$/;
let renaslov=/[A-z0-9.?,!]/;
let retekst=/[A-z0-9.?,!]/;
let greske=0;
if(email.val()==""){
email.css("border-color","red");
greske=1;
}
else if(!remail.test(email.val())){
  email.css("border-color","red");
  greske=1;}
  else{ email.css("border-color","green");  greske=0;}


   if(naslov.val()==""){
    naslov.css("border-color","red");
    greske=1;
    }
  else if (!renaslov.test(naslov.val())){
    naslov.css("border-color","red");
    greske=1;}
   
    else{ naslov.css("border-color","green");  greske=0;}


  if(tekstk.val()==""){
    tekstk.css("border-color","red");
    greske=1;
    }
    else if(!retekst.test(tekstk.val())){
      tekstk.css("border-color","red");
      greske=1;}
      else{tekstk.css("border-color","green")
    greske=0;
    }
if(greske==0){

  
}

    })

//////////////////////////////////////////////////////// zvezde

  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }})
    
    
    
    function vratiModel(promenjiva){
      var modal2 =promenjiva;
      var span = $(".close");
        modal2.css("display","block");
      span.click (function() {
        modal2.css("display","none");
      })
      window.onclick = function(event) {
        if (event.target == modal2) {
          modal2.css("display","none");
        }
      }
    }
    

    //ubacivanje glasanje
    
    $(".star").click(function(){
      $(".rating-widget").css("pointer-events","none")
$(".rating-widget ul li").css("opacity","0.8")
      var idproizvod=$(this).data("proizvod");
      var vr=$(this).data("value");
      $.ajax({
        url:"index.php?ajax=proveraGlasanje",
        type:"post",
        data:{idproizvod:idproizvod},
        dataType:"json",
        success:function(x){
        if(x.broj<1){
          upisi(idproizvod,vr)
        }
        if(x.broj>=1){
          vratiModel(promenjiva=$("#myModal9"))
        }

        },
        error:function(xhr,status,error){
          vratiModel(promenjiva=$("#myModal8"))
     
        }


      })})
      function upisi(idpr,vr){
let idproizvod=idpr;
let vre=vr
$.ajax({
url:"index.php?ajax=glasanje",
type:"post",
data:{vr:vre,idproizvod:idproizvod},
success:function(x){
console.log("uneto")
ispisProsecne();

},
error:function(xhr,status,error){
  console.log(xhr.status)
  if(xhr.status==401){
  vratiModel(promenjiva=$("#myModal8"))
  }
}
})}





    

//admin panel 

$(".korisnik").click(function(){
$(".admkorisnik").toggle();})
$(".adproizvod").click(function(){
$(".admproizvod").toggle();})
$(".adkorpa").click(function(){
$(".admkorpa").toggle();})
$(".dugkor").click(function(){
$(".azurforma").css("display","none");
$(".korisniciadmin").toggle();})
$(".dugproizvod").click(function(){
$(".proizvodiadmin").toggle();prikaziProizvode()})
$(".dodajkorisnikadugme").click(function(){
$(".dodajkorisnika").toggle();})
$(".dugmeadmin").click(function(){
$(".dodajproizvod").toggle();})
$("#dugkorpa").click(function(){
$("#korpaa").toggle();})
$(".adstatistike").click(function(){
  $("#brojposecenosti").toggle();})
      

///prikaz korisnika


function prikaziBezOsvezavanja(){
      $.ajax({
        url:"index.php?ajax=prikaziKorisnike",
        type:"get",
        dataType:"json",
        success:function(sve){
          var rednibroj=1
          var ispis=`<table border='1' id="korisnici">
          <tr><th>Redni broj</th><th>ID Korisnika</th><th>Ime</th><th>Prezime</th><th>Email</th><th>Uloga</th><th><input type="button" name="izkordugme" value="Izbrisi" class="izkordugme"</th><th>Azuriraj</th>
       </tr>`
          for(var prom of sve){
  ispis+=` <tr><td>${rednibroj}</td><td>${prom.idKorisnik}</td><td>${prom.ime}</td><td>${prom.prezime}</td><td>${prom.email}</td><td>${prom.naziv}</td><td><input type="checkbox" value="${prom.idKorisnik}" name="kor" id="kor"</td><td><a href="javascript:void(0)" class="azuriraj"data-id="${prom.idKorisnik}">Azuriraj</a></td>
  </tr>`
  rednibroj++;}
          ispis+="</table>"
          $(".korisniciadmin").html(ispis);}
          ,   error:function(xhr,status,error){
            }
        })
      }
      $(".admkorisnik").on("click",".dugkor",function(){
        prikaziBezOsvezavanja()})
//brisiKorisnika
$(".korisniciadmin").on("click",".izkordugme",function(){
  console.log("k")
  var cekovi=$("input[name='kor']:checked");
  let niz=[];
  for(var a of cekovi){
      niz.push(a.value);
      console.log(niz)
  }
  $.ajax({
    url:"index.php?ajax=BrisanjeKorisnika",
    method:"post",
    data:{
        niz:niz},
    success:function(podaci){
     
      prikaziBezOsvezavanja()
      console.log("obrisan");
    },
    error:function(xhr,error,status){
    console.log(xhr,status,error)}})})
    
//azuriranje korisnika
$(".korisniciadmin").on("click",".azuriraj",function(){
  var id=$(this).data("id");
  $.ajax({
    url:"index.php?ajax=PrikaziJednogKorisnika",
    method:"post",
    dataType:"json",
    data:{
        id:id},
        success:function(podaci){
          let ispis=`<form method="post" action="index.php?page=admin">
          <input type="hidden" value="${podaci.idKorisnik}" id="rime" class="polje2" name="skriveno"/><br/>
    <input type="text" value="${podaci.ime}" id="rime" class="polje2" name="ime"/><br/>
    <input type="text" value="${podaci.prezime}" id="rprezime" class="polje2"name="prezime"/><br/>
    <input type="email" value="${podaci.email}" id="remejl"class="polje2"name="email"/><br/>
    <input type="password" value="${podaci.lozinka}" id="rlozinka"class="polje2"name="lozinka"/><br/>
    <input type="password" value="${podaci.lozinkaponovo}" id="rponlozinka"class="polje2" name="ponovo"/><br/>
    <select id="listauloga" name="uloga"><br/>`
    if(podaci.naziv=="Korisnik"){
    ispis+=`<option value="2">Korisnik</option>
    <option value="1">Admin</option>`}
    else{
      ispis+=`<option value="1">Admin</option>
    <option value="2">Korisnik</option>`
    }
    ispis+=`</select>
    <input type="submit" name="posaljiUpdate" value="Azuriraj" class="dugmezaadmin"/>
        </form>`
        $(".azurforma").html(ispis)
        $(".azurforma").css("display","block");
        console.log(podaci.ime)
        },
        error:function(xhr,status,error){
          console.log(xhr,status,error)
        }})})


  // prikaz proizvoda

 function prikaziProizvode(){
    $.ajax({
      url:"index.php?ajax=prikaziProizvode",
      method:"get",
      dataType:"json",

          success:function(podaci){
           var rednibroj=1;
            var ispis=`<table border='1' id="korisnici">
            <tr><th>Redni broj</th><th>Naziv Zemlje</th><th>Naziv vrste</th><th>slika</th><th>Opis</th><th>Cena</th><th>Naziv proizvodjaca</th><th>Zapremina</th><th><input type="button" name="izprdugme" value="Izbrisi" class="izprdugme"</th><th>Azuriraj</th>
         </tr>`
            for(var prom of podaci){
    ispis+=` <tr><td>${rednibroj}</td><td>${prom.naziv}</td><td>${prom.nazivVrste}</td><td><img src="${prom.slikam}" class="sladmin"/></td><td><input type='button' id="dugmeopis"value="prikazi"/><p class="opisatipr">${prom.opis}</p></td><td>${prom.cena}</td><td>${prom.nazivProizvodjaca}</td><td>${prom.kolicina}</td><td><input type="checkbox" value="${prom.idproizvodZapremina}" name="proizvod" id="proizvod"</td><td><a href="javascript:void(0)" class="azuriraj"data-id="${prom.idproizvodZapremina}">Azuriraj</a></td>
    </tr>`
    rednibroj++;}
            ispis+="</table>"
              $(".proizvodiadmin").html(ispis)



          },error:function(xhr,status){
            console.log(xhr,status)
          }
        })}

        $(".proizvodiadmin").on("click","#dugmeopis",function(){
            $(this).next().toggle();
          if($(this).val()=="prikazi"){
              $(this).val("prikazi manje")}
          else{  $(this).val("prikazi")}})

          

      //obrisi proizvod
      $(".proizvodiadmin").on("click",".izprdugme",function(){
      
        var cekovi=$("input[name='proizvod']:checked");
        let niz=[];
        for(var a of cekovi){
            niz.push(a.value);
            console.log(niz)
      $.ajax({
        url:"index.php?ajax=BrisanjeProizvoda",
        method:"post",
        data:{
            niz:niz},
        success:function(podaci){
         console.log(podaci)
          prikaziProizvode()
          console.log("obrisan");
        },
        error:function(xhr,error,status){
        console.log(xhr,status,error)}})}})

// dohvati jedan proizvod za azuriranje 
$(".proizvodiadmin").on("click",".azuriraj",function(){
  $("#azurirati").css("display","block")
  var id=$(this).data("id");
  $.ajax({
    url:"index.php?ajax=PrikaziJedanProizvod",
    method:"post",
    dataType:"json",
    data:{
        id:id},
        success:function(podaci){
        console.log(podaci)
        $("#alkohol").val(podaci.alkohol)
        $("#sakriveno").val(podaci.idproizvodZapremina)
        $("#sakriveno1").val(podaci.idProizvod)
        $("#cenaa").val(podaci.cena)
        $("#opiss").val(podaci.opis)
        $("#markee").val(podaci.idMarka);
        $("#vrstee").val(podaci.idVrsta);
        $("#zapreminee").val(podaci.idZapremina);
        let ispis=`<img src="${podaci.slikam}" class="slicica"/>`
        $("#slikaad").html(ispis)
        },
        error:function(xhr,status,error){
          console.log(xhr,status,error)
        }})})

//korpa admin
$(".dugmeadmin").click(function(){

$.ajax({
  url:"index.php?ajax=PrikaziUadminu",
  type:"get",
  dataType:"json",
  success:function(sve){
 
    var rednibroj=1
    var ispis=`<table border='1' id="korisnici">
    <tr><th>Redni broj</th><th>Vrsta</th><th>Naziv proizvodjaca</th><th>Zapremina</th><th>Kolicina</th><th>Adresa </th><th>Ukupna cena </th><th>Vreme</th>
 </tr>`
    for(var prom of sve){
ispis+=` <tr><td>${rednibroj}</td><td>${prom.nazivVrste}</td><td>${prom.nazivProizvodjaca}</td><td>${prom.kolicina}</td><td>${prom.Kolicina}</td><td>${prom.adresaIsporuke}</td><td>${prom.Kolicina*prom.cena}</td><td>${prom.VremePorudzbine}</td>
</tr>`
rednibroj++;}
    ispis+="</table>"
    $("#korpaa").html(ispis);}
    ,   error:function(xhr,status,error){
      console.log(xhr,error,status)}
  })
})
 

$("#cenas").change(function(){
  var vrednost=$(this).val();
  var tekst=$("#tekstc").html(vrednost)
})

  $("#proiztabla tr:odd").css("background-color", "#e4e1e1");
  $("#proiztabla tr:even").css("background-color", "#232e58");
  $("#proiztabla tr:even td").css("color", "white");
  $("#proiztabla tr:even th").css("color", "white");


  // $(".navdugme").css("display","none");
$(".navdugme").click(function(){
  $(this).css("display","none")
  $("#lblCartCount").toggle("slow");
  $(".snip1226").toggle("slow");
  $("#X").css("display","flex")

})
$("#X").click(function(){
  $(this).css("display","none")
  $("#lblCartCount").toggle("slow");
  $(".snip1226").toggle("slow");
  $(".navdugme").css("display","block")

})

$("#filterdugme").click(function(){
  $("#filteri").slideToggle();

})
$(document).ready(function(){
  


  
  $(".prvi").on("mouseover",".liste",
  function() {
    $( this ).css( "border","2px solid #fda41d");
  })
  $(".prvi").on("mouseout",".liste",
  function() {
    $( this ).css( "border","0px solid #fda41d");
  })

    
    
    
    
    

    
    



$(".proizvod").hover(
  function() {
    $( this ).css( "box-shadow","0px 0px 5px");
 
  }, function() {
    $( this ).css( "box-shadow","1px 3px 12px");
 
  }
);

$("#proizvodi").on("mouseover",".proizvod img",
  function() {
    $( this ).css( "opacity","1");
  })
  $("#proizvodi").on("mouseout",".proizvod img",
  function() {
    $( this ).css( "opacity","0.93");
  })




var cenaa=$("#ckorpa");




})

/////////////////////////////