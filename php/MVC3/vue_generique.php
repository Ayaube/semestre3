<?php
class VueGenerique {

    public function __construct() {
        ob_start(); // mise en tampon
    }

    public function getAffichage() {
        return ob_get_clean(); // Récupère le contenu du tampon et arrête la mise en tampon
    }
}
?>
