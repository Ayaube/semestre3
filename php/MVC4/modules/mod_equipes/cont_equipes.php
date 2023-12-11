<?php

if (!defined('MY_APP_STARTED')) {
    die('Accès non autorisé');
}
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
        $this->vue_equipes->liste($donnees);
    }

    public function bienvenue() {
        echo "<h1>Bienvenue sur notre site !</h1>";
    }

    private function form_ajout () {
        $this->vue_equipes->form_ajout();
    }


    public function details() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id !== null) {
            $detailsJoueur = $this->modele_equipes->getDetailsById($id);
            $this->vue_equipes->details($detailsJoueur);
        } else {
            // Gérer le cas où l'ID n'est pas spécifié
            echo "ID du joueur non spécifié.";
        }
    }
    private function ajout () {

        $nom = isset ($_POST["nom"]) ? $_POST["nom"] : die("Nom manquant");
        $bio = isset ($_POST["bio"]) ? $_POST["bio"] : die("Bio manquant");
        $annee = isset ($_POST["annee"]) ? $_POST["annee"] : die("Année manquant");
        //var_dump($_FILES);

        $nomfichier = $_FILES["logo"]["name"];
        $tmpname = $_FILES["logo"]["tmp_name"];
        
        if(is_uploaded_file($tmpname)){
        $ext = pathinfo($nomfichier, PATHINFO_EXTENSION);
        $test = $this->modele_equipes->ajouterEquipes($nom, $bio,$annee);
        if ($test) {
            $newfilename = "equipe_" . $test . "." . $ext;
            $destination = "modules/mod_equipes/logos/" . $newfilename;
        
            if(move_uploaded_file($tmpname,$destination)){
                $this->modele_equipes->insertLogo($test,$destination);
                $this->vue_equipes->confirmAjout();
            }
            else{
                echo "<br>Erreur lors de l'envoi du fichier <br>";
            }  
        }
        else {
            $this->vue_equipes->erreurBD();
        }
    }
    else {
        echo "<br>Le fichier n'a pas été envoyé <br>";
    } 
}
    public function supprimer(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id != null){
            $suppression = $this->modele_equipes->supprimerEquipe($id);
            if($suppression){
                $this->vue_equipes->confirmSuppression();
            }
        }
    }
    public function modifier() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $nom = isset ($_POST["nom"]) ? $_POST["nom"] : die("Nom manquant");
        $bio = isset ($_POST["bio"]) ? $_POST["bio"] : die("Bio manquant");
        $annee = isset ($_POST["annee"]) ? $_POST["annee"] : die("Année manquant");

        $nomfichier = $_FILES["logo"]["name"];
        $tmpname = $_FILES["logo"]["tmp_name"];

        $ext = pathinfo($nomfichier, PATHINFO_EXTENSION);
        $newfilename = "equipe_" . $id . "." . $ext;
        $destination = "modules/mod_equipes/logos/" . $newfilename;

        if ($id != null) {
            $modif = $this->modele_equipes->modifierEquipe($id,$nom,$bio,$annee);
            if($modif){
                if(move_uploaded_file($tmpname,$destination)){
                    $this->modele_equipes->insertLogo($id,$destination);
                    $this->vue_equipes->confirmModif();
                }
                else{
                    echo "<br>Erreur lors de l'envoi du fichier <br>";
                }  
                header("Refresh:2;URL=index.php?modele=equipes&action=liste");
            }
            else {
                $this->vue_equipes->erreurBD();
            }
        }
        else {
            echo "<br>L'identifiant est vide <br>";
        }

    }
    public function form_modif() {
        $id = $this->modele_equipes->getDetailsById($_GET['id']);
        $this->vue_equipes->form_modif($id);
    }

    public function exec() {
        switch ($this->action) {
            case 'liste':
                $this->liste();
                break;
            case 'form_ajout' :
                $this->form_ajout();
                break;
            case 'ajout' :
                $this->ajout();
                break;    
            case 'details':
                $this->details();
                break;
            case 'modifier' :
                $this->modifier();
                break;
            case 'form_modif':
                $this->form_modif();
                break;      
            case 'supprimer' :
                $this->supprimer();
                break;
            default:
                $this->bienvenue();
                break;
        }
    }
}
?>