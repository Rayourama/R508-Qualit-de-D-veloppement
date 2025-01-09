<?php
// Point d'entrée du site web

// Vérifier si une page spécifique est demandée via une query string (par exemple ?page=culture)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Charger le contrôleur approprié en fonction de la page demandée
switch ($page) {
    case 'home':
        require_once '../app/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case 'culture':
        require_once '../app/controllers/CultureController.php';
        $controller = new CultureController();
        $controller->index();
        break;
    case 'gastronomie':
        require_once '../app/controllers/GastronomieController.php';
        $controller = new GastronomieController();
        $controller->index();
        break;
    case 'loisirs':
        require_once '../app/controllers/LoisirsController.php';
        $controller = new LoisirsController();
        $controller->index();
        break;
    case 'musique':
        require_once '../app/controllers/MusiqueController.php';
        $controller = new MusiqueController();
        $controller->index();
        break;
    case 'visa':
        require_once '../app/controllers/VisaController.php';
        $controller = new VisaController();
        $controller->index();
        break;
    case 'contact':
        require_once '../app/controllers/ContactController.php';
        $controller = new ContactController();
        $controller->index();
        break;
    case 'confirmation':
        require_once '../app/controllers/ConfirmationController.php';
        $controller = new ConfirmationController();
        $controller->index();
        break;
    case 'inscription':
        require_once '../app/controllers/InscriptionController.php';
        $controller = new InscriptionController();
        $controller->index();
        break;
    case 'login':
        require_once '../app/controllers/LoginController.php';
        $controller = new LoginController();
        $controller->index();
        break;
    case 'profil':
        require_once '../app/controllers/ProfilController.php';
        $controller = new ProfilController();
        $controller->index();
        break;
        case 'loterie':
            require_once '../app/controllers/LoterieController.php';
            $controller = new LoterieController();
            $controller->index();
            break;
        
    default:
        // Si la page n'existe pas, retourner à la page d'accueil
        require_once '../app/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
}
?>
