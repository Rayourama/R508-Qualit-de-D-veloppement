<?php
session_start();
require('fpdf186/tFPDF/tfpdf.php'); // Inclure la bibliothèque FPDF pour générer le PDF

// Récupération des données du formulaire
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$telephone = htmlspecialchars($_POST['telephone']);
$email = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
$date_naissance = $_POST['date_naissance'];
$lieu_naissance = htmlspecialchars($_POST['lieu_naissance']);
$nationalite = htmlspecialchars($_POST['nationalite']);
$date_expiration_passeport = $_POST['date_expiration_passeport'];
$date_demande = date('d/m/Y');

$pdf = new tFPDF();
$pdf->AddPage();

// Charger les styles DejaVu pour Normal et Gras
$pdf->AddFont('DejaVu', '', 'DejaVuSans.ttf', true);
$pdf->AddFont('DejaVu', 'B', 'DejaVuSans-Bold.ttf', true);
// Ajouter des imaegs
// Chemin des images
$imagePath = 'images/guadeloupe-1.png';
$accepte = 'images/accepté.png';
$refuse = 'images/refusé.png';

// Conditions pour accepter ou refuser la demande
$statut = "Refusée";
$raison_refus = "";

// Calcul de l'âge
$birthDate = new DateTime($date_naissance);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

// Vérification des conditions
$expDate = new DateTime($date_expiration_passeport);
$validityThreshold = (new DateTime())->modify('+3 months');

if ($age < 18) {
    $raison_refus = "Demandeur mineur.";
} elseif ($expDate < $validityThreshold) {
    $raison_refus = "Passeport non valide.";
} elseif (in_array($nationalite, ["Espagne", "Italie", "Russie", "Israël"])) {
    $raison_refus = "Nationalité non éligible à la demande de visa.";
} else {
    $statut = "Acceptée";
}

// Centrer le titre et le mettre en gras
$pdf->SetFont('DejaVu', 'B', 16); // Texte en gras et taille de police 16
$pdf->Cell(0, 10, 'Votre demande de visa', 0, 1, 'C');
$pdf->Ln(10); // Saut de ligne

// Informations personnelles
$pdf->SetFont('DejaVu', '', 12); // Revenir à une police normale
$pdf->Cell(0, 10, "Nom : $nom", 0, 1);
$pdf->Cell(0, 10, "Prénom : $prenom", 0, 1);
$pdf->Cell(0, 10, "Numéro de téléphone : $telephone", 0, 1);
$pdf->Cell(0, 10, "Adresse email : $email", 0, 1);
$pdf->Cell(0, 10, "Date de naissance : $date_naissance (Âge : $age ans)", 0, 1);
$pdf->Cell(0, 10, "Lieu de naissance : $lieu_naissance", 0, 1);
$pdf->Cell(0, 10, "Nationalité : $nationalite", 0, 1);
$pdf->Ln(10);

// Informations de passeport
$pdf->Cell(0, 10, "Date d'expiration du passeport : $date_expiration_passeport", 0, 1);
$pdf->Ln(10);

// Statut de la demande
$pdf->SetFont('DejaVu', 'B', 12); // Texte en gras pour "Statut de la demande :"
$pdf->Cell(0, 10, "Statut de la demande :", 0, 1);

// Ajouter une image sous le texte "Statut de la demande"
if ($statut === "Acceptée") {
    // Ajouter l'image pour "Accepté"
    $pdf->Image($accepte, $pdf->GetX(), $pdf->GetY(), 30);
    $pdf->Ln(35);
} else {
    // Ajouter l'image pour "Refusé"
    $pdf->Image($refuse, $pdf->GetX(), $pdf->GetY(), 30);
    $pdf->Ln(35);
}

// Si refusée, afficher la raison du refus
if ($statut === "Refusée") {
    $pdf->SetFont('DejaVu', '', 12);
    $pdf->Cell(0, 10, "Raison du refus : $raison_refus", 0, 1);
}

// Obtenir la largeur et la hauteur de l'image
$imgWidth = 70; // Largeur souhaitée en mm
$imgHeight = 70; // Hauteur souhaitée en mm

// Calculer la position de l'image en bas à droite
$pageWidth = $pdf->GetPageWidth(); // Largeur de la page
$pageHeight = $pdf->GetPageHeight(); // Hauteur de la page

$marginRight = 10; // Marge droite en mm
$marginBottom = 10; // Marge inférieure en mm

$x = $pageWidth - $imgWidth - $marginRight; // Position X
$y = $pageHeight - $imgHeight - $marginBottom; // Position Y

// Ajouter l'image au PDF
$pdf->Image($imagePath, $x, $y, $imgWidth, $imgHeight);

// Sauvegarde et téléchargement du PDF
$pdfFile = 'Demande_Visa_' . $nom . '_' . $prenom . '.pdf';
$pdf->Output('D', $pdfFile);

exit();
?>
