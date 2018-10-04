<?php 

	function selection()
		{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT nom, prix, image, date_ajout FROM produit ORDER BY date_ajout DESC LIMIT 12");
		$pdo->execute();
		while($selection = $pdo->fetch())
			{
			echo '<div class="col-xs-4 col-sm-3 col-md-2">
					<a href="../index.php?nom='.$selection['nom'].'&page=page_produit"><div id="nom_produit">'.$selection['nom'].'</div><br>
					<div id="image"><img id="produit" src="'.$selection['image'].'"/></div><br>
					<div id="prix">'.$selection['prix'].' €</div>
				</div>';
			}
		}
?>
