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


    public function inscription() {
	    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$login = isset($_POST['login']) ? $_POST['login'] : '';
		$mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';

		if (!empty($login) && !empty($mot_de_passe)) {
		    // Vérifiez si le login existe déjà
		    $login_existant = $this->modele_connexion->verifierLoginExistant($login);

		    if ($login_existant) {
		        echo "Ce login est déjà utilisé. Veuillez choisir un autre.";
		    } else {
		        // Le login n'existe pas, procédez à l'inscription
		        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

		        if ($this->modele_connexion->ajouterUtilisateur($login, $mot_de_passe_hash)) {
		            echo "Inscription réussie !";
		        } else {
		            echo "Erreur lors de l'inscription.";
		        }
		    }
		} else {
		    echo "Veuillez remplir tous les champs du formulaire.";
		}
	    }
	}
    
    
    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = isset($_POST['login']) ? $_POST['login'] : '';
            $mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';
    
            // Vérifiez les informations de connexion et récupérez l'utilisateur depuis la base de données
		    $utilisateur = $this->modele_connexion->verifierLoginExistant($login);

    
            if ($utilisateur !== null && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
                // Les informations de connexion sont correctes, initialisation de la session
                $_SESSION['user_id'] = $utilisateur['id'];
                echo "Connexion réussie !";
                // Redirigez l'utilisateur vers une page d'accueil ou autre page après la connexion
               
            } else {
                // Informations de connexion incorrectes
                echo "Informations de connexion incorrectes.";
                $this->vue_connexion->form_connexion();
            }
        } else {
            $this->vue_connexion->form_connexion();
        }
    }
    public function deconnexion() {
        unset($_SESSION['user_id']);
        echo "Vous êtes déconnecté.";

      
    }
   
  

    public function form_inscription() {
        $this->vue_connexion->form_inscription();
  }
  
  public function getAffichage() {
    return $this->vue_connexion->getAffichage();
}

    public function exec() {
        switch ($this->action) {
            case 'afficher':
                $this->form_inscription();
                break;
            case'inscription':
                $this->inscription();
                break;
            case 'connexion':
                $this->connexion();
                break;
            case 'deconnexion':
                $this->deconnexion();
                break;
            default:
                // Action par défaut si l'action n'est pas reconnue
                $this->inscription();
                break;
        }
    }
}
?>