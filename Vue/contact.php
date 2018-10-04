<html>
	<head>	
	</head>
	<body>
		<h1 class="col-lg-8">Formulaire de contact</h1>
			<div class="form-group">
				<form class="col-lg-6" method= 'POST' action="Controleur/contact.php">
					<label>Nom</label>
					<input type="text" class="form-control" name ="nom"/>
					<label>Email</label>
					<input type="email" class="form-control" name="email"/>
					<label>Votre demande</label>
					<textarea class="form-control" rows="4" name="message"></textarea>
					<button type="submit" class="btn btn-default">Envoyer</button>
				</form>
			</div>
		</div>
	</body>
</html>

