<?php

include_once 'cont_equipes.php';

class ModEquipes {
    private $controller;

    public function __construct() {
        $this->controller = new ContEquipes();
    }

    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';

        switch ($action) {
            case 'bienvenue':
                $this->controller->bienvenue();
                break;
            default:
                echo "Action ERROR MDR";
                break;
        }
    }
}
?>
