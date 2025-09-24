
<!DOCTYPE html>
<html lang="fr">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

h2 {
    color: #555;
}

.profile-photo {
    width: 150px;
    height: auto;
    border-radius: 75px;
    display: block;
    margin: 20px auto;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    background: #e2e2e2;
    margin: 10px 0;
    padding: 10px;
    border-radius: 5px;
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation de YamBillet</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include './header.php'; ?>
    <div class="container">
        <h1>Bienvenue sur YamBillet</h1>
        <img src="../images/photo.jpg" alt="photo:duplo" class="profile-photo">
        <p>YamBillet est une application innovante qui facilite la réservation de bus en ligne. Grâce à notre interface conviviale, vous pouvez réserver vos billets en quelques clics.</p>
        
        <h2>Les grands points d'une réservation</h2>
        <ul>
            <li><strong>Recherche facile :</strong> Trouvez rapidement les trajets disponibles selon vos préférences.</li>
            <li><strong>Réservation sécurisée :</strong> Effectuez vos paiements en toute sécurité grâce à notre système de paiement intégré.</li>
            <li><strong>Confirmation instantanée :</strong> Recevez une confirmation immédiate de votre réservation par email.</li>
            <li><strong>Gestion des réservations :</strong> réservez facilement depuis votre compte.</li>
            <li><strong>Support client :</strong> Notre équipe est disponible pour vous aider à tout moment.</li>
        </ul>
        
        <p>Nous nous engageons à rendre votre expérience de réservation aussi fluide que possible. Rejoignez-nous dès aujourd'hui et découvrez la simplicité de YamBillet !</p>
    </div>
</body>
</html>
