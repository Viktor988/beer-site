$(document).ready(function () {
    
    let products = proizvodUKorpi();
    
   
    displayCartData();

});

function displayCartData() {

    let products = proizvodUKorpi();

    $.ajax({
        url :"index.php?ajax=PrikaziProizvodUkorpi",
      dataType:"json",
        success : function(data) {
      
          let products = proizvodUKorpi();
          if(products==null){
            $("#adresa").css("display","none")
            $("#korpa").html("<h2 id='korpaprazna'>Vaša korpa je prazna!<h2>");
          }
          else{
     
            
            data = data.filter(p => {
                for(let prod of products)
                {
                    if(p.idproizvodZapremina == prod.id && p.idZapremina==prod.zapremina) {
                        p.quantity = prod.quantity;
                        p.zapremina = prod.zapremina;
                   
                        return true;
                    }
                     
                }
                return false;
            });
            generateTable(data)
        }},error:function(xhr,status,error){
        
        }
    })
  }

function generateTable(data){
  if(data.length==0){
    $("#adresa").css("display","none")
    $("#korpa").html("<h2 id='korpaprazna'>Vaša korpa je prazna!<h2>");

  }
  else{
  
var ispis=` <table id='korpatab'>
<tr id="red">
      <th>Redni broj</th>
      <th>Slika</th>
      <th>Proizvodjac</th>
      <th>Vrsta</th>
      <th>Zapremina</th>
      <th>Cena</th>
      <th>Kolicina</th>
      <th>Odustani</th>
      <th>Kupi</th>
  </tr>`

var br=1


for(let i of data){
ispis+=`<tr class="redk"><td>${br}</td><td><img src='${i.slikam}'class='slikakorpa'/></td><td>${i.nazivProizvodjaca}</td><td>${i.nazivVrste}</td><td>

${i.kolicina}</td><td><span id="ckorpa">${i.cena}</span></td><td class='kolicin'data-id=${i.idProizvod}><input type="number" value="1" name="br" class="brporudzbina"/></td><td><a href="#" onclick='removeFromCart(${i.idproizvodZapremina})'id='kbrisi'><i class="fas fa-times"></i></a></td><td><a href="javascript:void(0)" id='kkupi'class="a" data-id=${i.idproizvodZapremina}  data-ids="1"><i class="fas fa-check"></i></a><input type='hidden' value="0" class="skriveno"/></td></tr>`;
br++
}

ispis+="</table>"

$("#korpa").html(ispis);
$("#adresa").css("display","block")
}
$("#lblCartCount").html(data.length)

}


$("#korpa").on("click",".a",function(){


   var x= document.getElementsByClassName("kolicin")
var ccc=JSON.parse(localStorage.getItem("products"))
for(var ff of ccc){
    var id= $(this).data("id")
if(ff.id==id){
    
 var z=ff.id
var zapremina=ff.zapremina;
var kol=$(".brporudzbina").val();

}}    
var id=$(this).data("id");

var kol=$(this).closest("tr.redk").find("input[name='br']").val();

var isporuka=$("#adresa").val();
var poljeisporuka=$("#adresa");
var reisporuka=/[A-Za-z0-9'\.\-\s\,]/
var greske=0;

if(isporuka==""){
  console.log("go")
  poljeisporuka.css("border-color","red");
  var modal2 =$("#myModal7");
  var span = $(".close");
    modal2.css("display","block");
  span.click (function() {
    modal2.css("display","none");
  })
  greske=1;
}
if(greske==0){
  poljeisporuka.css("border-color","green");
$.ajax({
  
    url:"index.php?ajax=UpisiUkorpu",
    type:"post",
    data:{
        id:id,
       kol:kol,
       isporuka:isporuka
    },
    success:function(sve){
      console.log(sve)
        var modal =$("#myModal");
        var span = $(".close");
          modal.css("display","block");
        span.click (function() {
          modal.css("display","none");
        })
        $(window).click(function(event) {
          if (event.target != modal) {
        modal.css("display","none"); }
        })
        removeFromCart(id)
         },error:function(xhr,error,status){
          console.log(xhr,status)
            var modal2 =$("#myModal2");
var span = $(".close");
  modal2.css("display","block");
span.click (function() {
  modal2.css("display","none");
})
window.onclick = function(event) {
  if (event.target != modal2) {
    modal2.css("display","none");
  }}}})}})
function proizvodUKorpi() {
    return JSON.parse(localStorage.getItem("products"));
}

function removeFromCart(id) {
    let products = proizvodUKorpi();
    let filtered = products.filter(p => p.id != id);
    localStorage.setItem("products", JSON.stringify(filtered));
    displayCartData();
}
$(document).ready(function () {
$("#korpa").on("change",".brporudzbina",function(){ 
 var br=document.getElementsByClassName("brporudzbina");
for(var a of br){
    if(a.value<=0){
        a.value='1';}}})})


 

