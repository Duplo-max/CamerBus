<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Ergonomique</title>
    <?php
        include "header.php"; /* Inclusion du fichier header */
    ?>
    <style>
        /* Corps de la page */
        body {
            height: 100vh;
            margin: 0;
            overflow: hidden;
            animation: backgroundAnimation 12s infinite;
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        @keyframes backgroundAnimation {
            0% { background-image: url("../images/background1.jpg"); }
            33.33% { background-image: url("../images/background2.jpg"); }
            66.66% { background-image: url("../images/background3.jpg"); }
            100% { background-image: url("../images/background1.jpg"); }
        }

        /* Navbar stylisée */
        nav {
            position: absolute; /* Position précise */
            top: 20px; /* Espace depuis le haut */
            left: 50%; /* Centrage horizontal */
            transform: translateX(-50%); /* Ajustement pour centrer parfaitement */
            background-color: rgba(0, 0, 0, 0.8); /* Fond semi-transparent */
            padding: 10px 20px;
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Ombre douce */
            z-index: 1000; /* Toujours visible */
        }

        nav ul {
            list-style-type: none; /* Suppression des puces */
            display: flex; /* Aligner horizontalement */
            gap: 15px; /* Espacement entre les items */
            margin: 0;
            padding: 0;
        }

        nav ul li {
            padding: 5px 10px;
            border-radius: 8px; /* Coins arrondis */
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li:hover {
            background-color: #007bff; /* Fond bleu au survol */
            color: white; /* Texte en blanc au survol */
        }

        nav a {
            text-decoration: none; /* Pas de soulignement */
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #84fab0; /* Accent vert au survol */
        }

        /* Titre */
        h2 {
            font-size: 3vw;
            margin: 0;
            text-align: center;
            background: rgba(0, 0, 0, 0.6); /* Fond semi-transparent */
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Texte */
        p {
            text-align: center;
            margin: 20px 0;
            background: rgba(0, 0, 0, 0.4);
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            font-size: 1.2vw;
            max-width: 80%;
        }

        span {
            color: #84fab0;
            font-weight: bold;
        }

        /* Pied de page */
        footer p {
            margin: 0;
            padding: 10px;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 5px;
            font-size: 0.9vw;
            text-align: center;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            h2 {
                font-size: 6vw;
            }
            p {
                font-size: 3vw;
            }
            footer p {
                font-size: 2.5vw;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="./accueil.php">Accueil</a></li>
            <li><a href="../Presentation&destination/agences.html">Présentation&service</a></li>
            <li><a href="../contact/contact.php">A propos</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <h2>
        RÉSERVEZ VOTRE BILLET<br>
        <span>ET VOYAGEZ EN TOUTE SÉRÉNITÉ</span>
    </h2>

    <p>
        Notre application de réservation prévoit d'énormes avantages.<br>
        Nous serons toujours à votre service et prêts à répondre à vos préoccupations.
    </p>

    <footer class="footer">
        <p>&copy; Copy Write 2024/2025.</p>
    </footer>
</body>
</html>
