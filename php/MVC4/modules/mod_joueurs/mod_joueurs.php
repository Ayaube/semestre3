<?php
require_once 'cont_joueurs.php';


class ModJoueurs {
    public function __construct() {
        // Créez une instance du contrôleur
        $cont_joueurs = new ContJoueurs();

        // Exécutez l'action en appelant la méthode du contrôleur
        $cont_joueurs->exec();
    }
 
}

?>

