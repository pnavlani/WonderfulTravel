<?php
session_start();
if (isset($_SESSION['dni'])) {
    require_once '../database/pdo.php';
    $conexion = connexion();
    $dni = $_SESSION['dni'];
    $query = "SELECT * FROM reservas WHERE DNI = :dni";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {

        $reservas = "<table style=\"padding: 10px;\">";
        $reservas .= "<tr><th>ID del vol</th><th>DNI</th><th>Passatgers</th><th>Continent</th><th>Ciutat</th><th>Data Reserva</th><th>Preu total</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reservas .= "<tr>";
            $reservas .= "<td>" . $row['ID'] . "</td>";
            $reservas .= "<td>" . $row['DNI'] . "</td>";
            $reservas .= "<td>" . $row['qclients'] . "</td>";
            $reservas .= "<td>" . $row['Continent'] . "</td>";
            $reservas .= "<td>" . $row['Ciutat'] . "</td>";
            $reservas .= "<td>" . $row['datareserva'] . "</td>";
            $reservas .= "<td>" . $row['preu'] . "</td>";
            $reservas .= "</tr>";
        }
        $reservas .= "</table>";
    } else {
        $reservas = "<br>No s'ha trobat cap reserva per a aquest usuari.";
    }
    include '../Vista/detalls.vista.php';
} else {
    echo "<script type='text/javascript'>alert('No has iniciado sesión');</script>";
    header('refresh:0;url=../index.php');
    
}
?>