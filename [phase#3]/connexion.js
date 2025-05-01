/*... fichier script.js...*/
import * as lib from "./script.js";

let form = document.getElementById("form_connexion").querySelectorAll("input");
let espaceMessage=document.getElementById("message_connexion");
let count=document.getElementById("count");

function verif_information(){
    let res=0;
    espaceMessage.textContent=``;

    //verif mail
    res+=lib.verif_mail(form[0],espaceMessage);

    //verif mdp
    res+=lib.verif_mdp(form[1],espaceMessage);
    lib.count_mdp(count, form[1]);

    if(res==0){
        form[form.length-1].removeAttribute("disabled");
    }
    else{
        form[form.length-1].setAttribute("disabled","true");
    }
}

form[form.length-1].setAttribute("disabled","true");
form.forEach(i => i.addEventListener("input",verif_information));

let oeil=document.getElementById("oeil_mdp_connexion");
oeil.addEventListener("click", () => lib.voir_mdp(form[1],oeil));
