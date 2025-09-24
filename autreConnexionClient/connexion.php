<?php
$connexion = new mysqli("localhost", "root", "", "bibliotheque");

if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom_connexion'];
    $code = $_POST['code_connexion'];

    // Requête préparée pour récupérer les informations utilisateur
    $stmt = $connexion->prepare("SELECT code FROM connexion WHERE nom = ?");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $stmt->bind_result($hashedCode);
    $stmt->fetch();

    // Vérification du mot de passe
    if ($hashedCode && password_verify($code, $hashedCode)) {
        echo "<p>Connexion réussie ! Redirection en cours...</p>";
        // Redirection vers une autre page
        header("Location: ../Presentation&destination/index.php");
        exit();
    } else {
        echo "<p>Erreur d'authentification : Nom ou mot de passe incorrect.</p>";
    }

    $stmt->close();
}
$connexion->close();
?>
