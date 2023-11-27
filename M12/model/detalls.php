<?php
session_start();
// Verificar si el DNI del cliente está establecido en la sesión
if (isset($_SESSION['dni'])) {
    require_once '../database/pdo.php';
    $conexion = connexion();
    $dni = $_SESSION['dni'];

    // Realizar la consulta para obtener las reservas del cliente
    $query = "SELECT * FROM reservas WHERE DNI = :dni";
    // Preparar la consulta
    $stmt = $conexion->prepare($query);
    // Bind de los parámetros
    $stmt->bindParam(':dni', $dni);
    // Ejecutar la consulta
    $stmt->execute();

    // Comprobar si se encontraron resultados
    if ($stmt->rowCount() > 0) {
        // Guardar los detalles de las reservas en una variable
        $reservas = "<table>";
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
    header('Location: ../index.php');
    echo "<script type='text/javascript'>alert('No has iniciado sesión');</script>";
}
?>