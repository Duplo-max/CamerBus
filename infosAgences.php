<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=Bibliotheque', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des informations de départs
try {
    $stmt = $pdo->query("SELECT organisation, date_depart, heure_depart, lieu_depart, lieu_arrivee FROM agence_depart ORDER BY date_depart, heure_depart");
    $departInfos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations des Départs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Liste des Départs</h1>
        <?php if (count($departInfos) > 0): ?>
            <div class="row">
                <?php foreach ($departInfos as $depart): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?= htmlspecialchars($depart['organisation']) ?></h5>
                                <p><strong>Date de départ :</strong> <?= htmlspecialchars($depart['date_depart']) ?></p>
                                <p><strong>Heure de départ :</strong> <?= htmlspecialchars($depart['heure_depart']) ?></p>
                                <p><strong>Lieu de départ :</strong> <?= htmlspecialchars($depart['lieu_depart']) ?></p>
                                <p><strong>Lieu d'arrivée :</strong> <?= htmlspecialchars($depart['lieu_arrivee']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-warning">Aucune information de départ trouvée.</p>
        <?php endif; ?>
    </div>
    <a href="./presentation&destination/agences.html">retour</a>
</body>
</html>
