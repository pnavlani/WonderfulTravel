<?php
require '../database/pdo.php';



function registreClient($nom,$nif,$correo, $direccio, $telefon){
    $connexio = connexion();

    $stmt = $connexio->prepare("SELECT * FROM client WHERE nif = '$nif'");
    $stmt->execute();
    $comprv = $stmt->fetch(PDO::FETCH_ASSOC); 
    if($comprv){
        echo "L'usuari ja existeix";
    }
    else{
        $stmt = $connexio->prepare("INSERT INTO client (nom, email, telefon, direccio, nif) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($nom, $correo, $telefon, $direccio, $nif));
    }
    header('Location: ../Vista/index.vista.html');
}

?>