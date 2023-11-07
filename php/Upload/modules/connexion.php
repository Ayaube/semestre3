<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $dsn = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw20166";
        $username = "dutinfopw20166";
        $password = "jebesymy";

        try {
            self::$bdd = new PDO($dsn, $username, $password);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}
?>
