<?php
require_once 'cont_equipes.php';


class ModEquipes {
    public function __construct() {
        // Créez une instance du contrôleur
        $cont_joueurs = new ContEquipes();

        // Exécutez l'action en appelant la méthode du contrôleur
        $cont_joueurs->exec();
    }
 
}

?>

