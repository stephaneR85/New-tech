<?php
	
	function utilisateur($id_utilisateur)
		{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT nom, prenom, adr, num_tel, adr_mail FROM utilisateur where id_utilisateur = $id_utilisateur");
		$pdo->execute();
		while($utilisateur = $pdo->fetch())
			{
			return $utilisateur;
			}
		}
	
	function id_utilisateur($utilisateur)
		{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT nom, id_utilisateur FROM utilisateur where nom = '$utilisateur'");
		$pdo->execute();
		while($id_utilisateur = $pdo->fetch())
			{
			return $id_utilisateur['id_utilisateur'];
			}
		}
	function id($mail)
		{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT id_utilisateur FROM utilisateur where adr_mail = '$mail'");
		$pdo->execute();
		while($id_utilisateur = $pdo->fetch())
			{
			return $id_utilisateur['id_utilisateur'];
			}
		}

	function commande($id_utilisateur, $date)
		{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT id_commande, id_utilisateur, date, prix FROM commande where id_utilisateur = $id_utilisateur AND date > '$date' ORDER BY date DESC");
		$pdo->execute();
		$count = $pdo->rowCount();
		if ($count>0)
		{
			while ($commande = $pdo->fetch())
			{
				$date = $commande['date'];
				$day = form_date($date);
				echo '<section class="col-sm-8 table-responsive">
						<table class="table table-bordered table-striped table-condensed">
							<tr class="info">
								<td> Date :'.htmlentities($day).'</td>
								<td>N°commande :'.htmlentities($commande['id_commande']).'</td> 
								<td>Prix :'.htmlentities($commande['prix']).'€</td>
							<tr>
						</table>
					</section>';
				$id_commande = $commande['id_commande'];
				echo htmlentities(ligne_commande($id_utilisateur, $id_commande));
			}
		}
	}
		
	function ligne_commande($id_utilisateur, $id_commande)
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT commande.id_commande, commande.id_utilisateur, ligne_commande.id_produit, produit.nom, quantite, ligne_commande.prix, ligne_commande.prix_total FROM ligne_commande 
									JOIN produit ON ligne_commande.id_produit=produit.id_produit 
									JOIN commande ON ligne_commande.id_commande=commande.id_commande
									JOIN utilisateur ON commande.id_utilisateur=utilisateur.id_utilisateur where commande.id_utilisateur = $id_utilisateur AND ligne_commande.id_commande = $id_commande");
		$pdo->execute();
		while ($ligne = $pdo->fetch())
			{
			echo '<section class="col-sm-8 table-responsive">
					<table class="table table-bordered table-striped table-condensed">
						<tr>
							<td>Produit</td>
							<td>Quantité</td>
							<td>Prix</td>
							<td>Prix total</td>
						</tr>
						<tr>
							<td>'. htmlentities($ligne['nom']).'</td>
							<td>'. htmlentities($ligne['quantite']).'</td>
							<td>'. htmlentities($ligne['prix']).'</td>
							<td>'. htmlentities($ligne['prix_total']).'</td>
						</tr>
					</table>
					</section>';
			}
	}
	
	function form_date($date)
	{
	list($dat) = explode(" ", $date);
	list($year, $mouth, $day) = explode("-", $dat);
	return "$day/$mouth/$year";
	}
	
	function affiche_trie()
	{
		if($_SESSION['email'] != "admin@gmail.com")
		{
			echo '<div id="historique" class="col-lg-6">
					<h2>Historique de commande</h2>
						<form class="form-inline" method="get" action="index.php?page=page_client">
							<input type="hidden" name="page" value="page_client"/>
							<label for="text">Trier par date </label>
							<select class="form-control" name="select_date">
								<option>_</option>
								<option>Le mois dernier</option>
								<option>Les 2 derniers mois</option>
								<option>Les 3 derniers mois</option>
								<option>Les 6 derniers mois</option>
								<option>Toutes</option>
							</select>
							<button class="btn btn-default" type="submit">Rechercher</button>
						</form>
					</div>';
		}
	}
?>