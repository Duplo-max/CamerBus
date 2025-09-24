<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barre de Navigation Ajustée</title>
    <style>
        /* Barre de navigation */
        nav {
            width: 100%;
            position: absolute;
            top: 0; /* Positionné en haut */
            background-color: rgba(0, 0, 0, 0.8); /* Fond semi-transparent */
            display: flex; /* Flexbox pour aligner les éléments */
            align-items: center; /* Alignement vertical des éléments */
            justify-content: flex-start; /* Alignement logo et menus à gauche */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Ombre douce */
            z-index: 1000; /* Toujours visible */
        }

        /* Logo */
        .logo {
            font-size: 20px;
            font-weight: bold;
            color: white;
            margin-right: 20px; /* Distance réduite entre le logo et les menus */
        }

        /* Liens */
        .nav-links ul {
            list-style-type: none; /* Suppression des puces */
            display: flex; /* Alignement horizontal des liens */
            gap: 15px; /* Espacement réduit entre les éléments */
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-links li:hover {
            background-color: #007bff; /* Couleur au survol */
            color: white;
        }

        .nav-links a {
            text-decoration: none; /* Suppression du soulignement */
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #84fab0; /* Accent vert au survol */
        }
    </style>
</head>
<body>
    <!-- Barre de Navigation avec espacement optimisé -->
    <nav>
        <div class="logo">Logo</div>
        <div class="nav-links">
            <ul>
                <li><a href="./accueil.php">Accueil</a></li>
                <li><a href="../Presentation&destination/agences.html">Présentation&service</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="../contact/contact.html">Contact</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
