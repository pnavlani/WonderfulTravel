<?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';             
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_SESSION['dni']))
{
    if (isset($_POST['fecha_ida']) && isset($_POST['continente']) && isset($_POST['countrySelect']) && isset($_POST['num_pasajeros']) && isset($_POST['precio2']))
    {
        $fecha_ida = $_POST['fecha_ida'];
        $continente = $_POST['continente'];
        $countrySelect = $_POST['countrySelect'];
        $num_pasajeros = $_POST['num_pasajeros'];
        $precio2 = $_POST['precio2'];
        $dni = $_SESSION['dni'];
        $ID = generarID();
        insertarReserva($ID, $fecha_ida, $continente, $countrySelect, $num_pasajeros, $precio2, $dni);
        $email = getMail($dni);
        sendMail($email, $ID, $fecha_ida, $continente, $countrySelect, $num_pasajeros, $precio2, $dni);
        header('Location: detalls.php');

    }
}
else 
{
    header('Location: ../index.php');
    echo "<script type='text/javascript'>alert('No has iniciat sessió');</script>";
}

function insertarReserva($ID, $fecha_ida, $continente, $countrySelect, $num_pasajeros, $precio2, $dni)
{
    require_once '../database/pdo.php';
    $connexio = connexion();
    try {
        $stmt = $connexio->prepare("INSERT INTO reservas (ID, datareserva, preu, Continent, qclients, Ciutat, DNI) VALUES (:ID, :datareserva, :preu, :Continent, :qclients, :Ciutat, :DNI)");
        $stmt->bindParam(':ID', $ID);
        $stmt->bindParam(':datareserva', $fecha_ida);
        $stmt->bindParam(':preu', $precio2);
        $stmt->bindParam(':Continent', $continente);
        $stmt->bindParam(':qclients', $num_pasajeros);
        $stmt->bindParam(':Ciutat', $countrySelect);
        $stmt->bindParam(':DNI', $dni);
        $stmt->execute();
    } catch (Exception $e) {
        // Handle the exception
    }
}

function generarID()
{
    require_once '../database/pdo.php';
    $connexio = connexion();
    $id = '';
    $exists = true;

    while ($exists) {
        $id = mt_rand(10000, 99999); // Generates a random number with 5 digits

        $stmt = $connexio->prepare("SELECT COUNT(*) FROM reservas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        if ($count == 0) {
            $exists = false;
        }
    }

    return $id;
}

function sendMail($email, $ID, $fecha_ida, $continente, $countrySelect, $num_pasajeros, $precio2, $dni)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'aymanprovass@gmail.com';               //SMTP username
        $mail->Password   = 'zcfv iijr zcyt uktw';                             //SMTP password
        $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('aymanprovass@gmail.com', 'Ayman Sbay');
        $mail->addAddress($email);                                   //Add a recipient

        //Content 
        $mail->isHTML(true);                                         //Set email format to HTML
        $mail->Subject = 'Wonderful Travel - Detalls de la reserva';
        // Construir el cuerpo del correo
        $text = '
            <html>
            <head>
                <title>Reserva de viatge</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f2f2f2;
                    }
                    h1 {
                        color: #333333;
                    }
                    p {
                        color: #666666;
                    }
                </style>
            </head>
            <body>
                <h1>Detalls de la reserva</h1>
                <p>ID de reserva: ' . $ID . '</p>
                <p>Data d\'anada: ' . $fecha_ida . '</p>
                <p>Continent: ' . $continente . '</p>
                <p>País seleccionat: ' . $countrySelect . '</p>
                <p>Número de passatgers: ' . $num_pasajeros . '</p>
                <p>Preu: ' . $precio2 . '</p>
                <p>DNI: ' . $dni . '</p>
            </body>
            </html>
        ';

        $mail->Body = $text;

        $mail->send();
        $enviat = true;
    } catch (Exception $e) {
        $enviat = false;
    }
}

function getMail($dni)
{
    require_once '../database/pdo.php';
    $connexio = connexion();
    try {
        $stmt = $connexio->prepare("SELECT email FROM client WHERE nif = :nif");
        $stmt->bindParam(':nif', $dni);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['email'];
    } catch (Exception $e) {
        // Handle the exception
    }
}

?>