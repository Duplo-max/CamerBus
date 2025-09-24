<?php
header('Content-Type: application/json');
try {
    $pdo = new PDO('mysql:host=localhost;dbname=Bibliotheque', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dateDepart = htmlspecialchars($_POST['dateDepart']);
    $destination = htmlspecialchars($_POST['destination']);

    $stmt = $pdo->prepare("SELECT place FROM gest_billets WHERE dateDepart = :dateDepart AND destination = :destination");
    $stmt->execute([':dateDepart' => $dateDepart, ':destination' => $destination]);

    $reservedPlaces = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($reservedPlaces);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
