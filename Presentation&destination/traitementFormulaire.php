<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclusion des fichiers PHPMailer
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/Exception.php';
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/PHPMailer.php';
require 'C:/wamp/www/projet php de biellet/accueil/connexionDeChaqueAgences/PHPMailer-master/src/SMTP.php';

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=Bibliotheque', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $tel = htmlspecialchars(trim($_POST['tel']));
    $organisation = htmlspecialchars(trim($_POST['organisation']));
    $place = intval($_POST['place']);
    $depart = htmlspecialchars(trim($_POST['depart']));
    $destination = htmlspecialchars(trim($_POST['destination']));
    $services = htmlspecialchars(trim($_POST['services']));

    try {
        // Insertion des données en base
        $stmt = $pdo->prepare("INSERT INTO gest_billets (nom, email, tel, organisation, place) VALUES (:nom, :email, :tel, :organisation, :place)");
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':tel' => $tel,
            ':organisation' => $organisation,
            ':place' => $place,
        ]);

        // Configuration de PHPMailer
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Utiliser le serveur SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'tchassoduplo@gmail.com'; // Adresse e-mail
            $mail->Password = 'tlew aqds kico wune'; // Mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuration des destinataires
            $mail->setFrom('tchassoduplo@gmail.com', 'Yambillet');
            $mail->addAddress($email, $nom);

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation de Réservation - Yambillet';
            $mail->Body = "
                <h1>Votre réservation a été confirmée !</h1>
                <p><strong>Nom :</strong> $nom</p>
                <p><strong>Email :</strong> $email</p>
                <p><strong>Téléphone :</strong> $tel</p>
                <p><strong>Organisation :</strong> $organisation</p>
                <p><strong>Départ :</strong> $depart</p>
                <p><strong>Destination :</strong> $destination</p>
                <p><strong>Classe :</strong> $services</p>
                <p><strong>Place :</strong> $place</p>
            ";

            // Envoi de l'e-mail
            if ($mail->send()) {
                echo "Réservation enregistrée et e-mail envoyé avec succès.";
            } else {
                echo "Réservation enregistrée, mais échec de l'envoi de l'e-mail.";
            }
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            echo "Erreur : La place $place est déjà réservée pour l'agence $organisation.";
        } else {
            die("Erreur SQL : " . $e->getMessage());
        }
    }
} else {
    echo "Aucune donnée reçue. Veuillez soumettre le formulaire.";
}
?>
