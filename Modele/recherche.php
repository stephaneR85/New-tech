<?php
require("connection.php");

	$bdd = bdd();
	$recherche = $_GET['champ'];
	$pdo = $bdd->prepare("SELECT nom FROM produit WHERE nom LIKE :recherche ORDER BY nom");
	$pdo->bindValue(':recherche', '%' .$recherche. '%', PDO::PARAM_STR);
	$pdo->execute();
	$count = $pdo->rowCount();
		if($count == 0 )
			{
?>
			<p>Pas de résultats pour cette recherche</p>
<?php
			}
		else
			{
	
	
		while ($resultat = $pdo->fetch())
		{?>
			<a href="../index.php?nom=<?php echo $resultat['nom'];?>&page=page_produit"><?php echo ( $resultat['nom'] );?></a><br>
		<?php
		}
			}
?>

