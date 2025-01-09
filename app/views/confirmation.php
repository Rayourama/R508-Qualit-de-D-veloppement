<?php
// Récupérer les données du formulaire
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$contact_type = $_POST['contact_type'];
$message = $_POST['message'] ?? '';

// Stocker les données en session pour les utiliser dans le PDF
session_start();
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['contact-type'] = $contact_type;
$_SESSION['message'] = $message;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Demande</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/confirmation.css">
</head>
<body>
    <!-- Inclure la navbar -->
    <?php require 'partials/navbar copy.php'; ?>
    <div class="confirmation-container">
    <h2>Votre demande a bien été envoyée</h2>
    <p>Merci pour votre demande. Vous pouvez télécharger un PDF de vos informations ci-dessous.</p>
    <a href="contact_pdf.php" class="download-btn">Télécharger le PDF</a>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    <?php require 'partials/footer.php'; ?>
</html>