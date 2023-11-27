<?php
require_once 'modules/connexion.php';

class ModeleEquipes extends Connexion {

    public function getListe() {
        try {
            $query = self::$bdd->prepare("SELECT * FROM Equipe");
            $query->execute();
            $resultats = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            die('Erreur lors de la récupération des données : ' . $e->getMessage());
        }
    }
    public function ajouterEquipes($nom, $bio, $annee) {
        try {
            $sql = "INSERT INTO Equipe (nom, annee_creation,bio) VALUES (:nom, :annee,:bio)";
            $stmt = self::$bdd->prepare($sql);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':annee', $annee, PDO::PARAM_STR);
            $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
            if ($stmt->execute()) {
                // Récupère l'ID de l'équipe nouvellement insérée
                return self::$bdd->lastInsertId();
            } else {
                // La requête n'a pas réussi
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de l\'ajout de l equipe : ' . $e->getMessage();
        }
    }

    public function getDetailsById($id) {
        try {
            $query = self::$bdd->prepare("SELECT * FROM Equipe WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $detailsJoueur = $query->fetch(PDO::FETCH_ASSOC);
            return $detailsJoueur;
        } catch (PDOException $e) {
            die('Erreur lors de la récupération des détails du joueur : ' . $e->getMessage());
        }
    }

    public function insertLogo($id, $logo) {
        try {
            $sql = "UPDATE Equipe SET logo=:logo WHERE id=:id";
            $stmt = self::$bdd->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
            return $stmt->execute();
        }
        catch (PDOException $e){
            echo ("Erreur lors de la modif de logo ".$e->getMessage()."<br/>");
        }
    }

    public function modifierEquipe($id,$nom,$bio,$annee) {
        try{
            $sql = "UPDATE Equipe SET nom=:nom, bio=:bio, annee_creation=:annee WHERE id=:id";
            $stmt = self::$bdd->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':annee', $annee, PDO::PARAM_STR);
            $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
            return $stmt->execute();
        }
        catch(PDOException $e){
            echo ("Erreur lors de la modification de l'equipe !".$e->getMessage()."<br/>");
        }
    }

    public function supprimerEquipe($id) {
        try {
            $sql = "DELETE FROM Equipe WHERE id=:id";
            $stmt = self::$bdd->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            return $stmt->execute();
        }
        catch(PDOException $e){
            echo ("Erreur lors de la suppression de l'equipe !".$e->getMessage()."<br/>");
        }
    }



}
?>