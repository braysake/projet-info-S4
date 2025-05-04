/*... fichier script.js...*/
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

function turn_to_dark(){
    document.documentElement.style.setProperty('--color_1', '#000');
    document.documentElement.style.setProperty('--color_2', '#fff');
    document.documentElement.style.setProperty('--color_3', '#1e4566');
    document.documentElement.style.setProperty('--color_4', '#c5b93a');
    document.documentElement.style.setProperty('--color_5', '#243e9d');
    document.documentElement.style.setProperty('--color_6', '#b6b6b6');
    document.documentElement.style.setProperty('--color_7', '#a1b0d8');
}

function turn_to_light(){
    document.documentElement.style.setProperty('--color_1', '#fff');
    document.documentElement.style.setProperty('--color_2', '#000');
    document.documentElement.style.setProperty('--color_3', '#418fd1');
    document.documentElement.style.setProperty('--color_4', '#5a562d');
    document.documentElement.style.setProperty('--color_5', '#728ff8');
    document.documentElement.style.setProperty('--color_6', '#edf1ff');
    document.documentElement.style.setProperty('--color_7', '#2b468e');
}

function changer_mode(){
    if(getCookie("mode") == "0"){
        turn_to_dark();
        document.cookie="mode=1";
    }
    else if(getCookie("mode") == "1"){
        turn_to_light();
        document.cookie="mode=0";
    }
}

if(getCookie("mode") == "1"){
    turn_to_dark();
}

let dark_mode=document.getElementById("mode_sombres");
dark_mode.addEventListener("click", () => changer_mode());