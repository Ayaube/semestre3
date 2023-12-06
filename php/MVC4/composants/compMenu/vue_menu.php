<?php
class VueMenu {
    private $affichage;

    public function __construct() {
        $this->affichage = '<ul>
        <li><a href="index.php?">Bienvenue</a></li>
        <li><a href="index.php?module=joueurs&action=liste">Liste des joueurs</a></li>
        <li><a href="index.php?module=joueurs&action=form_ajout">Ajouter un joueur</a></li>
        <li><a href="index.php?module=equipes&action=liste">Liste des équipes</a></li>
        <li><a href="index.php?module=equipes&action=form_ajout">Ajouter une equipe</a></li>';
        if (isset($_SESSION['utilisateur'])) {
            $this->affichage .= '<li>Vous êtes déjà connecté sous l\'identifiant "' . $_SESSION['utilisateur'] . '"</li>
        <li><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
        } else {
            $this->affichage .= '<li><a href="index.php?module=connexion&action=inscription">Inscription</a></li>
        <li><a href="index.php?module=connexion&action=connexion">Connexion</a></li>';
        }

        $this->affichage .= '</ul>
    <h1 style="text-align:center">Bienvenue sur notre site !</h1>';
    }


    public function getAffichage() {
        return $this->affichage;
    }
}
?>
