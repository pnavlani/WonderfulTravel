<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Wonderfull Travels</title>
    <link rel="stylesheet" href="Estils/estils.css">
    <script src="../index.php"></script>
</head>

<body>
    <h1>Wonderfull Travels</h1>
    <h2>PROJECTE 12</h2>
    <form>
        <div>
            <h2>Información del Viaje</h2>
            <label for="fecha_ida">Data</label>
            <input type="date" id="fecha_ida" name="fecha_ida" required><br><br>

            <label for="continente">Continent</label>
            <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="get">
                <select id="continente" name="continente" required onchange="this.form.submit()">
                    <option value="."></option>
                    <option value="america">Amèrica</option>
                    <option value="europa">Europa</option>
                    <option value="asia">Àsia</option>
                    <option value="africa">Àfrica</option>
                    <option value="oceania">Oceania</option </select><br><br>
                        <!-- Aquí hauries d'afegir opcions pels països segons el continent seleccionat -->
                </select><br><br>
            </form>
            <label for="num_pasajeros">Nombre de Passatgers*</label>
            <input type="number" id="num_pasajeros" name="num_pasajeros" value="0" required><br><br>
            Descompte del 20%<input type="checkbox" id="descuento" name="descuento"><br><br>
            <label for="precio">Preu:</label>
            <input type="number" id="precio" name="precio" readonly required><br><br>
            <input type="submit" value="Reservar" onclick="ferReserva()">
        </div>
        
        <div>
            <h2>Informació del Client</h2>
            <label for="nombre_cliente">Nom del Client*</label>
            
            <input type="text" id="nombre_cliente" name="nombre_cliente" required><br><br>
            <label for="nombre_cliente">NIF*</label>
            <input type="text" id="nif_cliente" name="nif_cliente" required><br><br>
            <label for="telefono">Correu*</label>
            <input type="tel" id="telefono" name="telefono" required><br><br>
            <label for="telefono">Direcció*</label>
            <input type="tel" id="telefono" name="telefono" required><br><br>
            <label for="telefono">Telèfon*</label>
            <input type="tel" id="telefono" name="telefono" required><br><br>

            


        </div>
    </form>
</body>

</html>