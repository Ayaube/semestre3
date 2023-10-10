<?php

class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $serveur = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201656"; 
        $utilisateur = "dutinfopw201656";
        $motDePasse = "gejuzage";
        
        try {
            self::$bdd = new PDO($serveur, $utilisateur, $motDePasse);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}



?>