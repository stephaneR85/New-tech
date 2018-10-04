<?php

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
	
	function sel_cat($id_categorie)
		{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT nom, prix, image, date_ajout, id_categorie FROM produit where id_categorie = '$id_categorie' ORDER BY date_ajout");
		$pdo->execute();
		while($selection = $pdo->fetch())
			{
			echo '<div class="col-xs-4 col-sm-3 col-md-2"><a href="../index.php?nom='.$selection['nom'].'&page=page_produit"><div id="nom_produit">'.$selection['nom'].'</div><br>
				<img id="produit" src="'. $selection['image'].'"/><br><div id="prix">'.$selection['prix'].' €</div></div>';
			}
	}
?>
				