<?php
require_once 'modele_equipes.php';
require_once 'vue_equipes.php';

class ContEquipes {
    public $vue_equipes;
    public $modele_equipes;
    private $action;

    public function __construct() {
        $this->vue_equipes = new VueEquipes();
        $this->modele_equipes = new ModeleEquipes();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';
    }

    public function liste() {
        $donnees = $this->modele_equipes->getListe();
        $this->vue_equipes->affiche_liste($donnees);
    }

    public function bienvenue() {
        $this->vue_equipes->menu($this->action); // Affiche le menu pour l'action 
        echo "<h1>Bienvenue sur notre site !</h1>";
    }

    public function details() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id !== null) {
            $detailsJoueur = $this->modele_equipes->getDetailsById($id);
            $this->vue_equipes->affiche_details($detailsJoueur);
        } else {
            // Gérer le cas où l'ID n'est pas spécifié
            echo "ID du joueur non spécifié.";
        }
    }

    public function getAffichage() {
        return $this->vue_equipes->getAffichage();
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
            default:
                // Action par défaut si l'action n'est pas reconnue
                $this->bienvenue();
                break;
        }
    }
}
?>