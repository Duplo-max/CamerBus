<?php
$connexion = new mysqli("localhost", "root", "", "bibliotheque");

if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom_inscription'];
    $code = $_POST['code_inscription'];

    // Hachage du mot de passe avant insertion
    $hashedCode = password_hash($code, PASSWORD_BCRYPT);

    // Requête préparée pour insérer les données
    $stmt = $connexion->prepare("INSERT INTO connexion (nom, code) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom, $hashedCode);

    if ($stmt->execute()) {
        echo "<p>Inscription réussie ! Vous pouvez maintenant vous connecter.</p>";
    } else {
        echo "<p>Erreur lors de l'inscription. Veuillez réessayer.</p>";
    }

    $stmt->close();
}
$connexion->close();
?>
