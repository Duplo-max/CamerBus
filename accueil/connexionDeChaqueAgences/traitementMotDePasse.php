<?php
// Importer PHPMailer via Composer (recommandé)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure les fichiers PHPMailer
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/Exception.php';
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/PHPMailer.php';
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        // Validation de l'adresse e-mail
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$email) {
            die("Adresse email non valide.");
        }

        // Récupérer le mot de passe associé à l'adresse e-mail
        $stmt = $db->prepare("SELECT mot_de_passe FROM agences WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $password = $user['mot_de_passe']; // Mot de passe en clair

            // Créer une instance de PHPMailer
            $mail = new PHPMailer(true);

            // Configuration SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'duplotchasso@gmail.com'; // Adresse e-mail d'expéditeur
            $mail->Password = 'yqql cshw cvee ejvl'; // Mot de passe d'application Google
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Informations sur l'email
            $mail->setFrom('votre_email@gmail.com', 'Votre Nom');
            $mail->addAddress($email); // Destinataire
            $mail->Subject = 'Récupération de votre mot de passe';
            $mail->Body = "Bonjour,\n\nVoici votre mot de passe : $password\n\nCordialement.";

            // Envoi de l'e-mail
            $mail->send();
            echo "Un email contenant votre mot de passe a été envoyé.";
        } else {
            echo "Aucun utilisateur trouvé avec cette adresse email.";
        }
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : " . $e->getMessage();
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    echo "Méthode de requête non valide.";
}
?>
