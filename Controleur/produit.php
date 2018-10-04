<?php
$nom = $_GET['nom'];
include("Modele/produit.php");
$resultat=produit($nom);
include("Vue/produit.php");
?>
