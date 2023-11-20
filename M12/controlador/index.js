"use strict"; 

const precios = {
    'Los Angeles': 800,
    'Cancún': 1200,
    'Toronto': 850,
    'Barcelona': 300,
    'Berlín': 450,
    'París': 450,
    'Istanbul': 400,
    'Tòquio': 900,
    'Bangkok': 700,
    'Marràqueix': 400,
    'El Caire': 350,
    'Ciutat del Cap': 500,
    'Sydney': 1050,
    'Melbourne': 900,
    'Auckland': 800
};

const contin = {
    'america': ['Los Angeles', 'Cancún', 'Toronto'],
    'europa': ['Barcelona', 'Berlín', 'París'],
    'asia': ['Istanbul', 'Tòquio', 'Bangkok'],
    'africa': ['Marràqueix', 'El Caire', 'Ciutat del Cap'],
    'oceania': ['Sydney', 'Melbourne', 'Auckland']
};

const imatges = {
    'Los Angeles': '../photos/Los Angeles.jpg',
    'Cancún': '../photos/Cancún.jpg',
    'Toronto': '../photos/Toronto.jpg', 
    'Barcelona': '../photos/Barcelona.webp',
    'Berlín': '../photos/Berlin.jpg',
    'París': '../photos/Paris.jpg',
    'Istanbul': '../photos/Istanbul.webp',
    'Tòquio': '../photos/Toquio.webp',
    'Bangkok': '../photos/Bangkok.jpg',
    'Marràqueix': '../photos/Marraqueix.jpg',
    'El Caire': '../photos/El_cairo.jpg',
    'Ciutat del Cap': '../photos/Ciudad_del_cabo.webp',
    'Sydney': '../photos/Sydney.jpg',
    'Melbourne': '../photos/Melborune.webp',
    'Auckland': '../photos/Auckland.jpg'
};

// Add event listener to getContinent function
document.getElementById("continente").addEventListener("change", getContinent);
document.getElementById("countrySelect").addEventListener("change", calcularPrecio);
document.getElementById("num_pasajeros").addEventListener("change", calcularPrecio);
document.getElementById("descuento").addEventListener("change", calcularPrecio);



function cargarCiutats(ciutats) {
    let ciutatsSelect = document.getElementById("countrySelect");
    ciutatsSelect.innerHTML = "";
    for (let i = 0; i < ciutats.length; i++) {
        let option = document.createElement("option");
        option.text = ciutats[i];
        ciutatsSelect.add(option);
    }
}

function getContinent() {

    let continent = document.getElementById("continente").value;
    let ciutats = contin[continent];
    cargarCiutats(ciutats);
}


function calcularPrecio() {
    let descompte = false;
    if (document.getElementById("descuento").checked) {
        descompte = true;
    }
    let ciutat = document.getElementById("countrySelect").value;
    let preu = precios[ciutat];
    let pasajeros = document.getElementById("num_pasajeros").value;

    let total = preu * pasajeros;
    if (descompte) {
        total = total * 0.8;
    }
    let formatedTotal;
    formatedTotal = new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(total);
    document.getElementById("precio").value = formatedTotal;
    document.getElementById("imagen").src = imatges[ciutat];
}



