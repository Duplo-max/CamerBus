<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez Notre Agence</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            max-width: 800px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input, textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 15px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contactez Notre Agence</h1>
        <form action="https://example.com/contact" method="POST">
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" placeholder="Votre nom complet" required>

            <label for="email">Adresse Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>

            <input type="submit" value="Envoyer">
        </form>
        <div class="footer">
            <p>&copy; 2025 Agence. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
