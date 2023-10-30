"use strict";

$.ajax({ 
    method: "POST", 
    url: "../index.php", 
    data: { continent: getContinent() } 
}).done(function(html){						 
}).fail(function(html){ 
   
}); 

function getContinent() {
    let continent = document.getElementById("continente").value;
    return continent;
}

