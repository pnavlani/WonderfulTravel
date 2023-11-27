<?php 

session_start(); 

session_destroy(); 

echo "<script type='text/javascript'>alert('Sessió tancada');</script>";
header('refresh:0;url=../index.php');

