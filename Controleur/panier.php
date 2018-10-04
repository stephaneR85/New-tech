<?php
if(isset($_GET['action']))
{
	session_start();
	$action = $_GET["action"];
	require('../Modele/panier.php');
	require("../Modele/connection.php");
}
else
{
	$action = "affiche";
}	
    switch ($action)
    {
		case "affiche":
			require("Modele/panier.php");
			require("Vue/panier.php");
			break;
			
        case "ajout":
			$nom = $_GET['nom'];
			$prix = $_GET['prix'];
			$stock = Stock($nom);
			if($stock > 0)
			{	
				Ajout($nom, $prix);
			}
			else
			{
				echo "Il n'y a pas assez d'article en stock";
			}
			break;
			
		case "supp_panier":
			Suppression_panier();
			break;
			
		case "supp_article":
			$nom = $_GET['nom'];
			Suppression_article($nom);
			echo '<script type="text/javascript">window.location.href ="../index.php?page=panier";</script>';
			break;
			
		case "actualiser":
			$quantite = array();
			$quantite = $_GET['quantite']; 
			for($i=0; $i<count($quantite); $i++)
			{
				if(is_numeric($quantite[$i]))
				{
					$nom_produit = $_SESSION['panier']['nom'][$i];
					$qte_produit = $quantite[$i];
					$stock = Stock($nom_produit);
					if($qte_produit > $stock)
					{
						echo "La quantité saisie est trop importante de: ".$nom_produit;
						break;
					}
					else
					{
						Actualiser($quantite, $i);
						echo "<script type='text/javascript'>window.location.href ='../index.php?page=panier';</script>";
					}
				}
				else
				{
					echo "<script type='text/javascript'>
		alert('Mauvais format');window.location.href ='../index.php?page=panier';</script>";
				}
			}		
			header('../Vue/panier.php');
			break;
			
		case "validation":
			if(isset($_SESSION['id']))
			{
				if(isset($_SESSION['panier']))
				{
					$id_client = $_SESSION['id'];
					$date = date("Y-m-d");
					$montant = MontantGlobal();
					if($montant > 0)
					{
						$prix = MontantGlobal();
						$nom_produit = array();
						$qte_produit = array();
						$prix_produit = array();
						$nom_produit = $_SESSION['panier']['nom'];
						$qte_produit = $_SESSION['panier']['quantite'];
						$prix_produit = $_SESSION['panier']['prix'];
						Validation($id_client, $date, $prix);
						$id_commande = Select_id($id_client, $date, $prix);
						Ligne_commande($id_commande, $nom_produit, $prix_produit, $qte_produit);
						Ajuste_stock();
						$email = $_SESSION['email'];
						$nom_client = $_SESSION['nom'];
						$prenom = $_SESSION['prenom'];
						email($email, $nom_client, $prenom);
						unset($_SESSION['panier']);
					}
					else
					{
						echo '<div class="alert span1 alert-danger">
								<strong>Votre panier est vide !</strong>
								</div>';
					}
				}
				else
				{
					echo '<div class="alert span1 alert-danger">
								<strong>Votre panier est vide !</strong>
								</div>';
				}
			}
			else
			{
				echo '<script type="text/javascript">
		alert("Veuiller vous identifier ou vous inscrire");window.location.href ="../index.php?page=panier";</script>';
				
			}
			break;
	}
?>
