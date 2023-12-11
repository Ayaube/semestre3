<?php

if (!defined('MY_APP_STARTED')) {
    die('Accès non autorisé');
}
require_once 'vue_menu.php';

class CompMenu {
    private $vueMenu;

    public function __construct() {
        $this->vueMenu = new VueMenu();
    }

    public function affiche() {
        echo $this->vueMenu->getAffichage();
    }
}
?>
