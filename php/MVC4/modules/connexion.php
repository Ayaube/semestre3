<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {

        try {
            // Remplacez le chemin avec le chemin correct vers votre fichier de base de données SQLite
            $cheminBd = 'C:\Users\Ayoub LAMCHICHI\PhpstormProjects\semestre3\php\bd';

            self::$bdd = new PDO('sqlite:' . $cheminBd);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}
?>
