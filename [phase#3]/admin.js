function disable(){
    let table=document.getElementById("table");
    let add=document.getElementById("add_admin");
    let lignes = table.getElementsByTagName("th");
    for (let i = 0; i < lignes.length; i++) {
        lignes[i].style.color = "grey";
    }
    add.disabled=true;
    add.style.color="grey";
    setTimeout(function(){
        for (let i = 0; i < lignes.length; i++) {
            lignes[i].style.color = "";
        }
        add.disabled=false;
        add.style.color="";
    },5000);
}