<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Wonderfull Travels</title>
    <link rel="stylesheet" href="../Estils/estils.css">
    <link rel="stylesheet" href="../Estils/rellotge.css">
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
    <div class="analogic" style="margin-top: -60px;">
        <div class="hour hand" id="hora"></div>
        <div class="minute hand" id="minut"></div>
        <div class="seconds hand" id="segons"></div>
        <img src="../photos/rellotge.svg" alt="Rellotge Analogic" />
    </div>
    <br>
    <br>
    <br>
    <br>    
   <script src="../js/analogic.js"></script>
    <h2 style="padding: 10px;">Reservas</h2>
    <form class="formm" style="padding: 10px;" action="factura.php" method="post" target="_blank" name="formFactura">
    <label for="descargar"></label>
    <input type="text" id="idres" name="idres" placeholder="ID de la reserva">
    <input type="submit" id="descargar" value="Descargar factura">
    </form>
    <br>
    <p style="padding: 10px;"><?php echo $reservas; ?> </p>
    
</body>

</html>