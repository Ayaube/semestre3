<?php

include_once 'Connexion.php';

class ModeleEquipes extends Connexion {
    public function getListe() {
        try {
            $requete = self::$bdd->query("SELECT * FROM equipes");
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erreur lors de la récupération des équipes : " . $e->getMessage());
        }
    }

    public function getDetails($id) {
        try {
            $requete = self::$bdd->prepare("SELECT * FROM equipes WHERE id = :id");
            $requete->bindParam(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            return $requete->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erreur lors de la récupération des détails de l'équipe : " . $e->getMessage());
        }
    }
}

?>
