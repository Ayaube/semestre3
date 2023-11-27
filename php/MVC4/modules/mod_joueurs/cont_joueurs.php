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



    private function form_ajout () {
        $this->vue_joueurs->form_ajout();
    }

    private function ajout () {
        $nom_joueur = isset ($_POST["nom"]) ? $_POST["nom"] : die("Paramètre manquant");
        $bio_joueur = isset ($_POST["bio"]) ? $_POST["bio"] : die("Paramètre manquant");
        if ($this->modele_joueurs->ajouterJoueur($nom_joueur, $bio_joueur)) {
            $this->vue_joueurs->confirmAjout();
        }
        else {
            $this->vue_joueurs->erreurBD();
        }
    }

   public function exec() {
    switch ($this->action) {
        case 'liste':
            $this->liste();
            break;
        case 'details':
            $this->details();
            break;
        case 'form_ajout' :
            $this->form_ajout();
        case 'ajout' :
            $this->ajout();
        default:
            $this->bienvenue();
            break;
    }
    }
}
?>
