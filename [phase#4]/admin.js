function getCookie(name) {
    const cookies = document.cookie.split('; ');
    for (const cookie of cookies) {
        const [key, value] = cookie.split('=');
        if (key === name) {
            return decodeURIComponent(value);
        }
    }
    return null;
}

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

window.addEventListener('storage', (event) => {
    if (event.key === 'requet_update') {
      const message = JSON.parse(event.newValue);
      if(message == -1){
        disable();
      }
      else if (message==1){
        fetch('requet_admin.php')
        .then(response => {
          if (!response.ok) {
            throw new Error("Erreur HTTP : " + response.status);
          }

          return response.text();
        })
        .then(data => {
        console.log(data);
        let res = data.split(" ");

        document.getElementById(parseInt(res[res.length-1])).children[0].innerText=res[2];
        document.getElementById(parseInt(res[res.length-1])).children[1].innerText=res[3];
        document.getElementById(parseInt(res[res.length-1])).children[2].innerText=res[6];
        document.getElementById(parseInt(res[res.length-1])).children[3].innerText=res[4];
        document.getElementById(parseInt(res[res.length-1])).children[4].innerText=res[5];
        document.getElementById(parseInt(res[res.length-1])).children[5].innerText=res[0];
        })
        .catch(error => {
          console.error("Erreur avec fetch :"+ error);
        });
      }


      console.log('Message reçu depuis un autre onglet :', message);
    }
  });