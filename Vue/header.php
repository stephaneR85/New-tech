<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
	</head>
	<body>
		<img id="banniere" src="Images/circuit.png"/>
		<?php include("Controleur/header.php");?>
		<div id="content">
			<div class="row">
				<section class="col-sm-6">
					<h1>Bonjour<?php visiteur()?></h1>
				</section>
				<section class="col-sm-6">
					<a href="../index.php?page=panier"><img id="panier" src="Images/panier.png">
					<span class="badge"><?php compteur();?></span></a>
					<div id="compte"><?php compte();?></div>	
				</section>	
			</div>		
			<div class="navbar navbar-default">
				<div class="navbar-header">
					<div class="navbar-brand">Categories:</div>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><?php affiche_categorie()?></li>
				</ul>
				<div class="row">
					<div class="form-group">
						<form class="navbar-form navbar-right inline-form">					
							<input class="input-sm form-control" type="search" name="champ" id="champ"  onblur="affiche();" onfocus="efface();" value="Rechercher un produit"/>
						</form>
					</div>
				</div>
				<div id="results"></div>
			</div>
		</div>
	</body>
</html>
