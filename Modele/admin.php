<?php

	function ajouterproduit($nom_produit, $description, $id_categorie, $prix, $stock, $image, $date)
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("INSERT INTO produit VALUES(NULL, :nom_produit, :description, $id_categorie, $prix, $stock, '$image','$date')");
			$pdo->bindValue(':nom_produit', $nom_produit, PDO::PARAM_STR);
			$pdo->bindValue(':description', $description, PDO::PARAM_STR);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo utf8_decode('<script type="text/javascript">alert("L\'ajout du Produit à bien été prit en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie du produit est incorrecte.");
										window.location.href ="../../index.php?page=admin";</script>');
			}
		}
	
	function ajoutercategorie($nom_categorie)
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("INSERT INTO categorie VALUES(NULL, '$nom_categorie')");
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo utf8_decode('<script type="text/javascript">alert("L\'ajout de la catégorie à bien été prit en compte");
										window.location.href ="../../index.php?page=admin";</script>');
				
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie de la catégorie est incorrecte");
										window.location.href ="../../index.php?page=admin";</script>');
			}	
		}
	function categorie($categorie)
	{
		$bdd = bdd(); 
		$pdo = $bdd->prepare("SELECT id_categorie FROM categorie WHERE nom ='$categorie'");
		$pdo->execute();

		while ($resultat = $pdo->fetch())
			{
			$id_categorie = $resultat['id_categorie'];
			return $id_categorie;
			}
	}
	
	function sup_categorie($categorie)
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("DELETE FROM categorie where nom = '$categorie'");
		$pdo->execute();
		$count = $pdo->rowCount();
			if ($count>0)
			{
			echo utf8_decode('<script type="text/javascript">alert("La suppression de la catégorie à bien été prise en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie de la catégorie est incorrecte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
	}
	
	function supprimer_membre($adr_membre)
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("DELETE FROM utilisateur where adr_mail = '$adr_membre'");
		$pdo->execute();
		$count = $pdo->rowCount();
			if ($count>0)
			{
			echo utf8_decode('<script type="text/javascript">alert("La suppression du membre à bien été prise en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie du membre est incorrecte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
	}
	
	function supprimer_produit($nom_produit)
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("DELETE FROM produit where nom = '$nom_produit'");
		$pdo->execute();
		$count = $pdo->rowCount();
			if ($count>0)
			{
			echo utf8_decode('<script type="text/javascript">alert("La suppression du produit à bien été prise en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie du produit est incorrecte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
	}
	
	function afficher_membre()
	{
		$bdd = bdd(); 
		$pdo = $bdd->prepare("SELECT nom, prenom, adr_mail FROM utilisateur");
		$pdo->execute();

		while ($resultat = $pdo->fetch())
			{
			echo '<li><a href="../index.php?page=page_client&adr_mail='.$resultat['adr_mail'].'">'.$resultat['nom'].' '.$resultat['prenom'].'</a></li>';
			}
	}
function afficher_produit()
	{
		$bdd = bdd(); 
		$pdo = $bdd->prepare("SELECT nom FROM produit");
		$pdo->execute();

		while ($resultat = $pdo->fetch())
			{
			echo '<li><a href="../index.php?page=page_produit&nom='.$resultat['nom'].'">'.$resultat['nom'].'</a></li>';
			}
	}
	
?>
