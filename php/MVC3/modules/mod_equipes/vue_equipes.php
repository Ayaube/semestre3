<?php

class VueEquipes {
    public function affiche_liste($tableau) {
        foreach ($tableau as $element) {
            echo "ID: " . $element['id'] . " - ";
            echo "<a href='index.php?module=equipes&action=details&id=" . $element['id'] . "'>" . $element['nom'] . "</a><br>";
        }
    }

    public function affiche_details($equipe) {
        echo "ID: " . $equipe['id'] . "<br>";
        echo "Nom: " . $equipe['nom'] . "<br>";
        echo "Année de création: " . $equipe['annee_creation'] . "<br>";
        echo "Description: " . $equipe['description'] . "<br>";
        echo "Pays: " . $equipe['pays'] . "<br>";
        echo "Logo: " . $equipe['logo'] . "<br>";
    }
}

?>
 
