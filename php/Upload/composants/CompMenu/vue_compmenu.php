<?php
class VueCompMenu
{
    private $affichage;
    
    public function __construct() {
        $this->affichage = '<nav>';
        $this->affichage .= '<ul>';
        $this->affichage .= '<li><a href="index.php?module=joueurs&action=liste">Liste Joueurs</a></li>';
        $this->affichage .= '<li><a href="index.php?module=joueurs&action=afficher">Ajouter joueurs</a></li>';
        $this->affichage .= '<li><a href="index.php?module=equipes&action=liste">Liste equipes</a></li>';
        $utilisateurConnecte = false;

        if (isset($_SESSION['user_id'])) {
            $utilisateurConnecte = true;
        }
        if ($utilisateurConnecte) {
            $this->affichage .= '<li><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
        } else {
            $this->affichage .= '<li><a href="index.php?module=connexion&action=connexion">Connexion</a></li>';
            $this->affichage .= '<li><a href="index.php?module=connexion&action=afficher">Inscription</a></li>';
        }

        $this->affichage .= '</ul>';
        $this->affichage .= '</nav>';
    }

    public function affiche(){
        echo $this->affichage;
    }
}
?>