<?php
    require_once 'composants/CompMenu/vue_compmenu.php';
class CompMenu
{
    private $vue;
    
    public function __construct() {
       $this->vue = new VueCompMenu();
    }

    public function affiche(){
        echo $this->vue->affiche();
    }
}
?>

