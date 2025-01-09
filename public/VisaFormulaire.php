<?php
session_start(); // Initialiser la session

// Vérifier si l'utilisateur est connecté
$isUserConnected = isset($_SESSION['user']); // Remplace 'user' par la clé appropriée pour stocker l'utilisateur connecté
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/visaForm.css">
</head>
<body>
    <!-- Inclure la navbar -->
    <?php require '../app/views/partials/navbar copy.php'; ?>

    <h2>Demande de Visa</h2>
        
    <form id="visaForm" action="traitement_demande.php" method="POST" enctype="multipart/form-data">
            <!-- Nom -->
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
                <small class="error text-danger" id="nomError"></small>
            </div>
            <!-- Prénom -->
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
                <small class="error text-danger" id="prenomError"></small>
            </div>

            <!-- Téléphone -->
            <div class="form-group">
                <label for="telephone">Numéro de téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" pattern="^(\+?\d{1,3}[- ]?)?\d{10}$" title="Veuillez entrer un numéro de téléphone valide">
                <small class="error text-danger" id="telephoneError"></small>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" class="form-control" id="mail" name="mail">
                <small class="error text-danger" id="emailError"></small>
            </div>

            <!-- Date de naissance -->
            <div class="form-group">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" max="">
                <small class="error text-danger" id="dateNaissanceError"></small>
            </div>

            <!-- Lieu de naissance -->
            <div class="form-group">
                <label for="lieu_naissance">Lieu de naissance</label>
                <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance">
                <small class="error text-danger" id="lieuNaissanceError"></small>
            </div>

            <!-- Nationalité -->
            <div class="form-group">
                <label for="nationalite">Nationalité</label>
                <select class="form-control" id="nationalite" name="nationalite">
                    <option value="" disabled selected>Choisissez votre nationalité</option>
                    <!-- La liste des pays sera ajoutée ici via JavaScript -->
                </select>
                <small class="error text-danger" id="nationaliteError"></small>
            </div>

            <!-- Passeport -->
            <div class="form-group">
                <label for="passeport">Importer le passeport (PNG ou PDF)</label>
                <input type="file" class="form-control-file" id="passeport" name="passeport" accept=".png, .pdf">
                <small class="error text-danger" id="passeportError"></small>
            </div>

            <!-- Date d'expiration du passeport -->
            <div class="form-group">
                <label for="date_expiration_passeport">Date d'expiration du passeport</label>
                <input type="date" class="form-control" id="date_expiration_passeport" name="date_expiration_passeport" max="">
                <small class="error text-danger" id="dateExpirationError"></small>
            </div>

            <!-- Bouton de soumission -->
            <button type="button" onclick="validateForm();" class="btn btn-primary">Soumettre la demande</button>
        </form>
    <!-- Inclure le footer -->
    <?php require '../app/views/partials/footer.php'; ?>
    <script>
        // Fonction pour charger les pays depuis le fichier JSON
        async function loadCountries() {
            try {
                // Récupération du fichier JSON avec fetch
                const response = await fetch('JS/countries.json');
                const countries = await response.json();

                // Sélection de l'élément select
                const selectElement = document.getElementById('nationalite');

                // Ajouter chaque pays en tant qu'option dans le select
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country;
                    option.textContent = country;
                    selectElement.appendChild(option);
                });
            } catch (error) {
                console.error('Erreur lors du chargement des pays:', error);
            }
        }

        // Charger les pays au chargement de la page
        document.addEventListener('DOMContentLoaded', loadCountries);

        
    </script>
    <script src="JS/visa.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
