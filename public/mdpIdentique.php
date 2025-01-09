<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reinitialisation.css">
</head>
<body>

    <!-- Inclure la navbar -->
    <?php require '../app/views/partials/navbar.php'; ?>

    <h2>Réinitialiser votre mot de passe</h2>

    <div class="container">
        <!-- Afficher l'erreur ou succès si elle existe -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire de réinitialisation du mot de passe -->
        <form action="Script_reinitialisation.php" id="resetPasswordForm" method="POST">
            <div class="form-group">
            <label for="mail">Mail</label>
            <input class="mail" id="mail" name="mail">
            <small class="error" id="emailError"></small>
            </div>
            <div class="form-group">
                <label for="nouveau_mot_de_passe">Nouveau mot de passe</label>
                <input type="password" id="nouveau_mot_de_passe" name="nouveau_mot_de_passe">
                <span id="passwordError" class="error"></span>
            </div>
            <p style="color:red;">Le mot de passe doit être différent du précédent</p>
            <div class="form-group">
                <label for="confirmation_mot_de_passe">Confirmer le mot de passe</label>
                <input type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe">
                <span id="confirmPasswordError" class="error"></span>
            </div>
            <button type="button" onclick="validateForm()" class="btn btn-primary">Réinitialiser le mot de passe</button>
        </form>
    </div>

    <script src="JS/reinitialisation.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Inclure le footer -->
    <?php require '../app/views/partials/footer.php'; ?>
</body>
</html>
