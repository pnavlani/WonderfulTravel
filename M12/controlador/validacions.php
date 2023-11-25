<?php



function validarNom(string $nom): bool {
    return preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ]+([ -][a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/', $nom) === 1;
}


function validarDNI(string $dni): bool {
    return preg_match('/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i', $dni) === 1;
}


function validarEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) == true;
}


function validarAdreca(string $adreca): bool {
    return preg_match('/^[a-zA-Z0-9\s\.\,\-\#\/]+$/i', $adreca) === 1;
}


function validarNum(string $tel): bool {
    return preg_match('/^[6-9][0-9]{8}$/', $tel) === 1;
}


?>
