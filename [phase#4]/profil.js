/*... fichier script.js...*/
import * as lib from "./script.js";

let form = document.getElementById("form_profil").querySelectorAll("input");
let espaceMessage=document.getElementById("message_profil");

let btn_prenom = document.getElementById('btn_Prénom');
let btn_nom = document.getElementById('btn_nom');
let btn_Pseudo = document.getElementById('btn_Pseudo');
let btn_birth = document.getElementById('btn_birth');
let btn_nationalité = document.getElementById('btn_nationalité');

function modif(button){
    let champ=document.getElementById(button);
    if(champ.type=="select-one"){
        champ.removeAttribute("disabled");
        champ.style.color="";
    }
    else{
        champ.removeAttribute("readonly");
        champ.style.color="";
    }
}

function verif_information(){
    let res=0;
    espaceMessage.textContent=``;

    //verif nom etprenom
    res+=lib.verif_nom_prenom(form[0],espaceMessage);
    res+=lib.verif_nom_prenom(form[1],espaceMessage);

    //verif date de naissance
    res+=lib.verif_naissance(form[3],espaceMessage);

    //verif mail
    res+=lib.verif_mail(form[4],espaceMessage);

    if(res==0){
        form[form.length-1].removeAttribute("disabled");
        form[form.length-1].style.color="";
    }
    else{
        form[form.length-1].setAttribute("disabled","true");
        form[form.length-1].style.color="grey";
    }
}

function requete(){
    const formData = new FormData(document.getElementById("form_profil"));
    localStorage.setItem('requet_update', "-1");

    fetch('requet_profil.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        localStorage.setItem('requet_update', "0");
        throw new Error("Erreur HTTP : " + response.status);
      }
      else{
        localStorage.setItem('requet_update', "1");
      }

      return response.text();
    })
    .then(data => {
      console.log(data);

      document.getElementById('message_profil').innerHTML = data;
    })
    .catch(error => {
      console.error("Erreur avec fetch :"+ error);
    });
}

/*permet de modifier les champ*/
btn_prenom.addEventListener("click", () => modif("Prénom"));
btn_nom.addEventListener("click", () => modif("nom"));
btn_Pseudo.addEventListener("click", () => modif("Pseudo"));
btn_birth.addEventListener("click", () => modif("birth"));
btn_nationalité.addEventListener("click", () => modif("nationalité"));

/*verifie que les nouveaux champs sont correct*/
form.forEach(i => i.addEventListener("input",verif_information));

/*requete asynchrone de mise a jour*/
document.getElementById("form_profil").addEventListener('submit', function(event) {
    event.preventDefault();
    requete();
  });
