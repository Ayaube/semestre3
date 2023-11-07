<?php
require_once 'vue_generique.php';

class VueEquipes extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }
        
    public function affiche_liste($elements) {
        echo '<ul>';
        foreach ($elements as $element) {
            echo '<li><a href="index.php?module=equipes&action=details&id=' . $element['id'] . '">' . $element['nom'] . '</a></li>';
        }
        echo '</ul>';
    }

    public function affiche_details($details) {
        echo '<h2>Détails de l\'équipe</h2>';
        echo '<p>ID : ' . $details['id'] . '</p>';
        echo '<p>Nom : ' . $details['nom'] . '</p>';
        echo '<p>Année de création : ' . $details['anne_creation'] . '</p>';
        echo '<p>Description : ' . $details['description'] . '</p>';
        echo '<p>Pays : ' . $details['pays'] . '</p>';
        echo '<p>Logo : ' . $details['logo'] . '</p>';
    }

}


?>


 
