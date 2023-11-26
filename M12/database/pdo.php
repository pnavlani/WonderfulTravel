<?php 
function connexion()
{
    $connexio = new PDO('mysql:host=localhost;dbname=wtravell', 'root', '');
	$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $connexio;
}

?>