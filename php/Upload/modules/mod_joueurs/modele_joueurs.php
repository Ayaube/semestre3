<?php
require_once 'modules/connexion.php';

class ModeleJoueurs extends Connexion {
  
    public function getListe() {
        try {
            $query = self::$bdd->prepare("SELECT * FROM joueurs");
            $query->execute();
            $resultats = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            die('Erreur lors de la récupération des données : ' . $e->getMessage());
        }
    }

public function ajouterJoueur($nom, $bio) {
     try {
        $stmt = self::$bdd->prepare("INSERT INTO joueurs (nom, bio) VALUES (:nom, :bio)");
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
         return $stmt->execute(); // Exécute la requête d'insertion
      } catch (PDOException $e) {
          die('Erreur lors de l\'ajout du joueur : ' . $e->getMessage());
     }
    }


    public function getDetailsById($id) {
        try {
            $query = self::$bdd->prepare("SELECT * FROM joueurs WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $detailsJoueur = $query->fetch(PDO::FETCH_ASSOC);
            return $detailsJoueur;
        } catch (PDOException $e) {
            die('Erreur lors de la récupération des détails du joueur : ' . $e->getMessage());
        }
    }
}
?>