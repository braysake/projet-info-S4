/*... fichier script.js...*/
export function verif_nom_prenom(input, message){
    if(input.value.length < 2 || input.value.includes(" ")){
        if (input.value.length!=0 && message.textContent==``){
            message.textContent=`votre nom et prenom doit contenir au moin 2 caractère et aucun espace`;
        }
        return 1;
    }
    return 0;
}

export function verif_naissance(input, message){
    let compare=input.value.split('-');
    if(compare[0]<"1900" || compare[0]> new Date().getFullYear()-18){
        if (input.value.length!=0 && message.textContent==``){
            message.textContent=`date de naissance impossible`;
        }
        return 1;
    }
    return 0;
}

export function verif_mail(input, message){
    let verif=input.value.split("@");

    if(verif.length!=2 || (verif.length==2 && (verif[0].length<1 || verif[1].length<1))){
        if (input.value.length!=0 && message.textContent==``){
            message.textContent=`mail incorrecte`;
        }
        return 1;
    }
    return 0;
}

export function verif_mail_identique(input1, input2, message){
	if (input1.value!=input2.value && message.textContent==``){
		message.textContent=`adresse mail différents`;
        return 1;
	}
    return 0;
}

export function verif_mdp(input, message){
    if(input.value.length < 5){
        if (input.value.length!=0 && message.textContent==``){
            message.textContent=`mots de passe tros court`;
        }
        return 1;
    }
    return 0;
}

export function voir_mdp(input, icon){
    if(input.type=="password"){
        input.type="text";
        icon.textContent="🙈";
    }
    else{
        input.type="password";
        icon.textContent="👁️";
    }
}

export function count_mdp(count, input){
    count.textContent=input.value.length;
}

export function verif_mdp_identique(input1, input2, message){
	if (input1.value!=input2.value && message.textContent==``){
		message.textContent=`mots de passe différents`;
		bouton.setAttribute("disabled","true");
        return 1;
	}
    return 0;
}

export function verif_check(input, message,res){
    if(!input.checked){
        if (message.textContent==`` && res==2){
            message.textContent=`vous devez accepter les condition d'utilisation`;
        }
        return 1;
    }
    return 0;
}