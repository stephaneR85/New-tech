<?php 
function bdd()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=new_tech;charset=utf8', 'root', '0000')
		or die("Impossible de se connecter au serveur "); 
		return $bdd;
	}
?>