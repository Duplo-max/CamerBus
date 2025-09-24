<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Voyage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<style>
  /* Styles Globaux */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    color: #333;
}

/* Conteneur Principal */
.container {
    margin-top: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px 40px;
    max-width: 500px;
    width: 100%;
}

h2 {
    color: #0b224d;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 22px;
}

p {
    margin-bottom: 20px;
    font-size: 14px;
    color: #666;
}

/* Champs de formulaire */
fieldset {
    border: none;
    margin-bottom: 20px;
}

legend {
    font-size: 16px;
    color: #555;
    font-weight: bold;
    margin-bottom: 10px;
}

label {
    display: block;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.3s ease;
}

input:focus, select:focus {
    border-color: #29d9d5;
    box-shadow: 0 0 4px rgba(41, 217, 213, 0.4);
}

/* Boutons */
button {
    width: 48%;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    transform: scale(1.05);
}

.btn-reset {
    background-color: #ddd;
    color: #333;
}

.btn-reset:hover {
    background-color: #bbb;
    color: #fff;
}

.btn-submit {
    background-color: #29d9d5;
    color: #fff;
}

.btn-submit:hover {
    background-color: #0b224d;
}

/* Messages */
#message {
    margin-top: 15px;
    font-size: 14px;
    color: #333;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px 30px;
    }

    h2 {
        font-size: 18px;
    }

    p {
        font-size: 13px;
    }

    button {
        width: 100%;
        margin-bottom: 10px; /* Espacement entre les boutons en vue mobile */
    }
}

