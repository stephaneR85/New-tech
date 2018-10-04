<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
 <html>
	<head>
	</head>
	<body>
		<div class="resultat">
			<section class="col-sm-8">
				<h1><?php echo htmlentities($nom);?></h1>
			</section>
			<section class="col-sm-4">
				<a href="../Controleur/panier.php?action=ajout&amp;nom=<?php echo $nom;?>&amp;prix=<?php echo $resultat['prix'];?>"><img id="panier" src="Images/ajout_panier.png"/></a>
			</section>
			<p>Quantité disponible: <?php echo($resultat['stock']);?></p><br>
			<p>Description :<br> <?php echo htmlentities($resultat['description']);?></p><br/>
			<div class="jumbotron">
				<img src="<?php echo($resultat['image']);?>"/>
				<div id="prix">Prix : <?php echo $resultat['prix'].'€';?></div>
			</div>
		</div>
		</div>
	</body>
</html>
