

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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Web</title>
    <style>
     /* Style mis à jour avec des couleurs modernes et des effets subtils */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: linear-gradient(45deg, #84fab0, #8fd3f4);
    color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
}

.logo img {
    height: 60px;
}

.search-bar {
    display: flex;
}

.search-bar input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: all 0.3s ease; /* Transition pour l'effet au focus */
}

.search-bar input:focus {
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5); /* Effet lumineux */
}

.search-bar button {
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-bar button:hover {
    background-color: #0056b3; /* Effet hover */
}

nav ul {
    list-style-type: none;
    display: flex;
    gap: 15px;
}

nav ul li {
    padding: 5px 10px;
    border-radius: 8px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

nav ul li:hover {
    background-color: #007bff; /* Couleur de hover pour les items */
    color: white; /* Couleur de texte lors du hover */
}

nav a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

nav a:hover {
    color: white;
}

.result-item {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
    background-color: #e9ecef;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
    transition: transform 0.3s ease; /* Effet au survol */
}

.result-item:hover {
    transform: scale(1.02); /* Effet d'agrandissement au survol */
}

.search-results {
    position: absolute;
    background-color: rgba(45, 104, 232, 0.9); /* Couleur améliorée */
    z-index: 1000;
    width: 30%;
    max-height: 200px;
    overflow-y: auto;
    color: yellow;
    margin-top: 250px;
    margin-left: 300px;
}

.search-results div {
    padding: 10px;
    border-bottom: 1px solid #eee;
    transition: background-color 0.3s ease;
}

.search-results div:hover {
    background-color: rgba(255, 255, 255, 0.5); /* Effet hover adouci */
}

/* Style pour les petits écrans */
@media (max-width: 768px) {
    header {
        flex-direction: column;
        align-items: flex-start;
    }
    .search-bar {
        width: 100%;
        margin-top: 10px;
    }
    nav ul {
        flex-direction: column;
        width: 100%;
        padding: 0;
    }
    nav ul li {
        width: 100%;
        text-align: center;
    }
}

    </style>
</head>
<body>
    <?php
   include "../accueil/header.php";
   ?>

  
    

    <script>
 function search() {
    // Récupérer la valeur de l'input avec l'ID 'searchInput'
    const query = document.getElementById('searchInput').value;

    // Effectuer une requête fetch vers l'URL spécifiée avec la méthode POST
    fetch('http://localhost/projet%20php%20de%20biellet/accueil/search.php', {
        method: 'POST', // Utiliser la méthode POST
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', // Définir l'en-tête Content-Type
        },
        // Envoyer les données du formulaire encodées en URL
        body: `query=${encodeURIComponent(query)}`,
    })
    // Traiter la réponse de la requête fetch et la convertir en texte
    .then(response => response.text())
    // Une fois la réponse convertie, exécuter cette fonction
    .then(data => {
        // Récupérer l'élément avec l'ID 'searchResults'
        const resultsContainer = document.getElementById('searchResults');
        // Réinitialiser les résultats précédents
        resultsContainer.innerHTML = ''; // Réinitialiser les résultats
        // Séparer les résultats en utilisant la chaîne '------------------------------'
        const results = data.split('--');
        // Parcourir chaque résultat
        results.forEach(result => {
            // Vérifier si le résultat n'est pas vide après avoir supprimé les espaces
            if (result.trim()) {
                // Créer un nouvel élément 'div'
                const resultDiv = document.createElement('div');
                // Définir le texte du nouvel élément 'div'
                resultDiv.textContent = result.trim();
                // Ajouter le nouvel élément 'div' à l'élément 'resultsContainer'
                resultsContainer.appendChild(resultDiv);
            }
        });
    })
    // Gérer les erreurs de la requête fetch
    .catch(error => console.error('Erreur:', error));
}


    </script>
</body>
</html>    <div class="container">
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
