<?php
session_start(); // Initialiser la session

// Vérifier si l'utilisateur est connecté
$isUserConnected = isset($_SESSION['user']);

$hasNationality = false; // Par défaut, l'utilisateur n'a pas la nationalité

if ($isUserConnected) {
    // Connexion à la base de données (ajustez les paramètres en fonction de votre configuration)
        // Connexion à la base de données
        $dsn = 'pgsql:host=localhost;dbname=site'; // Remplace 'nom_de_ta_base' par le nom de ta base
        $user = 'postgres';
        $password = 'Rr*29092004';
        try {
            $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }

        // Récupérer l'email de l'utilisateur connecté (supposé stocké dans $_SESSION['user'])
        $userEmail = $_SESSION['user'];

        // Requête pour vérifier si est_national est true pour cet utilisateur
        $stmt = $pdo->prepare("SELECT est_national FROM nationalité WHERE mail = :mail");
        $stmt->bindParam(':mail', $userEmail, PDO::PARAM_STR);
        $stmt->execute();

        // Récupérer le résultat
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && $result['est_national'] == true) {
            $hasNationality = true; // L'utilisateur a déjà la nationalité
        }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/visa.css">
</head>
<body>
    <!-- Inclure la navbar -->
    <?php require 'partials/navbar copy.php'; ?>

    <!-- Contenu principal -->
    <div class="message">
        <?php if (!$isUserConnected): ?>
            <!-- Message pour l'utilisateur non connecté -->
            <div class="confirmation-container">
                <h2>Vous devez vous connecter pour accéder à cette page.</h2>
                <a href="index.php?page=login" class="download-btn">Se connecter</a> <!-- Lien vers la page de connexion -->
            </div>
        </div>
        <?php elseif ($hasNationality): ?>
            <!-- Message pour l'utilisateur ayant déjà la nationalité -->
            <div class="confirmation-container">
                <h2>Mais qu'est ce que vous faîtes là ? Vous êtes déjà guadeloupéen !.</h2>
                <a href="index.php?page=home" class="download-btn">Revenir à l'accueil</a>
            </div>
        <?php else: ?>
            <!-- Message pour l'utilisateur connecté -->
            <div class="confirmation-container">
            <h2>Bienvenue ! Vous pouvez démarrer votre demande de visa.</h2>
                <a href="VisaFormulaire.php" class="download-btn">Démarrer ma demande de visa</a> <!-- Bouton pour rediriger vers le formulaire -->
            </div>
        <?php endif; ?>
    </div>

    <!-- Inclure le footer -->
    <?php require 'partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
