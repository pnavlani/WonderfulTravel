<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="utf-8">
  <title>Dades de la Reserva</title>
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
        <td><?php echo $continent; ?></td>
      </tr>
      <tr>
        <th>País</th>
        <td><?php echo $country; ?></td>
      </tr>
      <tr>
        <th>Data de Reserva</th>
        <td><?php echo $departureDate; ?></td>
      </tr>
      <tr>
        <th>Preu</th>
        <td><?php echo $price; ?></td>
      </tr>
      <tr>
        <th>Passatgers</th>
        <td><?php echo $passengers; ?></td>
      </tr>
      
      
    </table>
    <h3>Les teves dades</h3>
    <table>
    <tr>
        <th>DNI</th>
        <td><?php echo $DNI; ?></td>
    </tr>
    <tr>
        <th>Nom</th>
        <td><?php echo $nom; ?></td></tr>
    <tr>
        <th>Email</th>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <th>Telèfon</th>
        <td><?php echo $telefon; ?></td>
    </tr>
    <tr>
        <th>Adreça</th>
        <td><?php echo $direccio; ?></td>
    </tr>
 
    </table>
  </section>

  <footer>
    <p>Gràcies per triar els nostres serveis. Per a qualsevol consulta, poseu-vos en contacte amb nosaltres a través del nostre lloc web o correu electrònic.</p>
  </footer>
</body>
</html>
