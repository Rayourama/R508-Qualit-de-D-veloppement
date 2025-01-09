<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <!-- Inclure la navbar -->
    <?php require 'partials/navbar.php'; ?>
    <div class="contact-form">
    <h2>Contactez le Service Client</h2>
    <form id="contactForm" action="index.php?page=confirmation" method="POST">
        
        <div class="form-group">
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" placeholder="Entrez votre nom complet">
            <small class="error" id="nomError"></small>
        </div>

        <div class="form-group">
            <label for="email">Adresse mail</label>
            <input type="email" id="mail" name="email" placeholder="exemple@domaine.com">
            <small class="error" id="emailError"></small>
        </div>

        <div class="form-group">
            <label for="phone">Numéro de téléphone</label>
            <input type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone">
            <small class="error" id="telError"></small>
        </div>

        <div class="form-group">
            <label for="contact-type">Votre problème</label>
            <select id="contact-type" name="contact_type">
                <option value="">Choisissez une option</option>
                <option value="visa">Demande de visa</option>
                <option value="probleme_externe">Problème externe</option>
                <option value="autre">Autre</option>
            </select>
            <small class="error" id="selectError"></small>
        </div>

        <div class="form-group">
            <label for="message">Décrivez-nous votre problème</label>
            <textarea id="message" name="message" rows="5" placeholder="Écrivez votre message ici..."></textarea>
            <small class="error" id="messageError"></small>
        </div>

        <div class="form-group">
        <button type="button" class="valider" onclick="validateForm()">Valider</button>
        </div>

    </form>
</div>
<script src="JS/contact.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    <?php require 'partials/footer.php'; ?>
</html>