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
    'Auckland': '../photos/Auckland.webp'
};

// Add event listener to getContinent function
document.getElementById("num_pasajeros").addEventListener("change", calcularPrecio);

window.onload = function() {
    document.getElementById("img").style.display = "none";
    document.getElementById("errors").style.display = "none";
}

function showErrors()
{
    document.getElementById("errors").style.display = "block";
}

function showPic() {
    document.getElementById("img").style.display = "block";
}

document.getElementById("continente").addEventListener("change", function() {
    showPic();
    getContinent();
});

document.getElementById("countrySelect").addEventListener("change", function() {
    showPic();
    calcularPrecio();
});
document.getElementById("fecha_ida").addEventListener("change", function() {
    getDate();
});
document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("reserva");
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        validarForm(form);
    });
});

function validarForm(form) {
    let date = document.forms["reserva"]["fecha_ida"].value;
    let continent = document.getElementById("continente").value;
    let numPasajeros = document.getElementById("num_pasajeros").value;
    let errors = "";

    if (date === "") {
        errors += "Si us plau, introdueix la data d'anada.*\n";
    }

    if (continent === "") {
        errors += "Si us plau, selecciona un continent.*\n";
    }

    if (numPasajeros < 1 || numPasajeros > 5) {
        errors += "Si us plau, introdueix un nombre vàlid de passatgers (entre 1 i 5).*\n";
    }

    if (errors === "") {
        // No hay errores, permitir que el formulario se envíe
        alert("Reserva enviada correctament.");
        form.submit();
    } else {
        let errorsContainer = document.getElementById("errors");
        errorsContainer.textContent = errors;
        showErrors();
    }
}





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
    
    calcularPrecio();
}


function calcularPrecio() {
    let descompte = false;
    let ciutat = document.getElementById("countrySelect").value;
    let preu = precios[ciutat];
    let pasajeros = document.getElementById("num_pasajeros").value;
    let data = document.getElementById("fecha_ida").value;

    if (pasajeros >= 3) {
        descompte = true;
    }

    let total = preu * pasajeros;
    if (descompte) {
        total = total * 0.8;
    }
    let formatedTotal, formatedTotal2;
    //precio por persona
    formatedTotal2 = new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(preu);
    document.getElementById("preciopers").textContent = formatedTotal2;
    formatedTotal = new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(total);
    document.getElementById("precio").textContent = formatedTotal;
    document.getElementById("precio2").value = formatedTotal;
    if (descompte) { document.getElementById("desc").textContent = "Si"; }
    else { document.getElementById("desc").textContent = "No"; }
    document.getElementById("passajeros").textContent = pasajeros;
    document.getElementById("imagen").src = imatges[ciutat];
    document.getElementById("destino").textContent = ciutat;
    document.getElementById("fechat").textContent = data;
}

function getDate()
{
    let data = document.getElementById("fecha_ida").value;
    document.getElementById("fechat").textContent = data;
}


