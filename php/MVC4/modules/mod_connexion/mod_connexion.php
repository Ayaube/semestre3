<?php

if (!defined('MY_APP_STARTED')) {
    die('Accès non autorisé');
}
require_once 'cont_connexion.php';


class ModConnexion {
    public function __construct() {
        $cont_connexion = new ContConnexion();

        $cont_connexion->exec();
    }
}

?>

