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

// Vérifier si l'utilisateur est un administrateur
$isAdmin = $_SESSION['user'] === "rayourama@hotmail.com";

// Fonction pour générer des données utilisateur aléatoires
function generateRandomUser($pdo) {
    $firstNames = ["Alice", "Bob", "Charlie", "David", "Eva","Michael","Johnny","John"];
    $lastNames = ["Dupont", "Martin", "Lemoine", "Lefevre", "Bernard","Flagrant","Fercher","Getoli"];
    $domains = ["example.com", "test.com", "demo.com"];

    $randomFirstName = $firstNames[array_rand($firstNames)];
    $randomLastName = $lastNames[array_rand($lastNames)];
    $randomEmail = strtolower($randomFirstName[0] . $randomLastName . rand(100, 999)) . '@' . $domains[array_rand($domains)];

    // Vérification si l'email existe déjà dans la base de données
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM personne WHERE mail = ?");
    $stmt->execute([$randomEmail]);
    $emailExists = $stmt->fetchColumn();

    // Si l'email existe, essayer de générer un nouvel email unique
    if ($emailExists > 0) {
        return generateRandomUser($pdo); // Appel récursif pour générer un autre email unique
    }


    return [
        'mail' => $randomEmail,
        'prenom' => $randomFirstName,
        'nom' => $randomLastName
    ];

}

// Vérifier si l'utilisateur est un administrateur
$isAdmin = $_SESSION['user'] === "rayourama@hotmail.com";

// Récupérer les informations de l'utilisateur connecté
$userInfo = [];
if (isset($_SESSION['user'])) {
    $stmt = $pdo->prepare("SELECT nom, prenom, mail FROM personne WHERE mail = ?");
    $stmt->execute([$_SESSION['user']]);
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupérer tous les utilisateurs si on est administrateur
$allUsers = [];
if ($isAdmin && isset($_POST['show_users'])) {
    $stmt = $pdo->query("SELECT prenom, nom, mail FROM personne");
    $allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter des utilisateurs aléatoires (si demandé)
if ($isAdmin && isset($_POST['add_user'])) {
    for ($i = 0; $i < 10; $i++) {
        $newUser = generateRandomUser($pdo);
        $stmt = $pdo->prepare("INSERT INTO personne (mail, nom, prenom, mot_de_passe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$newUser['mail'], $newUser['nom'], $newUser['prenom'], "Zqsdoklm*95"]);
        $stmt2 = $pdo->prepare("INSERT INTO nationalité (mail, est_national) VALUES (?, ?)");
        $stmt2->execute([$newUser['mail'], "false"]);
    }
    // Rafraîchir la page
    header('Location: index.php?page=profil');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profil.css">
</head>
<body> 
    <?php require 'partials/navbar copy.php'; ?>
    <div class="container">
        <h2>Bienvenue sur votre profil, <?= htmlspecialchars($_SESSION['prenom']) . ' ' . htmlspecialchars($_SESSION['nom']); ?> !</h2>
        <!-- Affichage des informations du profil -->
        <h3 class="mt-4">Vos informations :</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($userInfo)): ?>
                    <tr>
                        <td><?= htmlspecialchars($userInfo['nom']); ?></td>
                        <td><?= htmlspecialchars($userInfo['prenom']); ?></td>
                        <td><?= htmlspecialchars($userInfo['mail']); ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Aucune information disponible.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- Tu peux ajouter d'autres informations, comme le nom, le prénom, etc. -->
        <?php if (isset($_SESSION['user']) && $isAdmin ): ?>
                 <!-- Si l'utilisateur est un administrateur, afficher un bouton pour ajouter un utilisateur -->
            <form method="POST" action="index.php?page=profil" class="mt-4">
                <button type="submit" name="add_user" class="btn btn-success">Ajouter un utilisateur aléatoire</button>
            </form>
                <?php endif; ?>

                <?php if ($isAdmin): ?>
            <form method="POST" action="index.php?page=profil">
                <button type="submit" name="show_users" class="btn btn-primary mt-3">Afficher tous les utilisateurs</button>
            </form>
        <?php endif; ?>
        
                <?php if ($isAdmin && !empty($allUsers)): ?>
            <h3 class="mt-5">Liste des utilisateurs :</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allUsers as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['prenom']); ?></td>
                            <td><?= htmlspecialchars($user['nom']); ?></td>
                            <td><?= htmlspecialchars($user['mail']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="deconnexion.php" class="btn btn-danger mt-3">Se déconnecter</a>
    </div>
    <?php require 'partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
