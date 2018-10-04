<?php
require("Modele/page_client.php");
	if(!isset($_SESSION['id']))
	{
		echo "Veuillez vous authentifier pour accéder à cette page";
	}
	else if(isset($_GET['nom'])&& $_SESSION['nom'] == "admin")
	{
		$utilisateur =  $_GET['nom'];
		$id_utilisateur = id_utilisateur($utilisateur);
		$utilisateur = utilisateur($id_utilisateur);
		include("Vue/Page_client.php");	
	}
	else if(isset($_GET['adr_mail']))
	{
		$mail = $_GET['adr_mail'];
		$id_utilisateur = id($mail);
		$date = "2010-01-01";
		$utilisateur = utilisateur($id_utilisateur);
		include("Vue/Page_client.php");	
	}
	else
	{
		$date= trie();
		$id_utilisateur = $_SESSION['id'];
		$utilisateur = utilisateur($id_utilisateur);
		include("Vue/Page_client.php");	
	}
function trie()
	{
	if(isset($_GET['select_date']))
		{
			$periode = $_GET['select_date'];
			switch ($periode)
			{
			case "Le mois dernier":
				$periode = 1;
				break;
			case "Les 2 derniers mois":
				$periode = 2;
				break;
			case "Les 3 derniers mois":
				$periode =3;
				break;
			case "Les 6 derniers mois":
				$periode = 6;
				break;
			case "Toutes":
				$periode = 7;
				break;
			}
		}
	else
		{
			$periode = 0;
		}	
	$date = date("Y-m-d");
	list($year, $mouth, $day) = explode("-", $date);
	$mouth = $mouth - $periode;
	if($mouth<1)
	{
		$year = $year-1;
		$mouth = $mouth + 12;
	}
	$date = "$year-$mouth-$day";
	if($periode==7)
	{
		$date = "2010-01-01";
	}	
	return $date;
	
}
?>