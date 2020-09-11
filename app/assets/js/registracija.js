$(document).ready(function(){
    //provera registracije
$("#rdugme").click(function(){
    var reime = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/;
    var reprezime = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/;
    var reemail = /^[\w]+[\.\_\-\w]*[0-9]{0,3}\@[\w]+([\.][\w]+)+$/;
    var resifra=/^[A-z]{3,}[0-9]{1,}/;
    let ime=$("#rime");
    let prezime=$("#rprezime")
    let email=$("#remejl")
    let lozinka=$("#rlozinka")
    let ponovo=$("#rponlozinka")
    let imee=$("#rime").val();
    let prezimee=$("#rprezime").val();
    let emaile=$("#remejl").val();
    let lozinkae=$("#rlozinka").val();
    let ponovoe=$("#rponlozinka").val();
    let upit=2;
    var greske=[];
    if(ime.val()==""){
        greske.push("Niste uneli ime")
        ime.css("border-color","red");
    }
    else if(!reime.test(ime.val())){
        greske.push("Ime nije u dobrom formatu")
        ime.css("border-color","red");
    }
    else{
        ime.css("border-color","green");
    }
    if(prezime.val()==""){
        greske.push("Niste uneli prezime")
        prezime.css("border-color","red");
    }
    else if(!reprezime.test(prezime.val())){
        greske.push("Prezime nije u dobrom formatu")
        prezime.css("border-color","red");
    }
    else{
        prezime.css("border-color","green");
    }
    if(email.val()==""){
        greske.push("Niste uneli E-mail")
        email.css("border-color","red");
    }
    else if(!reemail.test(email.val())){
        greske.push("E-mail nije u dobrom formatu")
        email.css("border-color","red");
    }
    else{
        email.css("border-color","green");
    }
    if(lozinka.val()==""){
        greske.push("Niste uneli lozinku")
        lozinka.css("border-color","red");
    }
    else if(!resifra.test(lozinka.val())){
        greske.push("Lozinka nije u dobrom formatu")
        lozinka.css("border-color","red");
    }
    else{
        lozinka.css("border-color","green");
    }
    if(ponovo.val()==""){
        greske.push("Niste ponovili lozinku")
        ponovo.css("border-color","red");
    }
    else if(ponovo.val()!=lozinka.val()){
        greske.push("Lozinke se ne poklapaju")
        ponovo.css("border-color","red");
    }
    else{
        ponovo.css("border-color","green");
    }
    if(greske.length==0){
        $.ajax({
            url:"index.php?ajax=registruj",
            type:"post",
            data:{ime:imee,prezime:prezimee,email:emaile,lozinka:lozinkae,ponovo:ponovoe},
            success:function(x){
            var modal2 =$("#myModal4");
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
        },
        error:function(xhr,error,status){
    var poruka="";
    switch(xhr.status){
        case 404:
        poruka="Stranica ne postoji!";
        break;
        case 409:
            var modal2 =$("#myModal5");
            var span = $(".close");
            if(1==1){
              modal2.css("display","block");
            } 
            span.click (function() {
              modal2.css("display","none");
            })
        
            window.onclick = function(event) {
              if (event.target == modal2) {
                modal2.css("display","none");
              }
            }
        break;
    
    }
    document.getElementById("greske").innerHTML=poruka;	
        }
        })}
   else{
    
        var ispis="<ul>"

    for(var i=0;i<greske.length;i++){
    ispis+=`<li>${greske[i]}</li>`
    }
    ispis+="</ul>"
 $("#greske").html(ispis) }})

// provera prijave
$("#lemejl").focus();
$("#ldugme").click(function(){
let prijavaimejl=$("#lemejl");
let prijavasifra=$("#llozinka");
let prijavagreske=[];
var reemail = /^[\w]+[\.\_\-\w]*[0-9]{0,3}\@[\w]+([\.][\w]+)+$/;
var resifra=/^[A-z]{3,}[0-9]{1,}/;
if(prijavaimejl.val()==""){
prijavagreske.push("Niste uneli e-mail");
prijavaimejl.css("border-color","red");
}
else if(!reemail.test(prijavaimejl.val())){
    prijavagreske.push("E-mail nije u dobrom formatu");
    prijavaimejl.css("border-color","red");
}
else{prijavaimejl.css("border-color","green");}
if(prijavasifra.val()==""){
    prijavagreske.push("Niste uneli lozinku");
    prijavasifra.css("border-color","red");
    }
   else if(!resifra.test(prijavasifra.val())){
        prijavagreske.push("Lozinka nije u dobrom formatu");
        prijavasifra.css("border-color","red");
    }
    else{

        prijavasifra.css("border-color","green"); 
    }

    if(prijavagreske.length>0){
        let ispisi="<ul>";
        for(let i=0;i<prijavagreske.length;i++){
        ispisi+=`<li>${prijavagreske[i]}</li>`;

        }
ispisi+="</ul>"
$("#prijavagreske").html(ispisi);
    }

    else{
        $.ajax({
            url:"index.php?ajax=prijavi",
            type:"post",
          
            data:{prijavaime:prijavaimejl.val(),prijavasifra:prijavasifra.val()},
            success:function(x){
           window.location.replace("http://localhost/PHP2-Prvi%20sajt/sajtPHP21/SajtPHP2s1/Obaranje/index.php?page=pocetna");
           console.log("ide")
          
            },
            error:function(xhr,error,status){
                var modal2 =$("#myModal6");
                var span = $(".close");
           
                  modal2.css("display","block");
                
                span.click (function() {
                  modal2.css("display","none");
                })
            
                window.onclick = function(event) {
                  if (event.target == modal2) {
                    modal2.css("display","none");
                  }
                };
            }


    })
}})

  $(".fa-question-circle").click(function(){
    $(this).next().toggle();
    
  })




})