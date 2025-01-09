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

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $mail = trim($_POST['mail']);
    $motDePasse = $_POST['mot_de_passe'];

    // Requête SQL pour récupérer l'utilisateur par email
    $sql = "SELECT * FROM personne WHERE mail = :mail";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();

    // Vérifier si l'utilisateur existe
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Vérifier le mot de passe avec password_verify
        if (password_verify($motDePasse, $user['mot_de_passe'])) {
            // Connexion réussie, enregistrer l'utilisateur dans la session
            $_SESSION['user'] = $user['mail']; // Stocker l'email de l'utilisateur dans la session
            $_SESSION['nom'] = $user['nom'];// Stocker le nom de l'utilisateur dans la session
            $_SESSION['prenom'] = $user['prenom'];// Stocker le prénom de l'utilisateur dans la session
            // Rediriger vers la page d'accueil
            header('Location: index.php?page=home');
            exit;
        } else {
            // Mot de passe incorrect, rediriger avec un message d'erreur
            header('Location: mdp_incorrect.php');
            exit;
        }
    } else {
        // Utilisateur non trouvé, rediriger avec un message d'erreur
        header('Location: mail_inexistant.php');
        exit;
    }
}
?>
