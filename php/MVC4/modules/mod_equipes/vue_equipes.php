<?php

if (!defined('MY_APP_STARTED')) {
    die('Accès non autorisé');
}
require_once 'vue_generique.php';

class VueEquipes extends VueGenerique {
	public function liste ($tab_equipes) {
		?>
		<h1>Liste des équipes</h1>
	<ul><?php
		foreach ($tab_equipes as $equipe) {
			?><li><a href="index.php?module=equipes&action=details&id=<?=$equipe["id"]?>" style="text-decoration:none"><?=$equipe["nom"]?></a> <a href="index.php?module=equipes&action=form_modif&id=<?=$equipe["id"] ?>"style="text-decoration:none">Modifier</a> <a href="index.php?module=equipes&action=supprimer&id=<?=$equipe["id"] ?>"style="text-decoration:none">Supprimer</a></li><?php
		}
		?></ul><?php
	}
	
	public function details($details) {
        echo '<h2>Détails de l\'équipe</h2>';
        echo '<p>ID : ' . $details['id'] . '</p>';
        echo '<p>Nom : ' . $details['nom'] . '</p>';
        echo '<p>Année de création : ' . $details['annee_creation'] . '</p>';
        echo '<p>Description : ' . $details['bio'] . '</p>';
		if (!empty($details['logo'])) {
			echo '<p>Logo : <img src="' . $details['logo'] .'" height = "300"</p>';
		} else {
			echo '<p>Logo : Pas de logo disponible.</p>';
		}
    
    }
	public function form_ajout() {
		echo '<h2>Ajouter une équipe</h2>';
		echo '<form method="post" enctype="multipart/form-data" action="index.php?module=equipes&action=ajout">';
		echo 'Nom : <input type="text" name="nom"><br>';
		echo 'Année de creation : <input type="number" min="1800" max="2024" name="annee"><br>';
		echo 'Bio : <textarea name="bio"></textarea><br>';
		echo 'Logo : <input type="file" name="logo"><br>';
		echo '<input type="submit" value="Ajouter">';
		echo '</form>';
	}

	public function form_modif($equipe) {

		echo '<h2>Modifier une équipe</h2>';
		echo '<form method="post" enctype="multipart/form-data" action="index.php?module=equipes&action=modifier&id="'. $equipe['id']. '">';
		echo 'Nom : <input type="text" name="nom" value ="'.$equipe['nom'].'"><br>';
		echo 'Année de creation : <input type="number" min="1800" max="2024" name="annee" value ="'.$equipe['annee_creation'].'"><br>';
		echo 'Bio : <textarea name="bio">'.$equipe['bio'].'</textarea><br>';
		echo 'Logo : <input type="file" name="logo"><br>';
		echo '<input type="submit" value="Modifier">';
		echo '</form>';
	}


public function confirmAjout() {
	echo "Equipe bien ajoutée !";
}

public function confirmModif() {
	echo "Equipe bien modifiée !";
}

public function erreurBD() {
	echo "Erreur lors de l'ajout/modification dans la BD";
}

public function confirmSuppression() {
	echo "L'équipe a été supprimée.";
}
}