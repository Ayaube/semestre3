<?php

include_once 'cont_joueurs.php';

class ModJoueurs {
    private $controller;

    public function __construct() {
        $this->controller = new ContJoueurs();
    }

    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';
    
        switch ($action) {
            case 'bienvenue':
                $this->controller->bienvenue();
                break;
            case 'liste':
                $this->controller->afficherJoueurs();
                break;
            case 'details':
                $this->controller->afficherDetails();
                break;
            case 'form_ajout':
                $this->controller->form_ajout();
                break;
            case 'ajout':
                $this->controller->ajout();
                break;
            default:
                echo "Action ERROR MDR";
                break;
        }
    }
    
}
