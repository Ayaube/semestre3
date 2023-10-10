<?php
class VueJoueurs {
    public function affiche_liste($tableau) {
        foreach ($tableau as $element) {
            echo "ID: " . $element['id'] . " - ";
            echo "<a href='index.php?module=joueurs&action=details&id=" . $element['id'] . "'>" . $element['nom'] . "</a><br>";
        }
    }

    public function affiche_details($joueur) {
        echo "ID: " . $joueur['id'] . "<br>";
        echo "Nom: " . $joueur['nom'] . "<br>";
    }

    public function form_ajout() {
        echo '<h2>Ajouter un joueur</h2>';
        echo '<form action="index.php?module=joueurs&action=ajout" method="post">';
        echo 'Nom: <input type="text" name="name"><br><br>';
        echo '<input type="submit" value="Ajouter">';
        echo '</form>';
    }
    
}
?>


