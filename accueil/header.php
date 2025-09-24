
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
    <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="logo">
            <img src="..\images\WhatsApp Image 2025-03-23 à 16.42.50_260b81a2.jpg" alt="Logo">
        </div>
        <form id="searchForm" class="search-bar" onsubmit="return false;">
            <input type="text" id="searchInput" placeholder="Rechercher...">
            <button type="button" onclick="search()">Recherche</button>
        </form>
        <div id="searchResults" class="search-results"></div>
        <nav>
    <ul id="navList">
        <li><a href="./../accueil/accueil.php">Accueil</a></li>
        <li><a href="../Presentation&destination/agences.html">Presentation&destination</a></li>
        <li><a href="./../connexionClient/inscriptionClient.php">Quitter</a></li>
        <li><a href="./../accueil/conn.php">Contact</a></li>
    </ul>
    
</nav>

    </header>
    

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
</html>