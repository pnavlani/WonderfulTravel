<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_SESSION['dni'])) {
    if (isset($_POST['fecha_ida']) && isset($_POST['continente']) && isset($_POST['countrySelect']) && isset($_POST['num_pasajeros']) && isset($_POST['precio2'])) {
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
} else {
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
    $id = "00000";
    $exists = true;

    while ($exists) {
        $stmt = $connexio->prepare("SELECT COUNT(*) FROM reservas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        if ($count == 0) {
            $exists = false;
        } else {
            $id = str_pad(intval($id) + 1, 5, "0", STR_PAD_LEFT);
        }
    }
    echo $id;
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

        require_once '../database/pdo.php';
        $connexio = connexion();
        $stmt = $connexio->prepare("SELECT * FROM client WHERE nif = :DNI");
        $stmt->bindParam(':DNI', $dni);
        $stmt->execute();
        $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

        $nom = $clientData['nom'];
        $email = $clientData['email'];
        $telefon = $clientData['telefon'];
        $direccio = $clientData['direccio'];

        $text = '
        <!DOCTYPE html>
        <html lang="ca">
        <head>
          <meta charset="utf-8">
          <title>Wonderful Travel</title>
          <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    header {
      text-align: center;
      padding: 10px;
      background-color: #f2f2f2;
    }

    section {
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    footer {
      margin-top: 20px;
      text-align: center;
    }
  </style>
        </head>
        <body>
          <header>
            <h1>Factura de Reserva</h1>
          </header>
        
          <section>
            <h3>Detalls de la teva reserva</h3>
            <table>
              <tr>
                <th>Continent</th>
                <td>' . $continente . '</td>
              </tr>
              <tr>
                <th>País</th>
                <td>' . $countrySelect . '</td>
              </tr>
              <tr>
                <th>Data de Reserva</th>
                <td>' . $fecha_ida . '</td>
              </tr>
              <tr>
                <th>Preu</th>
                <td>' . $precio2 . '</td>
              </tr>
              <tr>
                <th>Passatgers</th>
                <td>' . $num_pasajeros . '</td>
              </tr>
            </table>
            <h3>Les teves dades</h3>
            <table>
            <tr>
                <th>DNI</th>
                <td>' . $dni . '</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>' . $nom . '</td></tr>
            <tr>
                <th>Email</th>
                <td>' . $email . '</td>
            </tr>
            <tr>
                <th>Telèfon</th>
                <td>' . $telefon . '</td>
            </tr>
            <tr>
                <th>Adreça</th>
                <td>' . $direccio . '</td>
            </tr>
            </table>
          </section>
        
          <footer>
            <p>Gràcies per triar els nostres serveis. Per a qualsevol consulta, poseu-vos en contacte amb nosaltres a través del nostre lloc web o correu electrònic.</p>
          </footer>
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
