<?php
include_once 'modele_joueurs.php';
include_once 'vue_joueurs.php';

class ContJoueurs {
    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleJoueurs();
        $this->vue = new VueJoueurs();
    }

    public function bienvenue() {
        echo "Bienvenue sur la gestion des joueurs!";
        echo '<br><br>';
        echo '<a href="index.php?module=joueurs&action=liste"><button>Afficher les joueurs</button></a>';
        echo '<br><br>';
        echo '<a href="index.php?module=joueurs&action=form_ajout"><button>Ajouter un joueur</button></a>';

    }
    

    public function afficherJoueurs() {
        $joueurs = $this->modele->getListe();
        $this->vue->affiche_liste($joueurs);
    }

    public function afficherDetails() {
        if (isset($_GET['id'])) {
            $joueur = $this->modele->getDetails($_GET['id']);
            $this->vue->affiche_details($joueur);
        } else {
            echo "ID du joueur non spécifié.";
        }
    }

    public function form_ajout() {
        $this->vue->form_ajout();
    }

    public function ajout() {
        $name = $_POST['name'];
        
        $this->modele->addJoueur($name);
        echo "Joueur Ajouté !";
    }
}
?>
