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
    <h1>Reservas</h1>
    <?php echo $reservas; ?>
</body>

</html>