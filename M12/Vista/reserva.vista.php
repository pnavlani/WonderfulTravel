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
<?php session_start(); if (isset($_SESSION['dni'])) { ?>
        <nav>
            <h3 class="logo">Wonderful Travel</h3>
            <ul class="list-item">
                <li><a href="reserva.vista.php">Home</a></li>
                <li><a href="../model/detalls.php">Reserves</a></li>
                <li><a href="../model/closesess.php"><span>Tancar sessió</span></a></li>
            </ul>
        </nav>
    <?php } else { ?>
        <nav>
            <h3 class="logo">Wonderful Travel</h3>
            <ul class="list-item">
                <li><a href="#">Home</a></li>
                <li><a href="#"><span>Iniciar sessió</span></a></li>
            </ul>
        </nav>
    <?php } ?>
      
    </header>
    <form name="reserva" id="reserva" action="../model/reserva.php" method="post">
        <div class="divv">
            <h2>Informació del viatge</h2>
            <label for="fecha_ida">Data</label>
            <input type="date" id="fecha_ida" name="fecha_ida" min="<?php echo date('Y-m-d'); ?>"><br><br>
    
            <label for="continente">Continent</label>
            <select id="continente" name="continente">
                <option value="" disabled selected>Selecciona una opcion</option>
                <option value="america">Amèrica</option>
                <option value="europa">Europa</option>
                <option value="asia">Àsia</option>
                <option value="africa">Àfrica</option>
                <option value="oceania">Oceania</option>
            </select><br><br>
    
            <select id="countrySelect" name="countrySelect">
                <option value="" disabled selected>Porfavor selecciona una opcion</option>
            </select><br><br>
    
            <label for="num_pasajeros">Nombre de Passatgers*</label>
            <input type="number" id="num_pasajeros" name="num_pasajeros" value="1" min="1" max="5"><br><br>
            Descompte del 20% a partir de 3 passatgers<br><br>
            <p id="errors" style="color: red;"></p>
            <input type="text" id="precio2" name="precio2" readonly></input><br>
            <input type="submit" id="enviar" value="Reservar">
        </div>
        
    </form>
    
    <div class="divimg" id="img" style="width: 800px; height: 310px;">
        
        <img class="img" id="imagen" width="500" height="263">
        <h3>&nbsp;&nbsp;&nbsp;Resum de la reserva:</h3><br>
        <a><strong>&nbsp;&nbsp;&nbsp;Data d'anada: </strong></a> <a style="color: blueviolet;" name="fechat" id="fechat"></a><br><br>
        <a><strong>&nbsp;&nbsp;&nbsp;Destí:</strong></a> <a style="color: blueviolet;" id="destino"></a><br><br>
        <a><strong>&nbsp;&nbsp;&nbsp;Passatgers:</strong></a> <a style="color: blueviolet;" id="passajeros"></a><br><br>
        <a><strong>&nbsp;&nbsp;&nbsp;Descompte aplicat?</strong></a> <a style="color: blueviolet;" id="desc"></a><br><br>
        <a><strong>&nbsp;&nbsp;&nbsp;Preu per persona:</strong></a> <a style="color: blueviolet;" id="preciopers"></a><br><br>
        <a><strong>&nbsp;&nbsp;&nbsp;Preu total del viatge:</strong></a> <a id="precio" style="color: blueviolet;" name="precio"></a><br><br>
        <a style="margin-top: 5px; font-size: 10px; float: left; color: red;" >Recordeu que el descompte només s'aplica en viatges on hi hagi 3 passatgers o més* </a>
    </div>
    <div class="analogic">
        <div class="hour hand" id="hora"></div>
        <div class="minute hand" id="minut"></div>
        <div class="seconds hand" id="segons"></div>
        <img class="imgg" src="../photos/rellotge.svg" alt="Rellotge Analogic" />
    </div>

   <script src="../js/analogic.js"></script>
</body>

</html>