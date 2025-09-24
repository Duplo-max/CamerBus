<?php
session_start();
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bibliotheque";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Définir le code unique
$code_unique = "123"; // Remplacez par votre code unique
$message = ""; // Initialisation du message d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code_soumis = $_POST['motPasse'];

    // Vérification du code
    if ($code_soumis === $code_unique) {
        // Redirection vers la page de bienvenue
        header("Location: accueilAdmin.php");
        exit();
    } else {
        // Définir le message d'erreur
        $message = "Erreur : Mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="connexion.css">
    <script>
        window.onload = function() {
            var message = "<?php echo $message; ?>";
            if (message) {
                document.getElementById("error-message").innerText = message;
                document.getElementById("error-message").style.color = "red";
            }
        };
    </script>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <img src="logo.jpg" alt="Logo" class="logo">
            <h2>Connexion</h2>
            <form method="POST" id="loginForm" novalidate>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="login" name="nom" placeholder="Nom" value="">
                    <span id="loginHelp" class="error-message" aria-live="assertive"></span>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="motPasse" placeholder="Mot de passe" value="">
                    <span id="passwordHelp" class="error-message" aria-live="assertive"></span>
                </div>
                <a href="#" class="forgot-password">Mot de passe oublié ?</a>
                <i id="error-message"></i> <!-- Zone pour afficher le message d'erreur -->
                <a href="#" class="create-account">Créer un compte</a>
                <button type="submit" name="valider" class="btn">Valider</button>
            </form>
        </div>
    </div>
</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    
    background-image:url('../images/connect.jpg');
    background-size: cover;
    background-repeat: no-repeat;
}
.login-box {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px; /* Fixe la largeur du login-box */
    margin-left: 500px;
    margin-top:300px;
}
</style>