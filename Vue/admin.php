<html>
	<head>	
	</head>
	<body>
		<div class="alert span1 alert-info">
			<strong>Choississez une action : </strong>
		</div>
		<div class="col-lg-12"><a href="#"class="titre" id="1">Ajout d'un produit</a></div>
		<div class="form" id="form1">
			<div class="form-group">
				<form class="col-lg-6" method= 'POST' action= '../Controleur/admin/admin.php'>
					<label>Nom du produit</label><input class="form-control" type='text' name='nom_produit'/>
					<label>Description</label><input class="form-control" type='text' name='description'/>
					<label>Categorie</label><input class="form-control" type='text' name='categorie'/>
					<label>Prix</label><input class="form-control" type='text' name='prix'/>
					<label>Quantité disponible</label><input class="form-control" type='number' name= 'stock'/>
					<label>Image</label><input class="form-control" type='text' name='image'/>
					<input class="form-control" type='submit' value='valider'/>
				</form>
			</div>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="2">Suppression d'un produit</a></div>
		<div class="form" id="form2">
			<form class="col-lg-6" method='POST' action='../Controleur/admin/admin.php'>
				<label>Nom du produit</label><input class="form-control" type='text' name='produit'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="3">Ajout d'une catégorie</a></div>
		<div class="form" id="form3">
			<form class="col-lg-6" method='POST' action='../Controleur/admin/admin.php'>
				<label>Nom catégorie</label><input class="form-control" type='text' name='nom_categorie'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="4">Suppression d'une catégorie</a></div>
		<div class="form" id="form4">
			<form class="col-lg-6" method='POST' action='../Controleur/admin/admin.php'>
				<label>Nom catégorie</label><input class="form-control" type='text' name='sup_categorie'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="5">Ajout d'un Membre</a></div>
		<div class="form" id="form5">
	
			<form class="col-lg-6" method= 'POST' action= '../Controleur/inscription.php'>
				<label>Nom</label><input class="form-control" type='text' name='nom'/>
				<label>Prénom</label><input class="form-control" type='text' name='prenom'/>
				<label>Adresse</label><input class="form-control" type='text' name='adresse'/>
				<label>Code postal</label><input class="form-control" type='number' name='cp'/>
				<label>Ville</label><input class="form-control" type='text' name='ville'/>
				<label>Numéro de téléphone</label><input class="form-control" type='tel' name= 'num_tel'/>
				<label>Adresse mail</label><input class="form-control" type='email' name= 'adr_mail'/>					
				<label>Mot de passe</label><input class="form-control" type='password' name= 'mot_de_passe'/>
				<label>Confirmation mot de passe</label><input class="form-control" type='password' name= 'confirmation'/>
				<label>Role</label><input class="form-control" type='text' name='role' />
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="6">Suppression d'un membre</a></div>
		<div class="form" id="form6">
			<form class="col-lg-6" method='POST' action='../Controleur/admin/admin.php'>
				<label>Adresse mail du membre</label><input class="form-control" type='email' name='adr_membre'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="7">Liste des membres</a></div>
		<div class="form" id="form7">
			<ul>
				<div><?php echo afficher_membre();?></div>
			</ul>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="8">Liste des produits</a></div>
		<div class="form" id="form8">
			<ul>
				<div><?php echo afficher_produit();?></div>
			</ul>
		</div>
	</body>
</html>
