<?php

class HomeController {
    // Méthode pour afficher la page d'accueil
    public function index() {
        // Inclure la vue de la page d'accueil
        require '../app/views/home.php';
    }
}
