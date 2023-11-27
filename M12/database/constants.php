<?php
require 'pdo.php';



function registreClient($nom,$nif,$correo, $direccio, $telefon){
    $connexio = connexion();

    $stmt = $connexio->prepare("SELECT * FROM client WHERE nif = ?");
    $stmt->execute([$nif]);
    $comprv = $stmt->fetch(PDO::FETCH_ASSOC);
    if($comprv){
        echo "L'usuari ja existeix";
    }
    else{
        $stmt = $connexio->prepare("INSERT INTO client (nom, email, telefon, direccio, nif) VALUES (?, ?, ?, ?, ?)");
        if($stmt->execute([$nom, $correo, $telefon, $direccio, $nif])){
            echo "Client registrat amb exit";
        } else {
            echo "Error al registrar al client";
        }
    }
    
}

?>