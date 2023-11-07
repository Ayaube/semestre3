<?php
require_once 'modules/connexion.php';

class ModeleConnexion extends Connexion {
  


    public function verifierLoginExistant($login) {
	    try {
		$query = self::$bdd->prepare("SELECT id, mot_de_passe FROM utilisateurs WHERE login = :login");
		$query->bindParam(':login', $login, PDO::PARAM_STR);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	    } catch (PDOException $e) {
		die('Erreur lors de la vérification du login : ' . $e->getMessage());
	    }
	}

    public function ajouterUtilisateur($login, $mot_de_passe_hash) {
	try {
         $stmt = self::$bdd->prepare("INSERT INTO utilisateurs (login, mot_de_passe) VALUES (:login, :mot_de_passe)");
        $stmt->bindParam(':login', $login,PDO::PARAM_STR);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash,PDO::PARAM_STR);
         return $stmt->execute(); 
    } catch (PDOException $e) {
          die('Erreur lors de l\'ajout du joueur : ' . $e->getMessage());
     }
}
}
?>