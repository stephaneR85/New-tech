<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
	</head>
	<body>
		<h1>Informations personnelles</h1>
		<table id="info_client" class="table table-bordered table-striped table-condensed">
			<tr>
				<td>nom :</td>
				<td><?php echo htmlentities($utilisateur['nom'])?></td>	
			</tr>
			<tr>
				<td>prenom :</td>
				<td><?php echo htmlentities($utilisateur['prenom'])?></td>
			</tr>
			<tr>
				<td>adresse :</td>
				<td><?php echo htmlentities($utilisateur['adr'])?></td>
				<td><a href="#" class="titre" id="1">Modifier</a></td>
			</tr>
			<tr>
				<td>numero de telephone :</td>
				<td><?php echo htmlentities($utilisateur['num_tel'])?></td>
				<td><a href="#" class="titre" id="2">Modifier</a></td>
			</tr>
			<tr>
				<td>adresse mail :</td>
				<td><?php echo htmlentities($utilisateur['adr_mail'])?></td>
				<td><a href="#" class="titre" id="3">Modifier</a></td>
			</tr>
		</table>
		<div class="form" id="form1">
			<form class="form-inline" method="post" action="../Controleur/modif.php">
				<div class="form-group">
					<label for="text">Adresse: </label>
					<input class="form-control" type="text" id="adresse" name="adresse"/>
				</div>
				<div class="form-group">
					<label for="text">Code postal: </label>			
					<input class="form-control" type="number" id="cp" name="cp"/>
				</div>
				<div class="form-group">
					<label for="text">Ville: </label>
					<input class="form-control" type="text" id="ville" name="ville"/>
				</div>
				<button class="btn btn-default" type="submit">Valider</button>
			</form>
		</div>
		<div class="form" id="form2">
			<form class="form-inline" method="post" action="../Controleur/modif.php">
				<div class="form-group">
					<label for="text">Numero de telephone: </label>
					<input class="form-control" type="tel" id="num_tel" name="num_tel"/>
				</div>
				<button class="btn btn-default" type="submit">Valider</button>
			</form>
		</div>
		<div class="form" id="form3">
			<form class="form-inline" method="post" action="../Controleur/modif.php">
				<div class="form-group">
					<label for="text">Adresse mail: : </label>
					<input class="form-control" type="email" id="adr_mail" name="adr_mail"/>
				</div>
				<button class="btn btn-default" type="submit">Valider</button>
			</form>
		</div>
		<div><?php echo affiche_trie()?></div>
		<div class="historique"><?php echo htmlentities(commande($id_utilisateur, $date));?></div>
	</body>
</html>
