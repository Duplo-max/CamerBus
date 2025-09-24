<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['agence_id'])) {
    header("Location: connexion.html");
    exit();
}

// Connexion à la base de données
$host = "localhost";
$username = "root"; // Changez par votre nom d'utilisateur
$password = ""; // Changez par votre mot de passe
$dbname = "bibliotheque"; // Remplacez par le nom de votre base
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

// Récupérez la liste des clients ayant réservé
$sql = "SELECT id, nom_client, email, date_reservation FROM agences ORDER BY date_reservation DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Réservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h2 class="text-center">Agence: <?php echo htmlspecialchars($_SESSION['nom_agence']); ?></h2>
            <nav class="nav flex-column">
                <a class="nav-link text-white" href="#">🏠 Tableau de Bord</a>
                <a class="nav-link text-white" href="#">📋 Règles</a>
                <a class="nav-link text-danger" href="logout.php">🚪 Déconnexion</a>
            </nav>
        </div>

        <!-- Contenu Principal -->
        <div class="flex-grow-1 bg-light">
            <header class="bg-primary text-white p-3">
                <h1 class="h3">Tableau de Bord des Réservations</h1>
            </header>

            <main class="container mt-4">
                <!-- Section des Réservations -->
                <h2>Liste des Clients Ayant Réservé</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date de Réservation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nom_client']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['date_reservation']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Aucune réservation trouvée</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 bg-dark text-white">
        &copy; 2025 Agence <?php echo htmlspecialchars($_SESSION['nom_agence']); ?> | Tous droits réservés
    </footer>
</body>
</html>
<?php
$conn->close();
?>
