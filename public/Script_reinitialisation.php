<?php
// Démarrer la session
session_start();

// Connexion à la base de données
$dsn = 'pgsql:host=localhost;dbname=site'; // Remplace 'nom_de_ta_base' par le nom de ta base
$user = 'postgres';
$password = 'Rr*29092004';

try {
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_POST['mail'], $_POST['nouveau_mot_de_passe'], $_POST['confirmation_mot_de_passe'])) {
    $mail = trim($_POST['mail']);
    $nouveauMotDePasse = $_POST['nouveau_mot_de_passe'];
    $confirmationMotDePasse = $_POST['confirmation_mot_de_passe'];

    // Vérifier si l'email existe dans la base
    $stmt = $pdo->prepare("SELECT * FROM personne WHERE mail = ?");
    $stmt->execute([$mail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: mail_inexistant reini" . urlencode($mail));
        exit();
    }

    // Vérifier que le nouveau mot de passe est différent de l'ancien
    if (password_verify($nouveauMotDePasse, $user['mot_de_passe'])) {
        header("Location: mdpIdentique.php");
        exit();
    }

    // Hachage du mot de passe
    $hashedPassword = password_hash($nouveauMotDePasse, PASSWORD_BCRYPT);

    // Mise à jour du mot de passe
    $updateStmt = $pdo->prepare("UPDATE personne SET mot_de_passe = ? WHERE mail = ?");
    $updateStmt->execute([$hashedPassword, $mail]);

    header("Location: ConfirmReini.php");
    exit();
}
