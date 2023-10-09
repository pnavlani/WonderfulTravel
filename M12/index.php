<?php 

if (isset($_GET['continente'])) {
    $continente = $_GET['continente'];
} else {
    $continente = ".";
}


include "Vista/index.vista.php"

?>