<?php

session_start();

if (isset($_POST['idres'])) {

    $reservaID = $_POST['idres'];
    $reservaID = strval($reservaID);

    if (idExists($reservaID)) {
        if (idPropio($reservaID, $_SESSION['dni'])) {
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
            echo "<script type='text/javascript'>alert('No pots descarregar aquesta reserva.');window.close();</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('No existeix aquest ID');window.close();</script>";
        

    }
} else {
    echo "<script type='text/javascript'>alert('No has introduït un ID');window.close();</script>";
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

function idPropio($reservaIDpar, $dni)
{
    require_once '../database/pdo.php';
    $connexio = connexion();
    $stmt = $connexio->prepare("SELECT ID, DNI FROM reservas WHERE ID = :reservaID AND DNI = :dni");
    $stmt->bindParam(':reservaID', $reservaIDpar);
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();
    $reservaID = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($reservaID) {
        return true;
    } else {
        return false;
    }
}
