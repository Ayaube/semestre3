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
}
?>