function requete(){
    let check=new Array();
    let show= document.getElementById("prixbase");
    check.push(document.getElementById("act1").checked);
    check.push(document.getElementById("act2").checked);
    check.push(document.getElementById("act3").checked);
    let select=document.getElementById("qualité");
    let choice=select.value;
    let prix = parseInt(show.dataset.base);

    const formData = new FormData();
    formData.append("prix",prix);
    formData.append("qualité",choice);
    formData.append("option",check);

    fetch('requet_detail_voyage.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error("Erreur HTTP : " + response.status);
      }
      return response.text();
    })
    .then(data => {
      console.log(data);
      show.textContent= data+"€";
    })
    .catch(error => {
      console.error("Erreur avec fetch :"+ error);
    });
}

/*requete asynchrone pour mettre a jour le prix*/
document.querySelectorAll('#form_detail_voyage *').forEach(element => { element.addEventListener('click',requete)});