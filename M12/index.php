<?php

session_start();

require_once 'controlador/validacions.php';
require_once 'database/constants.php';
$errors = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $nif = $_POST['nif'];
    $correo = $_POST['email'];
    $direccio = $_POST['direccio'];
    $telefon = $_POST['telefon'];

    if (!empty($nom) && !empty($nif) && !empty($correo) && !empty($direccio) && !empty($telefon)) {
        validarClient($nom, $nif, $correo, $direccio, $telefon, $errors);
        registreClient($nom, $nif, $correo, $direccio, $telefon);
        $_SESSION['dni'] = $nif;
        echo "<script type='text/javascript'>alert('Client registrat correctament');</script>";
        header(('refresh:0;url=Vista/reserva.vista.php'));
    } else {
        if (empty($_POST['nom'])) {
            $errors .= "El camp nom és obligatori.\n";
        }

        if (empty($_POST["email"])) {
            $errors .= "El camp correu electrònic és obligatori.\n";
        }

        if (empty($_POST["nif"])) {
            $errors .= "El camp NIF és obligatori.\n";
        }

        if (empty($_POST["direccio"])) {
            $errors .= "El camp adreça és obligatori.\n";
        }

        if (empty($_POST["telefon"])) {
            $errors .= "El camp telèfon és obligatori.\n";
        }
    }
}

function validarClient($nom, $nif, $correo, $direccio, $telefon, &$errors)
{
    $errors = [];
    if (!validarNom($nom)) {
        $errors .= "Ha de ser cadena de caracters\n";
    }
    if (!validarDNI($nif)) {
        $errors .= "NIF ha de ser 8 digits amb una lletra alfinal\n";
    }
    if (!validarEmail($correo)) {
        $errors .= "Correu Electronic ha de contenir una @ al mig i un '.' \n";
    }
    if (!validarAdreca($direccio)) {
        $errors .= "Adreça incorrecte\n";
    }
    if (!validarNum($telefon)) {
        $errors .= "Num Telefon incorrecte\n";
    }
}


include_once 'Vista/client.vista.php';
