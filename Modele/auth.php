<?php
require("connection.php");

	function auth($adresse_mail, $mdp)
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("SELECT id_utilisateur, adr_mail, mot_de_passe, nom, prenom, role FROM utilisateur WHERE mot_de_passe= :mdp AND adr_mail= :adresse_mail");
			$pdo->bindValue(':adresse_mail', $adresse_mail, PDO::PARAM_STR);
			$pdo->bindValue(':mdp', $mdp, PDO::PARAM_STR);
			$pdo->execute();
			while ($resultat = $pdo->fetch())
			{
			return $resultat;
			}
		}
?>
	