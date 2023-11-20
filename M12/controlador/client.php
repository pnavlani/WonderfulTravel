<?php

    require './validacions.php';
    require '../database/constants.php';

if(($_SERVER["REQUEST_METHOD"] == "POST" ) && isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $nif = $_POST['nif'];
    $correo = $_POST['correo'];
    $direccio = $_POST['direccio'];
    $telefon = $_POST['telefon'];

    //Si els camps no estan buits es redirigeix cap a la funcio 
    if(!empty($nom) && !empty($nif) && !empty($correo) && !empty($direccio) && !empty($telefon)){
       validarClient($nom,$nif,$correo,$direccio,$telefon);
       echo
     /*  "<script>
       alert('Client Registrat');
        </script>"; */
        header("Location: ../Vista/index.vista.html");
    } else{
        //En el cas de que els camps estan buits
        if(empty($_POST['nom'])){
        $errors['nom'] = "Ompliu el nom";
        }

        if(empty($_POST["correo"])){
            $errors["correo"] = "Ompliu el correo";
        }  

        if(empty($_POST["nif"])){
            $errors["nif"] = "Ompliu el nif";
        }

        if(empty($_POST["direccio"])){
            $errors["direccio"] = "Ompliu la direcció";
        }

        if(empty($_POST["telefon"])){
            $errors["telefon"] = "Ompliu el telefon";
        }

    }

}

    function validarClient($nom,$nif,$correo, $direccio, $telefon){
        $validarNom = validarNom($nom);
        $validarNif = validarNif($nif);
        $validarCorreo = validarEmail($correo);
        $validarAdreca = validarAdreca($direccio);
        $validarTelefon = validarTelefon($telefon);


        if(isset($_POST["submit"])){
            if($validarNom != 1){
                $errors["nom"] = "Ha de cadena de caracters";
            }
            if($validarNif != 1){
                $errors["nif"] = "Nif incorrecte";
            }
            if($validarCorreo != 1){
                $errors["correo"] = "Correo electronic incorrecte";
            }
            if($validarAdreca != 1){
                $errors["direccio"] = "Poseu bé l'adreça";
            }
            if($validarTelefon !=1){
                $errors["telefon"] = "Incorrecte";
            }
            if(count($errors) == 0){
                registreClient($nom,$nif,$correo, $direccio, $telefon);
            }
        }
    }   

                
include 'Vista/client.vista.php';
?>