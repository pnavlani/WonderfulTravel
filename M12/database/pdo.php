<?php 
function connexion()
{
    require 'contants.php';
    return new PDO("mysql:host=$HOST;dbname=$DB", "$USER", $PASS);
}

?>