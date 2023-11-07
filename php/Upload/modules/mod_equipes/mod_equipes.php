<?php
require_once 'cont_equipes.php';


class ModEquipes {
    private $cont_equipes;  

    public function __construct() {
        // Créez une instance du contrôleur
        $this->cont_equipes = new ContEquipes();  // Utilisez la propriété pour stocker l'instance

        // Exécutez l'action en appelant la méthode du contrôleur
        $this->cont_equipes->exec();
    }

    public function getAffichage() {
        return $this->cont_equipes->getAffichage();
    }
}

?>

