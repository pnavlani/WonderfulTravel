<?php 

//Function which gets from the table ciutats all the Ciutat which Contienent_Id equals  4
function getAfrica()
{
    require 'database/pdo.php';
    $conn = connexion();
    $sql = "SELECT * FROM ciutats WHERE Continent_Id = 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $africa = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $africa;
}

?>