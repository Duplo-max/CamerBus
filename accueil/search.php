<?php
// Définir les paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bibliotheque";

// Créer une nouvelle connexion à la base de données MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si la connexion a échoué
if ($conn->connect_error) {
    // Si la connexion échoue, afficher un message d'erreur et arrêter l'exécution du script
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier si une requête a été envoyée via POST et la récupérer
$query = isset($_POST['query']) ? $_POST['query'] : '';

// Préparer une requête SQL avec un paramètre de recherche
$sql = "SELECT nom, email, commentaire FROM contact WHERE nom LIKE ?";
$stmt = $conn->prepare($sql);

// Ajouter des caractères génériques (%) pour rechercher des correspondances partielles
$searchTerm = "%" . $query . "%";

// Lier le paramètre de recherche à la requête SQL préparée
$stmt->bind_param("s", $searchTerm);

// Exécuter la requête SQL préparée
$stmt->execute();

// Obtenir le résultat de la requête
$result = $stmt->get_result();

// Initialiser une variable de sortie
$output = "";
$output = ""; // (Note : cette ligne semble être un doublon et peut être supprimée)

// Vérifier si des résultats ont été trouvés
if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while ($row = $result->fetch_assoc()) {
        // Afficher les informations de chaque ligne de résultat
        echo "Nom: " . htmlspecialchars($row['nom']) . "\n";
        echo "Email: " . htmlspecialchars($row['email']) . "\n";
        echo "Commentaire: " . htmlspecialchars($row['commentaire']) . "\n";
        echo "----------------------\n";
    }
} else {
    // Si aucun résultat n'est trouvé, afficher un message
    echo "Aucun résultat trouvé.";
}

// Fermer la déclaration préparée
$stmt->close();

// Fermer la connexion à la base de données
$conn->close();
?>
