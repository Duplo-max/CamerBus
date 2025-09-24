<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription et Connexion</title>
    <style>
        /* Corps de la page */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #84fab0, #8fd3f4);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            text-align: center;
        }

        .welcome-text {
            margin-bottom: 30px;
            font-size: 24px;
            color: #fff;
            background: rgba(0, 0, 0, 0.4);
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            animation: slideDown 1s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .tab {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .tab button {
            border: none;
            background: transparent;
            font-size: 16px;
            font-weight: bold;
            color: #666;
            cursor: pointer;
            padding: 10px;
            transition: color 0.3s ease, border-bottom 0.3s ease;
        }

        .tab button.active {
            color: #84fab0;
            border-bottom: 2px solid #84fab0;
        }

        button:hover {
            color: #8fd3f4;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus {
            border-color: #84fab0;
            box-shadow: 0px 5px 10px rgba(132, 250, 176, 0.3);
        }

        button.submit {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            background: linear-gradient(45deg, #84fab0, #8fd3f4);
            color: white;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        button.submit:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 15px rgba(132, 250, 176, 0.3);
        }
    </style>
</head>
<body>
    <!-- Texte de bienvenue séparé -->
    <div class="welcome-text">
        Bienvenue sur notre application de réservation <strong>YamBillet</strong>.<br> 
        Réservez facilement vos billets et profitez d'une expérience fluide et conviviale !
    </div>

    <div class="container">
        <h2>Inscription et Connexion</h2>
        <div class="tab">
            <button class="tablink active" onclick="showSection('connexion')">Connexion</button>
            <button class="tablink" onclick="showSection('inscription')">Inscription</button>
        </div>

        <!-- Section de connexion -->
        <div id="connexion" class="form-section active">
            <form method="POST" action="connexion.php">
                <label for="nom_connexion">Nom :</label>
                <input type="text" id="nom_connexion" name="nom_connexion" required>
                <label for="code_connexion">Mot de passe :</label>
                <input type="password" id="code_connexion" name="code_connexion" required>
                <button type="submit" name="connecter" class="submit">Se connecter</button>
            </form>
        </div>

        <!-- Section d'inscription -->
        <div id="inscription" class="form-section">
            <form method="POST" action="inscription.php">
                <label for="nom_inscription">Nom :</label>
                <input type="text" id="nom_inscription" name="nom_inscription" required>
                <label for="code_inscription">Mot de passe :</label>
                <input type="password" id="code_inscription" name="code_inscription" required>
                <button type="submit" name="inscrire" class="submit">S'inscrire</button>
            </form>
        </div>
        <div>
            <a href="../accueil/accueil.php">cliquer ici en tantque <i style="color:red"> visiteur</i></a>
        </div>
    </div>

    <script>
        // Fonction pour basculer entre les sections
        function showSection(sectionId) {
            document.querySelectorAll('.form-section').forEach(section => section.classList.remove('active'));
            document.querySelectorAll('.tab button').forEach(button => button.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
            document.querySelector(`.tab button[onclick="showSection('${sectionId}')"]`).classList.add('active');
        }
    </script>
</body>
</html>
