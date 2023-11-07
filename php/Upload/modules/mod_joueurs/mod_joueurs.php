<?php
require_once 'cont_joueurs.php';

class ModJoueurs {
    private $cont_joueurs;

    public function __construct() {
        // Créez une instance du contrôleur
       $this->cont_joueurs = new ContJoueurs();  // Modifiez cette ligne

        // Exécutez l'action en appelant la méthode du contrôleur
        $this->cont_joueurs->exec();
    }

    public function getAffichage() {
        return $this->cont_joueurs->getAffichage();
    }
 
}

?>

