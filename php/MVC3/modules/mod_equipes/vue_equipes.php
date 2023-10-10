<?php
class VueEquipes {
     public function affiche_liste($elements) {
        echo '<li><a href="index.php?">Bienvenue</a></li>';
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
        echo '<p>Année de création : ' . $details['annee_creation'] . '</p>';
        echo '<p>Description : ' . $details['description'] . '</p>';
        //echo '<p>Pays : ' . $details['pays'] . '</p>';
        echo '<p>Logo : ' . $details['logo'] . '</p>';
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
}

?>


 
