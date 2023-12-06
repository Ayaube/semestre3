<?php
require_once 'modele_connexion.php';
require_once 'vue_connexion.php';

class ContConnexion {
    public $vue_connexion;
    public $modele_connexion;
    private $action;

    public function __construct() {
        $this->vue_connexion = new VueConnexion();
        $this->modele_connexion = new ModeleConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';
    }
    public function exec() {
        switch ($this->action) {
            case 'connexion':
                $this->connexion();
                break;
            case 'deconnexion':
                $this->deconnexion();
                break;
            case 'inscription':
                $this->inscription();
                break;
            default:
                $this->bienvenue();
                break;
        }
    }
    public function bienvenue() {
        echo '<li><a href="index.php?module=equipes&action=bienvenue">Bienvenue</a></li>';
        $this->vue_connexion->menu(); // Affiche le menu pour l'action 
        echo "<h1>Bienvenue sur notre site !</h1>";

    }

    public function connexion(){
        $this->vue_connexion->form_connexion();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $motDePasse = $_POST['password'];
            $utilisateur = $this->modele_connexion->verifierUser($login, $motDePasse);
            if ($utilisateur) {
                $_SESSION['utilisateur'] = $login;
               $this->vue_connexion->connexionReussie();
                header("Refresh:2;URL=index.php");
            } else {
                echo "Erreur de connexion : login ou mot de passe incorrect.";            }
        }
    }
    public function inscription(){
        $this->vue_connexion->form_inscription();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $motDePasse = $_POST['password'];
            if (!$this->modele_connexion->verifierUser($login, $motDePasse)){
                $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
                $this->modele_connexion->ajouterUtilisateur($login, $hash);
                $this->vue_connexion->inscriptionReussie();
                header("Refresh:2;URL=index.php");
            }
            else {
                echo 'Utilisateur existe déjà';
            }


        }
    }
    public function deconnexion(){
        session_unset();
        session_destroy();
        echo 'Vous êtes deconnecté !';
        header("Refresh:1;URL=index.php");
    }
}
?>
