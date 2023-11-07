<?php
require_once 'vue_generique.php';

class VueConnexion extends VueGenerique {
    
    public function __construct() {
        parent::__construct();
    }

    public function form_inscription() {
        echo '<h2>Inscription</h2>';
        echo '<form method="post" action="index.php?module=connexion&action=inscription">';
        echo 'Nom d\'utilisateur : <input type="text" name="login" required><br>';
        echo 'Mot de passe : <input type="password" name="mot_de_passe" required><br>';
        echo '<input type="submit" value="S\'inscrire">';
        echo '</form>';
    }

    public function form_connexion() {
        echo '<h2>Connexion</h2>';  
        echo '<form method="post" action="index.php?module=connexion&action=connexion">';
        echo 'Nom d\'utilisateur : <input type="text" name="login" required><br>';
        echo 'Mot de passe : <input type="password" name="mot_de_passe" required><br>';
        echo '<input type="submit" value="Se connecter">';
        echo '</form>';
    }

}


?>


 
