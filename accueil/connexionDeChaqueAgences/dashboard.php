<?php
// Démarrage de la session pour gérer les données utilisateur
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['nom_agence'])) {
    header("Location: connexion.html");
    exit();
}

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer le nom de l'agence active
$nom_agence = $_SESSION['nom_agence'];

// Compter le nombre d'utilisateurs de l'agence active
$stmt = $pdo->prepare("SELECT COUNT(*) AS nombre_utilisateurs FROM gest_billets WHERE organisation = :agence");
$stmt->bindParam(':agence', $nom_agence, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$nombre_utilisateurs = $result['nombre_utilisateurs'];

// Récupérer les utilisateurs de l'agence active
$stmt = $pdo->prepare("SELECT nom, email, tel, organisation, depart, destination, dateDepart, services, place, statut FROM gest_billets WHERE organisation = :agence");
$stmt->bindParam(':agence', $nom_agence, PDO::PARAM_STR);
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - <?php echo htmlspecialchars($nom_agence); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .bg-custom { background-color: #29d9d5; }
        .text-custom { color: #ffffff; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Barre latérale -->
        <div class="bg-custom text-white p-3 vh-100" style="width: 250px;">
            <h2 class="text-center">Agence : <?php echo htmlspecialchars($nom_agence); ?></h2>
            <p class="text-center">👤 Nombre total d'utilisateurs : <strong><?php echo $nombre_utilisateurs; ?></strong></p>
            <nav class="nav flex-column">
                <a class="nav-link text-white" href="#">🏠 Tableau de Bord</a>
                <a class="nav-link text-white" href="#liste-utilisateurs">👥 Liste des Utilisateurs</a>
                <a class="nav-link text-white" href="#">📋 Règles</a>
                <a class="nav-link text-danger" href="logout.php">🚪 Déconnexion</a>
            </nav>
        </div>
        <!-- Contenu principal -->
        <div class="flex-grow-1 bg-light">
            <header class="bg-custom text-white p-3">
                <h1 class="h3">Tableau de Bord - Réservations : <?php echo htmlspecialchars($nom_agence); ?></h1>
            </header>
            <main class="container mt-4">
                <section id="liste-utilisateurs" class="mt-5">
                    <h2>👥 Liste des Réservations pour l'agence "<?php echo htmlspecialchars($nom_agence); ?>"</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Organisation</th>
                                <th>Départ</th>
                                <th>Destination</th>
                                <th>Date de Départ</th>
                                <th>Services</th>
                                <th>Place</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($clients) > 0): ?>
                                <?php foreach ($clients as $client): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($client['nom']); ?></td>
                                        <td><?php echo htmlspecialchars($client['email']); ?></td>
                                        <td><?php echo htmlspecialchars($client['tel']); ?></td>
                                        <td><?php echo htmlspecialchars($client['organisation']); ?></td>
                                        <td><?php echo htmlspecialchars($client['depart']); ?></td>
                                        <td><?php echo htmlspecialchars($client['destination']); ?></td>
                                        <td><?php echo htmlspecialchars($client['dateDepart']); ?></td>
                                        <td><?php echo htmlspecialchars($client['services']); ?></td>
                                        <td><?php echo htmlspecialchars($client['place']); ?></td>
                                        <td><?php echo htmlspecialchars($client['statut']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" class="text-center">Aucune réservation trouvée pour cette agence.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>
    <footer class="text-center py-3 bg-custom text-white">
        &copy; 2025 Agence "<?php echo htmlspecialchars($nom_agence); ?>" | Tous droits réservés
    </footer>
</body>
</html>
