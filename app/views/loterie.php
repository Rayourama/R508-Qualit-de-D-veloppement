<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: index.php?page=login');
    exit;
}


    // Connexion à la base de données
    $dsn = 'pgsql:host=localhost;dbname=site'; // Remplace 'nom_de_ta_base' par le nom de ta base
    $user = 'postgres';
    $password = 'Rr*29092004';
    try {
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

// Vérifier si le bouton "Choisir un gagnant" a été cliqué
if (isset($_POST['choose_winner'])) {
    // Sélectionner un utilisateur au hasard qui n'a pas 'est_national' à 'true'
    $stmt = $pdo->query("SELECT * FROM personne WHERE mail NOT IN (SELECT mail FROM nationalité WHERE est_national = 'true') ORDER BY RANDOM() LIMIT 1");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Mettre à jour l'attribut 'est_national' de cet utilisateur dans la table 'nationalite'
        $stmtUpdate = $pdo->prepare("UPDATE nationalité SET est_national = 'true' WHERE mail = ?");
        $stmtUpdate->execute([$user['mail']]);

        // Message de confirmation
        $winnerName = $user['prenom'] . ' ' . $user['nom'];
        $message = "Le gagnant est : $winnerName. Félicitations à lui et bienvenue dans la famille.";
    } else {
        // Aucun utilisateur disponible avec 'est_national' = 'false'
        $message = "Il n'y a aucun gagnant.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loterie</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/loterie.css">
</head>
<body> 
    <?php require 'partials/navbar copy.php'; ?>
    
    <div class="container">
        <h2>Bienvenue à la loterie!</h2>

        <!-- Afficher un message de confirmation si un gagnant a été choisi -->
        <?php if (isset($message)): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire pour choisir un gagnant -->
        <form method="POST">
            <button type="submit" name="choose_winner" class="btn btn-primary">Choisir un gagnant</button>
        </form>
    </div>
    </div>
    <?php require 'partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
