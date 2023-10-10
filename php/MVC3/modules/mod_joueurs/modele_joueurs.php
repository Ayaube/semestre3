<?php
include_once 'Connexion.php';

class ModeleJoueurs extends Connexion {

    
    public function getListe() {
        try {
            $requete = self::$bdd->query("SELECT * FROM joueurs");
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erreur lors de la récupération des joueurs : " . $e->getMessage());
        }
    }

    
    public function getDetails($id) {
        try {
            $requete = self::$bdd->prepare("SELECT * FROM joueurs WHERE id = :id");
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            return $requete->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erreur lors de la récupération des détails du joueur : " . $e->getMessage());
        }
    }

    
    public function addJoueur($name) {
        try {
            $requete = self::$bdd->prepare("INSERT INTO joueurs (nom) VALUES (:nom)");
            $requete->bindParam(':nom', $name, PDO::PARAM_STR);
            $requete->execute();
        } catch(PDOException $e) {
            die("Erreur lors de l'ajout du joueur: " . $e->getMessage());
        }
    }

    
    public function updateJoueur($id, $name) {
        try {
            $requete = self::$bdd->prepare("UPDATE joueurs SET nom = :nom WHERE id = :id");
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            $requete->bindParam(':nom', $name, PDO::PARAM_STR);
            $requete->execute();
        } catch(PDOException $e) {
            die("Erreur lors de la mise à jour du joueur: " . $e->getMessage());
        }
    }

    
    public function deleteJoueur($id) {
        try {
            $requete = self::$bdd->prepare("DELETE FROM joueurs WHERE id = :id");
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            $requete->execute();
        } catch(PDOException $e) {
            die("Erreur lors de la suppression du joueur: " . $e->getMessage());
        }
    }
}
?>
