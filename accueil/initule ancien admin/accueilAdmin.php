<?php
$host = 'localhost'; // Adresse du serveur
$db = 'bibliotheque'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur
$pass = ''; // Mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!-- récupération des données dans la base de données -->
<?php
$sql = "SELECT id, nom, email, tel, organisation, depart, destination, dateDepart, dateArrivee FROM gest_billets";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Administration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 98%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            flex: 1;
            margin-right: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background-color:#808080;
            margin-top:60px;
        }

        button {
            cursor: pointer;
            padding: 10px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            color: white;
        }

        #confirm {
            background-color: #28a745; /* Vert pour confirmer */
        }

        #reject {
            background-color: #dc3545; /* Rouge pour rejeter */
        }

        #stats {
            background-color: #007BFF; /* Bleu pour statistiques */
        }

        #available {
            background-color: #ffc107; /* Jaune pour places disponibles */
        }
        #decision {
            background-color: #108080; /* Bleu pour statistiques */
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
            }

            .table-container {
                margin-right: 0;
                margin-bottom: 20px;
            }

            table, th, td {
                display: block;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php include "headerAdmin.php"; ?>
    <div class="container">
        <div class="table-container">
            <h1>Administration des Informations Clients</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Organisation</th>
                        <th>Départ</th>
                        <th>Destination</th>
                        <th>Date de Départ</th>
                        <th>Date de Retour</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="clientData">
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($client['nom']); ?></td>
                            <td><?php echo htmlspecialchars($client['email']); ?></td>
                            <td><?php echo htmlspecialchars($client['tel']); ?></td>
                            <td><?php echo htmlspecialchars($client['organisation']); ?></td>
                            <td><?php echo htmlspecialchars($client['depart']); ?></td>
                            <td><?php echo htmlspecialchars($client['destination']); ?></td>
                            <td><?php echo htmlspecialchars($client['dateDepart']); ?></td>
                            <td><?php echo htmlspecialchars($client['dateArrivee']); ?></td>
                            <td>
                                <button id="confirm" onclick="handleAction(<?php echo $client['id']; ?>, 'confirmer')">Confirmer</button>
                                <button id="reject" onclick="handleAction(<?php echo $client['id']; ?>, 'rejeter')">Rejeter</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="button-container">  
    <button id="decision" onclick="showDecision()">Décision</button>
    <button id="stats" onclick="showStats()">Statistiques</button>
    <button id="available" onclick="showAvailable()">Ajout des étineraires</button>
    </div>
        </div>
    </div>

    <script>
     function confirmAction(clientId) {
    if (confirm("Êtes-vous sûr de vouloir confirmer ?")) {
        handleAction(clientId, 'confirm');
        alert("Vous avez confirmé l'action."); // Message de confirmation
    } else {
        alert("Vous avez annulé l'action de confirmation."); // Message d'annulation
    }
}

function rejectAction(clientId) {
    if (confirm("Êtes-vous sûr de vouloir rejeter ?")) {
        handleAction(clientId, 'reject');
        alert("Vous avez confirmé l'action de rejet."); // Message de confirmation
    } else {
        alert("Vous avez annulé l'action de rejet."); // Message d'annulation
    }
}

function handleAction(clientId, action) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "traitement.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText); // Affiche la réponse du serveur
            // Optionnel : Mettre à jour l'interface utilisateur ici
        }
    };
    xhr.send("id=" + clientId + "&action=" + action);
}

        function showStats() {
            // Logique pour afficher les statistiques
            alert("Affichage des statistiques...");
        }

        function showAvailable() {
            // Logique pour afficher le nombre de places disponibles
            alert("Affichage des étineraires...");
        }
    </script>
</body>

</html>