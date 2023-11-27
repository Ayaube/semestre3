<?php
require_once 'modules/connexion.php';

class ModeleJoueurs extends Connexion {
  
    public function getListe(){
        $sql = 'SELECT * FROM Joueur';
        $stmt = self::$bdd->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterJoueur($nom, $bio) {
     try {
         $sql = "INSERT INTO Joueur (nom, bio) VALUES (:nom, :bio)";
         $stmt = self::$bdd->prepare($sql);
         $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
          $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
         return $stmt->execute(); // Exécute la requête d'insertion
      } catch (PDOException $e) {
          die('Erreur lors de l\'ajout du joueur : ' . $e->getMessage());
     }
    }


    public function getDetailsById($id) {
        try {
            $query = self::$bdd->prepare("SELECT * FROM Joueur WHERE id = :id");
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