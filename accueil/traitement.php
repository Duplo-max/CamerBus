<?php
$host = 'localhost'; 
$db = 'bibliotheque'; 
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'confirmer') {
        // Logique pour confirmer l'enregistrement
        // Par exemple, mettre à jour le statut du client dans la base de données
        $sql = "UPDATE gest_billets SET statut = 'confirmé' WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $client_id]);
        echo "Client confirmé avec succès.";
    } elseif ($action === 'rejeter') {
        // Logique pour rejeter l'enregistrement
        $sql = "UPDATE gest_billets SET statut = 'rejeté' WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $client_id]);
        echo "Client rejeté avec succès.";
    }
}
?>