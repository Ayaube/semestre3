<?php
require_once 'vue_generique.php';

class VueJoueurs extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function affiche_liste($elements) {
        echo '<ul>';
        foreach ($elements as $element) {
            echo '<li><a href="index.php?module=joueurs&action=details&id=' . $element['id'] . '">' . $element['nom'] . '</a></li>';
        }
        echo '</ul>';
    }

    public function affiche_details($details) {
        echo '<h2>Détails du joueur</h2>';
        echo '<p>ID : ' . $details['id'] . '</p>';
        echo '<p>Nom : ' . $details['nom'] . '</p>';
        echo '<p>Description : ' . $details['bio'] . '</p>';
    }

    public function form_ajout() {
        echo '<h2>Ajouter un joueur</h2>';
        echo '<form method="post" action="index.php?module=joueurs&action=ajouter">';
        echo 'Nom : <input type="text" name="nom"><br>';
        echo 'Bio : <textarea name="bio"></textarea><br>';
        echo '<input type="submit" value="Ajouter">';
        echo '</form>';
    }
}

?>