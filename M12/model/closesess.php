<?php 

session_start(); 

session_destroy(); 

header('Location: ../index.php');

echo "<script type='text/javascript'>alert('Sessió tancada');</script>";