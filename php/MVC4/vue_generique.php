<?php

if (!defined('MY_APP_STARTED')) {
    die('Accès non autorisé');
}
Class VueGenerique{
    public function __construct(){
        ob_start();
    }

    public function getAffichage(){
        return ob_get_clean();
    }
}
?>