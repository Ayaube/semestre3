<?php

require_once '../../vue_generique.php';

class VueMenu extends VueGenerique {
    private $affichage;

    public function __construct() {
        parent::__construct();
        $this->affichage = $this->genererMenu();
    }

    private function genererMenu() {
        // Votre code pour générer le menu ici
        // ...
        return $menu;
    }

    public function getAffichage() {
        return $this->affichage;
    }
}

?>