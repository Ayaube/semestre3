<?php

include_once 'Connexion.php'; 
Connexion::initConnexion();

$module = isset($_GET['module']) ? $_GET['module'] : null;

switch ($module) {
    case 'joueurs':
        include_once 'modules/mod_joueurs/mod_joueurs.php';
        $joueursModule = new ModJoueurs();
        $joueursModule->handleRequest();
        break;

    case 'equipes':
        include_once 'modules/mod_equipes/mod_equipes.php';
        $equipesModule = new ModEquipes();
        $equipesModule->handleRequest();
        break;
        
    
        default:
        echo '<h2>Choisissez un module :</h2>';
        echo '<a href="index.php?module=joueurs"><button>Accéder aux joueurs</button></a>';
        echo '<a href="index.php?module=equipes"><button>Accéder aux équipes</button></a>';
        break;
    
}

?>
