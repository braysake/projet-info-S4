function change(){
    let check=new Array();
    let show= document.getElementById("prix");
    check.push(document.getElementById("act1").checked);
    check.push(document.getElementById("act2").checked);
    check.push(document.getElementById("act3").checked);
    let prix = parseInt(show.dataset.base);
    for(let i=0;i<3;i++){
        if(check[i]===true){
            prix=parseInt(prix)+100;
        }
    }
    
    let text=document.createTextNode(prix);
    show.textContent= prix+".00€";
}
let prix=500;
document.write(prix);