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