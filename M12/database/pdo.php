<?php 
function connexion()
{
   /* require 'contants.php';
    return new PDO("mysql:host=$HOST;dbname=$DB", "$USER", $PASS); */
    $connexio = new PDO('mysql:host=localhost;dbname=wtravell', 'root', '');
	$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $connexio;
}

?>