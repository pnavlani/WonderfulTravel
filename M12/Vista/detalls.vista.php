<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Wonderfull Travels</title>
    <link rel="stylesheet" href="../Estils/estils.css">
    <script type="module" src="../controlador/index.js"></script>
</head>

<body>
    <header>
        <nav>
            <h3 class="logo">Wonderful Travel</h3>
            <ul class="list-item">
                <li><a href="../Vista/reserva.vista.php">Home</a></li>
                <li><a href="detalls.php">Reserves</a></li>
                <li><a href="closesess.php"><span>Tancar sessió</span></a></li>
            </ul>
        </nav>
    </header>
    <h2 style="padding: 10px;">Reservas</h2>
    <form style="padding: 10px;" action="factura.php" method="post" target="_blank" name="formFactura">
    <label for="descargar"></label>
    <input type="number" id="idres" name="idres" placeholder="ID de la reserva">
    <input type="submit" id="descargar" value="Descargar factura">
    </form>
    <p style="padding: 10px;"><?php echo $reservas; ?> </p>
</body>

</html>