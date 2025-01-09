<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- Inclure la navbar -->
    <?php require 'partials/navbar.php'; ?>
    
    <h2>Se connecter</h2>

    <div class="container">

        <!-- Afficher l'erreur si elle existe -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form id="registrationForm" action="Script_connexion.php" method="POST">
            <div class="form-group">
                <label for="mail">Mail</label>
                <input type="email" id="mail" name="mail">
                <small class="error" id="emailError"></small>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe">
                <button type="button" onclick="togglePasswordVisibility('mot_de_passe', 'eyeIcon1')">
                    <img class="oeil" src="images/oeil.png" id="eyeIcon1" alt="Afficher/Masquer mot de passe">
                </button>
            </div>
            <p><a href="mdp_oublie.php">Mot de passe oublié ?</a></p>
            <button type="button" onclick="validateForm()" class="valider">Se connecter</button>
        </form>
    </div>
    <script src="JS/connexion.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    <?php require 'partials/footer.php'; ?>
</html>