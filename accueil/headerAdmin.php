
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Web</title>
    <style>
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .logo img {
            height: 50px;
        }

        .search-bar {
            display: flex;
        }

        .search-bar input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-bar button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            gap: 15px;
        }

        nav ul li:hover {
            list-style-type: none;
            display: flex;
            gap: 15px;
            background-color: #0056b3;
            border-radius: 12px;
        }

        nav a {
            text-decoration: none;
            color: #007bff;
        }

        nav a:hover {
            text-decoration: none;
            color: white;
        }

        
        .result-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
        }

        .result-item h3 {
            margin: 0 0 10px 0;
            color: #007bff;
        }

        .result-item p {
            margin: 0;
        }
        .result-item {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
    background-color: #f8f9fa;
}
.search-results {
    position: absolute;
    background-color: rgb(45, 104, 232,1);
    border: 1px solid #ccc;
    z-index: 1000;
    width: 30%;
    max-height: 200px;
    overflow-y: auto;
    color:yellow;
    /* margin-top:200px;
    margin-left:50px; */
}

.search-results div {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.search-results div:hover {
    background-color:rgba(255, 255, 255,0.5);
}


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
    <header>
        <div class="logo">
            <img src="../images/logo.jpg" alt="Logo">
        </div>
        <form id="searchForm" class="search-bar" onsubmit="return false;">
            <input type="text" id="searchInput" placeholder="Rechercher...">
            <button type="button" onclick="search()">Recherche</button>
        </form>
        <nav>
    <ul id="navList">
        <li><a href="#accueil">Accueil</a></li>
        <li><a href="../Presentation&destination/agences.html">Presentation&destination</a></li>
        <li><a href="box.html">Quitter</a></li>
        <li><a href="../falone contact/contact.html">Contact</a></li>
        <li><a href="change_password " name="valider">Changer</a></li>
    </ul>
    <div id="searchResults" class="search-results"></div>
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