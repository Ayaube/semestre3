<?php
require_once 'modules/connexion.php';

class ModeleConnexion extends Connexion {

    public function verifierUser($login,$mdp){
        $sql = 'SELECT id,login,password FROM Utilisateur WHERE login = :login';
        $stmt = self::$bdd->prepare($sql);
        $stmt->bindParam(':login',$login,PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function ajouterUtilisateur($login, $mdp) {
        // Vérifier si l'utilisateur existe déjà
        $userExist = $this->verifierUser($login, $mdp);
        
        if ($userExist) {
            return 'L utilisateur existe déjà';
        } else {
            $sql = 'INSERT INTO Utilisateur (login, password) VALUES (:login, :password)';
            $stmt = self::$bdd->prepare($sql);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->bindParam(':password', $mdp, PDO::PARAM_STR);
            $stmt->execute();
            return 'Vous vous êtes inscrit !';
        }
    }
    
}
?>
