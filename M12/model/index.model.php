<?php 
$errors = "";
$html = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["continent"])) {
    $selectedContinent = $_POST["continent"];
    
    $countires = getCountries($selectedContinent);

    $countires = getCountries($selectedContinent);
    $countiresJSON = json_encode($countires);
    echo $countiresJSON;

}




function getCountries($selectedContinent)
{
    require_once "db.php";
    try {
        $conn = connexion();
        $stmt = $conn->prepare("SELECT * FROM continents WHERE continent = :continent");
        $stmt->bindParam(":continent", $selectedContinent);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}


?>