<?php
session_start(); // Démarrer une session pour suivre la connexion

// Connexion à la base de données
$nomServeur = "localhost";
$userName = "root";
$Passe = "";
$nomBD = "bibliotheque";

try {
    $conn = new PDO("mysql:host=$nomServeur;dbname=$nomBD", $userName, $Passe);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    
    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format d\'email invalide.'); window.history.back();</script>";
        exit();
    }

    // Rechercher l'agence avec cet email
    $stmt = $conn->prepare("SELECT * FROM agences WHERE email = ?");
    $stmt->execute([$email]);
    $agence = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($agence) {
        // Vérification du mot de passe
        if ($password === $agence['mot_de_passe']) {
            // Authentification réussie
            $_SESSION['agence_id'] = $agence['id'];
            $_SESSION['nom_agence'] = $agence['nom_agence'];
            
            // Rediriger vers le tableau de bord
            header("Location: dashboard.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "<script>alert('Mot de passe incorrect.'); window.history.back();</script>";
        }
    } else {
        // Email non trouvé
        echo "<script>alert('Identifiants incorrects.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Veuillez remplir tous les champs.'); window.history.back();</script>";
}
?>
