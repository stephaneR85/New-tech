<?php
		
		if(isset($_POST['description']))
		{
			require("../../Modele/admin.php");
			require("../../Modele/connection.php");
			$nom_produit = $_POST['nom_produit'];
			$description = $_POST['description']; 
			$categorie =$_POST['categorie'];
			$id_categorie = categorie($categorie);
			$prix = str_replace(",",".",$_POST['prix']); 
			$stock = $_POST['stock']; 
			$image = $_POST['image'];
			$date = date("Y-m-d");
			ajouterproduit($nom_produit, $description, $id_categorie, $prix, $stock, $image, $date);
		}
		if(isset($_POST['nom_categorie']))
		{ 
			require("../../Modele/admin.php");
			require("../../Modele/connection.php");
			$nom_categorie = $_POST['nom_categorie']; 
			ajoutercategorie($nom_categorie);
		}
		if(isset($_POST['sup_categorie']))
		{ 
			require("../../Modele/admin.php");
			require("../../Modele/connection.php");
			$nom_categorie = $_POST['sup_categorie']; 
			sup_categorie($nom_categorie);
		}
		if(isset($_POST['adr_membre']))
		{
			require("../../Modele/admin.php");
			require("../../Modele/connection.php");
			$adr_membre = $_POST['adr_membre'];
			supprimer_membre($adr_membre);
		}
		if(isset($_POST['produit']))
		{
			require("../../Modele/admin.php");
			require("../../Modele/connection.php");
			$nom_produit = $_POST['produit'];
			supprimer_produit($nom_produit);
		}
		if(isset($_POST['nom_adm']))
		{
			require("../Controleur/inscription.php");
		}
		else
		{	if(isset($_SESSION['nom']) && $_SESSION['email'] =="admin@gmail.com")
			{
				require("Modele/admin.php");
				require("Vue/admin.php");
			}
			else
			{
				echo "Vous n'etes pas autorisé à accéder à cette page.";
			}
		}
		
?> 