<?php
$nomServeur = "localhost";
$userName = "root";
$Passe = "";
$nomBD = "bibliotheque";

try {
    $conn = new PDO("mysql:host=$nomServeur;dbname=$nomBD", $userName, $Passe);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "La connexion est bien établie";
} catch (PDOException $e) {
    echo "La connexion a échoué :" . $e->getMessage();
}
?>