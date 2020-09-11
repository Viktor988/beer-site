$(document).ready(function(){
$("#dugmeiz").click(function(){
    var reime = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/;
    var reprezime = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/;
    var resifra=/^[A-z]{3,}[0-9]{1,}/;
    let ime=$("#izime");
    let id=$("#izid").val();
    let prezime=$("#izprezime")
    let lozinka=$("#izlozinka")
    let ponovo=$("#izponlozinka")
    let imee=$("#izime").val();
    let prezimee=$("#izprezime").val();
    let lozinkae=$("#izlozinka").val();
    let ponovoe=$("#izponlozinka").val();
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
            url:"index.php?ajax=izmenaNaloga",
            type:"post",
            data:{ime:imee,prezime:prezimee,lozinka:lozinkae,ponovo:ponovoe,id:id},
            success:function(x){
         alert("Podaci su izmenjeni")

 
         
        },
        error:function(xhr,error,status){
            console.log(xhr,status)
        }
    })
    }
})
})



        