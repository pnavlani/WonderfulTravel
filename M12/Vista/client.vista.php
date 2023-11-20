<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controlador/controlador.php" method="post">
    <h2>Informació del Client</h2>
            <label for="nombre_cliente">Nom del Client*</label>
            <input type="text" id="nombre_cliente" name="nom" required><br><br>

            <label for="nif">NIF*</label>
            <input type="text" id="nif" name="nif" required><br><br>

            <label for="telefon">Correu*</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="direccio">Direcció*</label>
            <input type="tel" id="direccio" name="direccio" required><br><br>
            
            <label for="telefon">Telèfon*</label>
            <input type="number" id="telefon" name="telefon" required><br><br>

            <input type="submit"  name="submit" required><br><br>
    </form>
</body>
</html>