<?php

if (!defined('MY_APP_STARTED')) {
    die('Accès non autorisé');
}
require_once 'vue_generique.php';
class VueJoueurs extends VueGenerique {


public function affiche_liste($tab) {
    ?>
    <h1>Liste des joueurs</h1>
    <?php
        foreach ($tab as $joueur) {
            echo '<table>';
            echo '<a href="index.php?module=joueurs&action=details&id=' . $joueur['id'] . ' " style="text-decoration:none">' . $joueur['nom'] . '</a> <br>';
        }
        echo'<br>';
    }

public function affiche_details($details) {
        echo '<h2>Détails du joueur</h2>';
        echo '<p>ID : ' . $details['id'] . '</p>';
        echo '<p>Nom : ' . $details['nom'] . '</p>';
        echo '<p>Description : ' . $details['bio'] . '</p>';
    }


public function menu($action) {
    echo '<ul>';
    echo '<li><a href="index.php?">Bienvenue</a></li>';
    echo '<li><a href="index.php?module=joueurs&action=liste">Liste des joueurs</a></li>';
    echo '<li><a href="index.php?module=equipes&action=liste">Liste des équipes</a></li>';
    if (isset($_SESSION['utilisateur'])) {
        echo '<li>Vous êtes déjà connecté sous l\'identifiant "' . $_SESSION['utilisateur'] . '"</li>';
        echo '<li><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
    } else {
        echo '<li><a href="index.php?module=connexion&action=inscription">Inscription</a></li>';
        echo '<li><a href="index.php?module=connexion&action=connexion">Connexion</a></li>';
    }
    echo'</ul>';
    }

public function form_ajout() {
    echo '<li><a href="index.php?">Bienvenue</a></li>';
    echo '<h2>Ajouter un joueur</h2>';
    echo '<form method="post" action="index.php?module=joueurs&action=ajout">';
    echo 'Nom : <input type="text" name="nom"><br>';
    echo 'Bio : <textarea name="bio"></textarea><br>';
    echo '<input type="submit" value="Ajouter">';
    echo '</form>';
}

    public function confirmAjout() {
        echo "Joueur bien ajouté !";
    }

    public function erreurBD() {
        echo "Erreur lors de l'ajout/modification dans la BD";
    }
}

?>