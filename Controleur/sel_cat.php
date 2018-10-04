<?php
$categorie = $_GET['categorie'];
include("Modele/sel_cat.php");
$id_categorie = categorie($categorie);
$sel_cat=sel_cat($id_categorie);
require("Vue/sel_cat.php");
?>