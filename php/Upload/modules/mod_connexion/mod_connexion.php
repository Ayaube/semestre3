<?php
require_once 'cont_connexion.php';


class ModConnexion {
    private $cont_connexion;  

    public function __construct() {
        // Créez une instance du contrôleur
        $this->cont_connexion = new ContConnexion();  // Utilisez la propriété pour stocker l'instance

        // Exécutez l'action en appelant la méthode du contrôleur
        $this->cont_connexion->exec();
    }

    public function getAffichage() {
        return $this->cont_connexion->getAffichage();
    }
}


?>

