"use strict"; 


// Add event listener to getContinent function
document.getElementById("continente").addEventListener("change", getContinent);



function cargarPaises(paises) {
    let paisesSelect = document.getElementById("countrySelect");
    paisesSelect.innerHTML = "";
    for (let i = 0; i < paises.length; i++) {
        let option = document.createElement("option");
        option.text = paises[i];
        paisesSelect.add(option);
    }
}

function getContinent() {
    let lookup = {
        'america': ['Los Angeles', 'Cancún', 'Toronto'],
        'europa': ['Barcelona', 'Berlín', 'París'],
        'asia': ['Istanbul', 'Tòquio', 'Bangkok'],
        'africa': ['Marràqueix', 'El Caire', 'Ciutat del Cap'],
        'oceania': ['Sydney', 'Melbourne', 'Auckland']
    };
    let continent = document.getElementById("continente").value;
    let paises = lookup[continent];
    cargarPaises(paises);
}

