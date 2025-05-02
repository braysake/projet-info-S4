function change(){
    let check=new Array();
    let show= document.getElementById("prixbase");
    check.push(document.getElementById("act1").checked);
    check.push(document.getElementById("act2").checked);
    check.push(document.getElementById("act3").checked);
    let select=document.getElementById("qualité");
    let choice=select.value
    let prix = parseInt(show.dataset.base);
    switch (choice){
        case "économique":
            prix=prix-prix/2;
        break;
        case "moyen":
            prix=prix;
        break;
        case "deluxe":
            prix=parseInt(prix)+parseInt(prix)/2;
        break;
    }
    console.log(prix);
    for(let i=0;i<3;i++){
        if(check[i]===true){
            prix=parseInt(prix)+100;
        }
    }    
    show.textContent= prix.toFixed(2) +"€";
}
