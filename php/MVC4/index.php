<?php

define('MY_APP_STARTED', true);
session_start();
require_once 'modules/connexion.php';
Connexion::initConnexion();

require_once 'composants/compMenu/comp_menu.php';
$compMenu = new CompMenu();

if (isset($_GET['module'])) {
    $module = $_GET['module'];

    $module = isset($_GET['module']) ? $_GET['module'] : "default";
    $module = strip_tags(htmlspecialchars($module));


    switch ($module) {
        case 'joueurs':
            require_once 'modules/mod_joueurs/mod_joueurs.php';
            new ModJoueurs();
            $moduleAffichage = (new VueJoueurs())->getAffichage();
            echo $moduleAffichage;
            break;
        case 'equipes':
            require_once 'modules/mod_equipes/mod_equipes.php';
            new ModEquipes();
            $moduleAffichage = (new VueEquipes())->getAffichage();
            echo $moduleAffichage;
            break;
        case 'connexion':
            require_once 'modules/mod_connexion/mod_connexion.php';
            new ModConnexion();
            $moduleAffichage = (new VueConnexion())->getAffichage();
            echo $moduleAffichage;
            break;
        default:
            die("Module inconnu ou non autorisé");
            break;
    }
}

require_once 'template.php';

?>


