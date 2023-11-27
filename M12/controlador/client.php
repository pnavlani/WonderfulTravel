<?php

    require_once '../controlador/validacions.php';
    require_once '../database/constants.php';
    $errors = [];
    
if(($_SERVER["REQUEST_METHOD"] == "POST" ) &&  isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $nif = $_POST['nif'];
    $correo = $_POST['email'];
    $direccio = $_POST['direccio'];
    $telefon = $_POST['telefon'];
    
    //Si els camps no estan buits es redirigeix cap a la funcio 
    if(!empty($nom) && !empty($nif) && !empty($correo) && !empty($direccio) && !empty($telefon)){
       validarClient($nom,$nif,$correo,$direccio,$telefon, $errors);
       registreClient($nom,$nif,$correo, $direccio, $telefon);
      header("Location: ../Vista/index.vista.html");
    } else{
        //En el cas de que els camps estan buits
        if(empty($_POST['nom'])){
        $errors.= "Ompliu el nom\n";
        }

        if(empty($_POST["email"])){
            $errors.= "Ompliu el correo\n";
        }  

        if(empty($_POST["nif"])){
            $errors.= "Ompliu el nif\n";
        }

        if(empty($_POST["direccio"])){
            $errors.= "Ompliu la direcció\n";
        }

        if(empty($_POST["telefon"])){
            $errors.= "Ompliu el telefon\n";
        }

    }

}

    function validarClient($nom,$nif,$correo, $direccio, $telefon, &$errors){
        $errors = [] ;
        if (!validarNom($nom)){$errors['nom']= "Ha de ser cadena de caracters\n";}
        if (!validarDNI($nif)){$errors['nif']= "NIF ha de ser 8 digits amb una lletra alfinal\n";}
        if (!validarEmail($correo)){$errors['email']= "Correu Electronic ha de contenir una @ al mig i un '.' \n";}

      /*  if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errors.= "Ha de contenir una @ al mig i un .";
        } */
        if (!validarAdreca($direccio)){$errors['direccio']= "Adreça incorrecte\n";}
        if (!validarNum($telefon)){$errors['telefon']= "Num Telefon incorrecte\n";}
        
      /*  if($errors === ""){
            registreClient($nom,$nif,$correo, $direccio, $telefon);
        } */

        /*
        if(count($errors) == 0){
                registreClient($nom,$nif,$correo, $direccio, $telefon);
            }
        */
    }   

                
include_once '../Vista/client.vista.php';
?>