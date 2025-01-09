<?php
session_start();
session_unset();  // Supprimer toutes les variables de session
session_destroy(); // Détruire la session

// Rediriger vers la page d'accueil' après la déconnexion
header('Location: index.php?page=home');
exit;
?>
