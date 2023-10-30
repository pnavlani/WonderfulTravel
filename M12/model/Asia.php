<?php
    function getAsia ()
    {
        require 'database/pdo.php';
    $conn = connexion();

    $sql = "SELECT Ciutat, Preu FROM ciutats WHERE Continent_Id = 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $america = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $ciutat = array();
    $preu = array();
    foreach ($america as $key => $value) {
        array_push($ciutat, $value['Ciutat']);
        array_push($preu, $value['Preu']);
    }
    $html = "";
    for ($i = 0; $i < count($ciutat); $i++) {
        $html .= "<div class='ciutat'>";
        $html .= "<img src='../photos/" . $ciutat[$i] . ".jpg' alt='" . $ciutat[$i] . "' width='200' height='200'>";
        $html .= "<p>" . $ciutat[$i] . "</p>";
        $html .= "<p>" . $preu[$i] . "€</p>";
        $html .= "</div>";
    }
    return $html;
        
    }
 ?>