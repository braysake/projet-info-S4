function disable(){
    let table=document.getElementById("table");
    let add=document.getElementById("add_admin");
    let pag=document.getElementById("pagination").querySelectorAll("a");
    let link=[];

    let lignes = table.getElementsByTagName("th");
    for (let i = 0; i < lignes.length; i++) {
        lignes[i].style.color = "grey";
    }
    add.disabled=true;
    add.style.color="grey";

    for (let i=0; i<pag.length; i++) {
        link[i]=pag[i].getAttribute('href');
        pag[i].removeAttribute('href');
    }    

    setTimeout(function(){
        for (let i = 0; i < lignes.length; i++) {
            lignes[i].style.color = "";
        }
        add.disabled=false;
        add.style.color="";

        for (let i=0; i<pag.length; i++) {
            pag[i].setAttribute("href",link[i])
        }
    },5000);
}
