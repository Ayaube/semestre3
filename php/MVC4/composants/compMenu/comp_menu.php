<?php
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
