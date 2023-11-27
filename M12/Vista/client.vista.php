<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Estils/client.css">
  <link rel="stylesheet" href="../Estils/rellotge.css">
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
            <?php
               if(!empty($errors["nom"])){
                echo $errors["nom"] ;
            }
            ?>
            <label for="nif">NIF*</label>
            <input type="text" id="nif" name="nif" ><br><br>
            <?php
               if(!empty($errors["nif"])){
                echo $errors["nif"] ;
            }
            ?>
            <label for="email">Correu*</label>
            <input type="text" id="email" name="email" ><br><br>
            <?php
               if(!empty($errors["email"])){
                echo $errors["email"] ;
            }
            ?>
            <label for="direccio">Direcció*</label>
            <input type="text" id="direccio" name="direccio" ><br><br>
            
            <?php
               if(!empty($errors["direccio"])){
                echo $errors["direccio"] ;
            }
            ?>

            <label for="telefon">Telèfon*</label>
            <input type="text" id="telefon" name="telefon" ><br><br>
            <?php
                if(!empty($errors["telefon"])){
                    echo $errors["telefon"];
                }
            ?>
            <br>
            <input type="submit"  name="submit" ><br><br>
    </form>
</body>
</html>