<?php

if (isset($_POST['idres'])) {

    $reservaID = $_POST['idres'];
    
    if (idExists($reservaID)) {
        require_once '../database/pdo.php';
        $connexio = connexion();
        $stmt = $connexio->prepare("SELECT * FROM reservas WHERE ID = :reservaID");
        $stmt->bindParam(':reservaID', $reservaID);
        $stmt->execute();
        $reservationData = $stmt->fetch(PDO::FETCH_ASSOC);
    
        
        $continent = $reservationData['Continent'];
        $country = $reservationData['Ciutat'];
        $departureDate = $reservationData['datareserva'];
        $price = $reservationData['preu'];
        $passengers = $reservationData['qclients'];
        $DNI = $reservationData['DNI'];

        //a partir del dni agafar les dades del client
        $stmt = $connexio->prepare("SELECT * FROM client WHERE nif = :DNI");
        $stmt->bindParam(':DNI', $DNI);
        $stmt->execute();
        $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

        $nom = $clientData['nom'];
        $email = $clientData['email'];
        $telefon = $clientData['telefon'];
        $direccio = $clientData['direccio'];


        include '../Vista/factura.vista.php';
    } else {
        header('Location: hola.php');
        echo "<script type='text/javascript'>alert('No existeix aquest ID');</script>";
    }
} else {
    header('Location: pepe.php');
    echo "<script type='text/javascript'>alert('No has introduït un ID');</script>";
}

function idExists($reservaID)
{
    require_once '../database/pdo.php';
    $connexio = connexion();
    $stmt = $connexio->prepare("SELECT * FROM reservas WHERE ID = :reservaID");
    $stmt->bindParam(':reservaID', $reservaID);
    $stmt->execute();
    $reservaID = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($reservaID) {
        return true;
    } else {
        return false;
    }
}
