<?php
// Utilisation de PHPMailer pour gérer l'envoi d'email via SMTP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure les fichiers de PHPMailer (vous devez les avoir téléchargés ou installés avec Composer)
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/Exception.php';
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/PHPMailer.php';
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/SMTP.php';

// Vérification si le formulaire a été soumis (méthode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire envoyées par l'utilisateur
    $nom = htmlspecialchars($_POST['nom']);          // Sécuriser l'entrée utilisateur pour le nom
    $numero = htmlspecialchars($_POST['numero']);    // Sécuriser l'entrée utilisateur pour le numéro
    $depart = htmlspecialchars($_POST['depart']);    // Sécuriser l'entrée utilisateur pour le départ
    $destination = htmlspecialchars($_POST['destination']); // Sécuriser l'entrée utilisateur pour la destination
    $services = htmlspecialchars($_POST['services']); // Sécuriser l'entrée utilisateur pour les services

    // Créer une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // CONFIGURATION DU SERVEUR SMTP
        $mail->isSMTP(); // Spécifie que l'on utilise le protocole SMTP
        $mail->Host = 'smtp.gmail.com'; // Remplacez 'smtp.example.com' par votre serveur SMTP
        $mail->SMTPAuth = true; // Active l'authentification SMTP
        $mail->Username = 'tchassoduplo@gmail.com'; // Remplacez par votre adresse email
        $mail->Password = 'votre_mot_de_passe'; // Remplacez par le mot de passe de votre email
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Type de chiffrement (TLS recommandé)
        $mail->Port = 587; // Port du serveur SMTP (souvent 587 pour TLS)

        // DÉFINIR LES DESTINATAIRES
        $mail->setFrom('votre.email@example.com', 'Votre Nom'); // Expéditeur (vous-même)
        $mail->addAddress('duplotchasso@gmail.com', 'Nom du Destinataire'); // Destinataire (ex : client ou vous-même)

        // CONFIGURATION DU CONTENU
        $mail->isHTML(true); // Préciser que l'email sera au format HTML
        $mail->Subject = 'Informations soumises via le formulaire'; // Sujet de l'email
        $mail->Body = "
            <h1>Informations Reçues</h1>
            <p><strong>Nom:</strong> $nom</p>
            <p><strong>Numéro:</strong> $numero</p>
            <p><strong>Départ:</strong> $depart</p>
            <p><strong>Destination:</strong> $destination</p>
            <p><strong>Services:</strong> $services</p>
        "; // Le contenu HTML de l'email

        // ENVOI DE L'EMAIL
        if ($mail->send()) {
            echo "L'email a été envoyé avec succès.";
        } else {
            echo "Erreur lors de l'envoi de l'email.";
        }
    } catch (Exception $e) {
        // Gestion des erreurs en cas de problème
        echo "Une erreur s'est produite : {$mail->ErrorInfo}";
    }
} else {
    // Message affiché si le formulaire n'a pas été soumis
    echo "Veuillez soumettre le formulaire.";
}
?>
