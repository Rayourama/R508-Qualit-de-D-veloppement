<?php
// Connexion à la base de données
$dsn = 'pgsql:host=localhost;dbname=site'; // Remplace 'nom_de_ta_base' par le nom de ta base
$user = 'postgres';
$password = 'Rr*29092004';

try {
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des données du formulaire
$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
$mot_de_passe = $_POST['mot_de_passe'];
$confirmer_mot_de_passe = $_POST['confirmer_mot_de_passe'];

// Validation côté serveur
$errors = [];

// Vérification si l'email existe déjà dans la base de données
$stmt = $pdo->prepare("SELECT mail FROM personne WHERE mail = :mail");
$stmt->execute([':mail' => $mail]);
if ($stmt->fetch()) {
    $errors['mail'] = "Cette adresse e-mail est déjà utilisée.";
}


// Affichage des erreurs ou insertion dans la base de données
if (!empty($errors)) {
    foreach ($errors as $field => $error) {
        /*echo "<p style='color: red;'>Erreur $field : $error</p>";*/
        header("Location: mail_utilisé.php");
    }
} else {
    // Hachage du mot de passe pour plus de sécurité
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);

    // Insertion dans la base de données
    $sql = "INSERT INTO personne (mail, nom, prenom, mot_de_passe) VALUES (:mail, :nom, :prenom, :mot_de_passe)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':mail' => $mail,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':mot_de_passe' => $mot_de_passe_hash
    ]);
    $sql2 = "INSERT INTO nationalité (mail, est_national) VALUES (:mail, false)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute([":mail"=> $mail]);
    $sql3 = "INSERT INTO admin (mail) VALUES (:mail)";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->execute([":mail"=> $mail]);

    // Redirection vers la page de confirmation
header("Location: confirmInscription.php");
exit(); // Terminer le script pour s'assurer que la redirection fonctionne
}
?>
