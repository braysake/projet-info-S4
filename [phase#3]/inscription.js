/*... fichier script.js...*/
import * as lib from "./script.js";

let form = document.getElementById("form_inscription").querySelectorAll("input");
let espaceMessage=document.getElementById("message_inscription");

let count1=document.getElementById("count1");
let count2=document.getElementById("count2");
let count3=document.getElementById("count3");
let count4=document.getElementById("count4");

function verif_information(){
    let res=0;
    espaceMessage.textContent=``;

    //verif nom etprenom
    res+=lib.verif_nom_prenom(form[0],espaceMessage);
    lib.count_mdp(count1, form[0]);
    res+=lib.verif_nom_prenom(form[1],espaceMessage);
    lib.count_mdp(count2, form[1]);

    //verif date de naissance
    res+=lib.verif_naissance(form[3],espaceMessage);

    //verif mail
    res+=lib.verif_mail(form[4],espaceMessage);
    res+=lib.verif_mail(form[5],espaceMessage);
    res+=lib.verif_mail_identique(form[4],form[5],espaceMessage);

    //verif mdp
    res+=lib.verif_mdp(form[6],espaceMessage);
    lib.count_mdp(count3, form[6]);
    res+=lib.verif_mdp(form[7],espaceMessage);
    lib.count_mdp(count4, form[7]);
    res+=lib.verif_mdp_identique(form[6],form[7],espaceMessage);

    //verif check box
    res+=lib.verif_check(form[8],espaceMessage,res);

    if(res==0){
        form[form.length-1].removeAttribute("disabled");
        form[form.length-1].style.color="";
    }
    else{
        form[form.length-1].setAttribute("disabled","true");
        form[form.length-1].style.color="grey";
    }
}

form[form.length-1].setAttribute("disabled","true");
form[form.length-1].style.color="grey";
form.forEach(i => i.addEventListener("input",verif_information));

let oeil1=document.getElementById("oeil_mdp_inscription");
oeil1.addEventListener("click", () => lib.voir_mdp(form[6],oeil1));

let oeil2=document.getElementById("oeil_mdp_comfirme_inscription");
oeil2.addEventListener("click", () => lib.voir_mdp(form[7],oeil2));
