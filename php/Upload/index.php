<?php
require_once 'modules/mod_joueurs/mod_joueurs.php';
require_once 'modules/mod_equipes/mod_equipes.php';
require_once 'modules/mod_connexion/mod_connexion.php';
require_once 'composants/CompMenu/comp_menu.php';

Connexion::initConnexion();
session_start();

$tamp = NULL;
$contenuModule = '';

if (isset($_GET['module'])) {
    $module = $_GET['module'];
    switch ($module) {
        case 'joueurs':
            $tamp = new ModJoueurs();
            break;
        case 'equipes':
            $tamp = new ModEquipes();
            break;
        case 'connexion':
            $tamp = new ModConnexion();
            break;
        default:
            echo 'Module non reconnu.';
            break;
    }
}

if ($tamp !== null) {
    $contenuModule = $tamp->getAffichage();
}

$menuComponent = new CompMenu();

require_once 'template.php';
?>
