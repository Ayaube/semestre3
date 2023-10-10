<?php
require_once 'modele_joueurs.php';
require_once 'vue_joueurs.php';

class ContJoueurs {
    public $vue_joueurs;
    public $modele_joueurs;
    private $action;

    public function __construct() {
        $this->vue_joueurs = new VueJoueurs();
        $this->modele_joueurs = new ModeleJoueurs();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';
    }

    public function liste(){
        $tab = $this->modele_joueurs->getListe();
        $this-> vue_joueurs->affiche_liste($tab);
    }

    public function bienvenue() {
        $this->vue_joueurs->menu($this->action); // Affiche le menu pour l'action 
        echo "<h1>Bienvenue sur notre site !</h1>";
    }

    public function details() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id !== null) {
            $detailsJoueur = $this->modele_joueurs->getDetailsById($id);
            $this->vue_joueurs->affiche_details($detailsJoueur);
        } else {
            // Gérer le cas où l'ID n'est pas spécifié
            echo "ID du joueur non spécifié.";
        }
    }

    public function ajout() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $bio = isset($_POST['bio']) ? $_POST['bio'] : '';

        if (!empty($nom) && !empty($bio)) {
            if ($this->modele_joueurs->ajouterJoueur($nom, $bio)) {
                echo "Joueur ajouté avec succès !";
            } else {
                echo "Erreur lors de l'ajout du joueur.";
            }
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    } else {
        echo "Méthode de requête incorrecte. Utilisez POST pour soumettre le formulaire.";
    }
}



    public function form_ajout() {
          $this->vue_joueurs->form_ajout();
    }


   public function exec() {
    switch ($this->action) {
        case 'bienvenue':
            $this->bienvenue();
            break;
        case 'liste':
            $this->liste();
            break;
        case 'details':
            $this->details();
            break;
        case 'ajout' :
            $this->ajout();
        default:
            $this->bienvenue();
            break;
    }
    }
}
?>