</style>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">
<?php include '../accueil/header.php'; ?>
    <div class="container p-4 bg-white rounded shadow">
        <form id="voyageForm" action="traitementFormulaire.php" method="POST">
            <h2 class="text-center text-primary mb-3">Réservez votre Voyage</h2>
            <p class="text-muted text-center">Veuillez remplir les informations ci-dessous pour compléter votre réservation.</p>

            <!-- Informations personnelles -->
            <fieldset>
                <legend class="text-secondary">Informations Personnelles</legend>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom complet</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrer votre nom complet" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="exemple@domaine.com" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Numéro de téléphone</label>
                    <input type="tel" name="tel" id="tel" class="form-control" placeholder="Numéro de téléphone" required pattern="^\d{9}$" title="Entrez un numéro à 9 chiffres.">
                </div>
                <div class="mb-3">
                    <label for="organisation" class="form-label">Agence</label>
                    <select name="organisation" id="organisation" class="form-select" required>
                        <option value="" selected>Sélectionnez une agence</option>
                        <option value="generale">générale</option>
                        <option value="papa-ngasi">papa-ngasi</option>
                        <option value="tresor">trésor</option>
                        <option value="global">global</option>
                        <option value="ease-travel">ease-travel</option>
                    </select>
                </div>
            </fieldset>

            <!-- Détails du voyage -->
            <fieldset class="mt-4">
                <legend class="text-secondary">Détails du Voyage</legend>
                <div class="mb-3">
                    <label for="depart" class="form-label">Lieu de départ</label>
                    <select name="depart" id="depart" class="form-select" required>
                        <option value="" selected>Sélectionnez un lieu</option>
                        <option value="Yaounde">Yaoundé</option>
                        <option value="Bafoussam">Bafoussam</option>
                        <option value="Ebolowa">Ebolowa</option>
                        <option value="Kribi">Kribi</option>
                        <option value="Maroua">Maroua</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="destination" class="form-label">Destination</label>
                    <select name="destination" id="destination" class="form-select" required>
                        <option value="" selected>Sélectionnez une destination</option>
                        <option value="Douala">Douala</option>
                        <option value="Limbe">Limbe</option>
                        <option value="Buea">Buéa</option>
                        <option value="Garoua">Garoua</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dateDepart" class="form-label">Date de départ</label>
                    <input type="date" name="dateDepart" id="dateDepart" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label">Classe de service</label>
                    <select name="services" id="service" class="form-select" required>
                        <option value="" selected>Sélectionnez une classe</option>
                        <option value="VIP">VIP</option>
                        <option value="Classique">Classique</option>
                    </select>
                </div>
            </fieldset>

            <!-- Choix des places -->
            <fieldset class="mt-4">
                <legend class="text-secondary">Choix de Place</legend>
                <div class="mb-3">
                    <label for="place" class="form-label">Numéro de place</label>
                    <select name="place" id="place" class="form-select" required>
                        <option value="" selected>Sélectionnez une place</option>
                        <?php for ($i = 1; $i <= 20; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </fieldset>

            <!-- Boutons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                <button type="submit" class="btn btn-primary">Réserver</button>
            </div>
        </form>

        <!-- Zone pour les messages -->
        <div id="message" class="mt-3"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
    // Fonction pour réinitialiser le formulaire
    function resetForm() {
        document.getElementById("voyageForm").reset();
        console.log("Formulaire réinitialisé.");
    }

    // Fonction pour valider les données du formulaire
    function validateForm() {
        const nom = document.getElementById('nom').value.trim();
        const email = document.getElementById('email').value.trim();
        const tel = document.getElementById('tel').value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let errors = [];

        // Validation du nom
        if (!nom) {
            errors.push("Le nom est requis.");
        }

        // Validation de l'email
        if (!emailPattern.test(email)) {
            errors.push("L'adresse email est invalide.");
        }

        // Validation du numéro de téléphone
        if (!tel.match(/^\d{9}$/)) {
            errors.push("Le numéro de téléphone doit contenir 9 chiffres.");
        }

        return errors;
    }

    // Fonction pour soumettre le formulaire via Fetch API
    async function submitForm(event) {
        event.preventDefault(); // Empêche le rechargement automatique de la page

        const errors = validateForm(); // Vérifie les erreurs dans le formulaire
        const messageDiv = document.getElementById('message');
        messageDiv.innerHTML = ''; // Réinitialise la zone de message

        // Affichage des erreurs si elles existent
        if (errors.length > 0) {
            errors.forEach(error => {
                messageDiv.innerHTML += `<p style="color: red;">${error}</p>`;
            });
            return; // Ne soumet pas le formulaire si des erreurs existent
        }

        try {
            // Récupération des données du formulaire
            const formData = new FormData(document.getElementById('voyageForm'));

            const response = await fetch('traitementFormulaire.php', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                const result = await response.text();
                messageDiv.innerHTML = `<p style="color: green;">${result}</p>`;
                console.log("Formulaire soumis avec succès :", result);
            } else {
                throw new Error(`Erreur : ${response.statusText}`);
            }
        } catch (error) {
            console.error("Erreur lors de la soumission :", error);
            messageDiv.innerHTML = `<p style="color: red;">Erreur lors de la soumission. Veuillez réessayer.</p>`;
        }
    }

    // Fonction pour mettre à jour les places réservées
    async function updateReservedPlaces() {
        const dateDepart = document.getElementById('dateDepart').value;
        const destination = document.getElementById('destination').value;

        // Vérifie que la date de départ et la destination sont renseignées
        if (dateDepart && destination) {
            try {
                // Requête pour obtenir les places déjà réservées
                const response = await fetch('getReservedPlaces.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `dateDepart=${encodeURIComponent(dateDepart)}&destination=${encodeURIComponent(destination)}`
                });

                if (response.ok) {
                    const reservedPlaces = await response.json();
                    const placeSelect = document.getElementById('place');

                    // Réactiver toutes les options avant de désactiver les réservées
                    Array.from(placeSelect.options).forEach(option => {
                        option.disabled = false; // Active toutes les options
                    });

                    // Désactiver les places déjà réservées
                    reservedPlaces.forEach(place => {
                        const option = document.querySelector(`#place option[value="${place}"]`);
                        if (option) {
                            option.disabled = true; // Désactive la place réservée
                        }
                    });
                } else {
                    console.error("Erreur lors de la récupération des places réservées.");
                }
            } catch (error) {
                console.error("Erreur lors de la requête des places réservées :", error);
            }
        }
    }

    // Ajout des écouteurs d'événements
    document.getElementById('voyageForm').addEventListener('submit', submitForm);
    document.getElementById('dateDepart').addEventListener('change', updateReservedPlaces);
    document.getElementById('destination').addEventListener('change', updateReservedPlaces);
});
</script>

</body>

</html>
