<?php
class VueConnexion {

    public function form_inscription(){
        echo '<li><a href="index.php?">Bienvenue</a></li>';
        echo '<h2>Inscription</h2>';
        echo '<form method="post" action="index.php?module=connexion&action=inscription">';
        echo 'Login : <input type="text" name="login" required><br>';
        echo 'Password : <input type="password" name="password" required><br>';
        echo '<input type="submit" value="Inscription">';
        echo '</form>';
    }

    public function form_connexion(){
        echo '<li><a href="index.php?">Bienvenue</a></li>';
        session_start();
        if (isset($_SESSION['utilisateur'])) {
            echo 'Vous êtes déjà connecté sous l\'identifiant "' . $_SESSION['utilisateur'] . '"<br>';
            echo '<a href="index.php?module=connexion&action=deconnexion">Déconnexion</a>';
        } 
        else {
            echo '<h2>Connexion</h2>';
            echo '<form method="post" action="index.php?module=connexion&action=connexion">';
            echo 'Login : <input type="text" name="login" required><br>';
            echo 'Password : <input type="password" name="password" required><br>';
            echo '<input type="submit" value="Connectez-Vous">';
            echo '</form>';
        }
    }
    public function menu($action) {
    echo '<ul>';
    if (isset($_SESSION['utilisateur'])) {
        echo '<li>Vous êtes déjà connecté sous l\'identifiant "' . $_SESSION['utilisateur'] . '"</li>';
        echo '<li><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
    }
    echo'</ul>';
    }

}

?>