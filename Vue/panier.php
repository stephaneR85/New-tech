<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
</head>
<body>

<form id="panier" type="GET" action="Controleur/panier.php">
<table class="table table-bordered table-striped table-condensed">
	<tr>
		<td>Votre panier</td>
	</tr>
	<tr>
		<td></td>
		<td>Libellé</td>
		<td>Quantité</td>
		<td></td>
		<td>Prix Unitaire</td>
		<td>Prix Total</td>
	</tr>


	<?php
	if(isset($_SESSION['panier']))
	{
		$nbArticles = count($_SESSION['panier']['nom']);
			for ($i=0 ;$i < $nbArticles ; $i++)
			{?>
	<tr>
		<td><?php echo Ligne($i);?></td>
		<td><?php echo htmlentities($_SESSION['panier']['nom'][$i]);?></td>
		<td><input type= "int" size="2" maxlength="2" name="quantite[]" value="<?php echo htmlentities($_SESSION['panier']['quantite'][$i]);?>"/></td>
		<td><a href="../Controleur/panier.php?action=supp_article&amp;nom=<?php echo $_SESSION['panier']['nom'][$i];?>">supprimer</a></td>
		<td><?php echo($_SESSION['panier']['prix'][$i]);?> €</td>
		<td><?php echo TotalLigne($i);?> €</td>
	</tr>
	<tr>
			<?php
			}?>
		<td colspan="2"></td>
		<td><input type="submit" name="action" value="actualiser"/></td>
		<td colspan="2"></td>
		<td colspan="2">Total : <?php echo MontantGlobal();?> €</td>
	</tr>
	<?php
	}
	else
	{
			echo '<div class="alert span1 alert-danger">
								<strong>Votre panier est vide !</strong>
								</div>';
	}
	?>
</table>
</form>
	<div>Date: <?php echo date("d-m-Y");?></div>
	<div><?php echo sup_panier();?></div>
	<div id="validation"><a href="../Controleur/panier.php?action=validation">Valider mon panier</a></div>
</body>
</html>

<?php 
function sup_panier()
{
	if(isset($_SESSION['panier']['nom']))
	{
		echo '<div id="suppression"><a href="../Controleur/panier.php?action=supp_panier">supprimer mon panier</a></div>';
	}
}
?>