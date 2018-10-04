<?php

	function produit($nom)
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("SELECT nom, description, prix, stock, image FROM produit where nom = '$nom'");
			$pdo->execute();
			while ($resultat = $pdo->fetch())
			{
			return $resultat;
			}
		}
?>

