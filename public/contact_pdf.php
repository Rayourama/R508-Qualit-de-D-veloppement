<?php
session_start();
require('fpdf186/tFPDF/tfpdf.php'); // Inclure la bibliothèque Fpdf_TFPC

// Récupérer les données de la session (exemples pour remplir le PDF)
$name = $_SESSION['name'] ?? 'Nom non fourni';
$email = $_SESSION['email'] ?? 'Email non fourni';
$contact_type = $_SESSION['contact-type'] ?? 'Sujet non fourni';
$message = $_SESSION['message'] ?? 'Message non fourni';

// Initialiser un nouveau PDF
$pdf = new tFPDF();
$pdf->AddPage();

// Charger les styles DejaVu pour Normal et Gras
$pdf->AddFont('DejaVu', '', 'DejaVuSans.ttf', true);
$pdf->AddFont('DejaVu', 'B', 'DejaVuSans-Bold.ttf', true);


// Centrer le titre et le mettre en gras
$pdf->SetFont('DejaVu', 'B', 16); // Texte en gras et taille de police 16
$pdf->Cell(0, 10, 'Confirmation de contact au service client', 0, 1, 'C');
$pdf->Ln(10); // Saut de ligne

$pdf->SetFont('DejaVu', '', 12);
$pdf->Cell(0, 10, "Nom : $name", 0, 1);
$pdf->Cell(0, 10, "Email : $email", 0, 1);
$pdf->Cell(0, 10, "Sujet : $contact_type", 0, 1);
$pdf->Ln(5);
$pdf->MultiCell(0, 10, "Message : $message");
$pdf->Ln(10);

$pdf->MultiCell(0, 10, "Merci pour votre message ! Nous vous répondrons dès que possible.");

// Ajouter une image en bas à droite
// Chemin de l'image
$imagePath = 'images/guadeloupe-1.png'; // Remplacez par le chemin réel de votre image

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

// Générer et télécharger le PDF
$pdf->Output('confirmation.pdf', 'D');
?>
