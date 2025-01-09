<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$oldData = $_SESSION['old_data'] ?? [];
session_unset(); // Effacer les erreurs et les données après affichage
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/inscription.css">
</head>
<body>
    <!-- Inclure la navbar -->
    <?php require '../app/views/partials/navbar copy.php'; ?>

    <h2>Inscrivez-vous !</h2>

    <?php if (!empty($errors['mail'])): ?>
        <p style="color: red;" id="emailError"><?= $errors['mail']; ?></p>
    <?php endif; ?>
    
    <form id="registrationForm" action="Script_inscription.php" method="POST">
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" id="mail" name="mail" required>
            <small class="error" id="emailError"></small>
            <?php if (!empty($errors['mail'])): ?>
                <small class="error"><?= htmlspecialchars($errors['mail']); ?></small>
            <?php endif; ?>
        </div>
        <p style="color:red;">Cette adresse mail a déjà été utilisée, essayez de vous connecter</p>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
            <small class="error" id="nomError"></small>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
            <small class="error" id="prenomError"></small>
        </div>
        <div class="form-group">
    <label for="mot_de_passe">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required>
    <button type="button" onclick="togglePasswordVisibility('mot_de_passe', 'eyeIcon1')">
        <img class="oeil" src="images/oeil.png" id="eyeIcon1" alt="Afficher/Masquer mot de passe">
    </button>
    <small class="error" id="passwordError"></small>
</div>
<div class="form-group">
    <label for="confirmer_mot_de_passe">Confirmer le mot de passe</label>
    <input type="password" id="confirmer_mot_de_passe" name="confirmer_mot_de_passe" required>
    <button type="button" onclick="togglePasswordVisibility('confirmer_mot_de_passe', 'eyeIcon2')">
        <img class="oeil" src="images/oeil.png" id="eyeIcon2" alt="Afficher/Masquer mot de passe">
    </button>
    <small class="error" id="confirmPasswordError"></small>
</div>

        <button type="button" class="valider" onclick="validateForm()">Valider</button>
    </form>
    <script src="JS/inscription.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    <?php require '../app/views/partials/footer.php'; ?>
</html>