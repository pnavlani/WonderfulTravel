<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Estils/estils.css">
  <link rel="stylesheet" href="Estils/rellotge.css">
    <title>Client</title>
    
</head>

<body>
    <h1>Wonderfull Travels</h1>
    <div class="analogic">
        <div class="hour hand" id="hora"></div>
        <div class="minute hand" id="minut"></div>
        <div class="seconds hand" id="segons"></div>
        <img src="../photos/rellotge.svg" alt="Rellotge Analogic" />
    </div>
   <script src="../js/analogic.js"></script>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h2>Informació del Client</h2>
            <label for="nom">Nom del Client*</label>
            <input type="text" id="nom" name="nom" ><br><br>
            <label for="nif">NIF*</label>
            <input type="text" id="nif" name="nif" ><br><br>
            <label for="email">Correu*</label>
            <input type="text" id="email" name="email" ><br><br>
            <label for="direccio">Direcció*</label>
            <input type="text" id="direccio" name="direccio" ><br><br>
            <label for="telefon">Telèfon*</label>
            <input type="text" id="telefon" name="telefon" ><br><br>
            <span style="color: red">
                <?php
                    if(!empty($errors)){
                        echo nl2br($errors);
                    }
                ?>
            </span>
            <br>
            <input type="submit"  name="submit" ><br><br>
    </form>
</body>
</html>