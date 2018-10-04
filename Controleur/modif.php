<?php
	session_start();
	require("../Modele/modif.php");
	$id_utilisateur = $_SESSION['id'];
		if(isset($_POST['adresse']))
	{
		$adresse = $_POST['adresse'];
		$cp = $_POST['cp'];
		$ville = $_POST['ville'];
		modif_adr($adresse, $cp, $ville, $id_utilisateur);
	}
		if(isset($_POST['adr_mail']))
	{
		$adr_mail = $_POST['adr_mail'];
		modif_mail($adr_mail, $id_utilisateur);
	}
		if(isset($_POST['num_tel']))
	{
		$num_tel = $_POST['num_tel'];
		modif_tel($num_tel, $id_utilisateur);
	}
?>