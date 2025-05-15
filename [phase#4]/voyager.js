function sortitem(){
    console.log("oui")
    let div = document.getElementById('element');
    let items = Array.from(div.getElementsByClassName('container'));
    let criteria = document.getElementById("sortby").value;
    let way = document.getElementById("sort").value;
    if(way==="ascendant"){
        if(criteria==="durée"){
            items.sort((a, b) => parseInt(a.dataset.durée) - parseInt(b.dataset.durée));
            items.forEach(item => div.appendChild(item));
        }
        else{
            items.sort((a, b) => parseInt(a.dataset.price) - parseInt(b.dataset.price));
            items.forEach(item => div.appendChild(item));
        }
    }
    else{
        if(criteria==="durée"){
            items.sort((a, b) => parseInt(b.dataset.durée) - parseInt(a.dataset.durée));
            items.forEach(item => div.appendChild(item));
        }
        else{
            items.sort((a, b) => parseInt(b.dataset.price) - parseInt(a.dataset.price));
            items.forEach(item => div.appendChild(item));
        }
    }

}