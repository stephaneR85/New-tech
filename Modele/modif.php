<?php
require("connection.php");

function modif_adr($adresse, $cp, $ville, $id_utilisateur)
	{
		$bdd = bdd();
		$adr = "$adresse " . $cp . " $ville";
		$pdo = $bdd->prepare("UPDATE utilisateur SET adr = :adr where id_utilisateur=$id_utilisateur");
		$pdo->bindValue(':adr', $adr, PDO::PARAM_STR);
		$pdo->execute();
		$count = $pdo->rowCount();
		if ($count>0)
			{
			echo utf8_decode('<script type="text/javascript">
							alert("La modification à bien été prise en compte");
							window.location.href ="../index.php?page=page_client";</script>');
						
							
			}
		else
			{
			echo utf8_decode('<script type="text/javascript">
							alert("Un problème est survenu veuillez contacter l\'administrateur");
							window.location.href ="../index.php?page=page_client";</script>');
			}	
	}
	function modif_mail($adr_mail, $id_utilisateur)
	{
		$bdd = bdd();
		if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$adr_mail))
			{
			$pdo = $bdd->prepare("UPDATE utilisateur SET adr_mail = :adr_mail where id_utilisateur=$id_utilisateur");
			$pdo->bindValue(':adr_mail', $adr_mail, PDO::PARAM_STR);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0)
				{
				echo utf8_decode('<script type="text/javascript">
							alert("La modification à bien été prise en compte");
							window.location.href ="../index.php?page=page_client";</script>');
				}
			else
				{
				echo utf8_decode('<script type="text/javascript">
							alert("Un problème est survenu veuillez contacter l\'administrateur");
							window.location.href ="../index.php?page=page_client";</script>');
				}		
			}
		else
		{
			echo utf8_decode('<script type="text/javascript">
							alert("Le format de saisie est incorrecte");
							window.location.href ="../index.php?page=page_client";</script>');
		}
	}
	function modif_tel($num_tel, $id_utilisateur)
	{ 	
		$bdd = bdd();
		if(preg_match('`^0[1-7][0-9]{8}$`',$num_tel))
			{
			$pdo = $bdd->prepare("UPDATE utilisateur SET num_tel = :num_tel where id_utilisateur=$id_utilisateur");
			$pdo->bindValue(':num_tel', $num_tel, PDO::PARAM_STR);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0)
				{
				echo utf8_decode('<script type="text/javascript">
							alert("La modification à bien été prise en compte");
							window.location.href ="../index.php?page=page_client";</script>');
				}
			else 
				{
				echo utf8_decode('<script type="text/javascript">
							alert("Un problème est survenu veuillez contacter l\'administrateur");
							window.location.href ="../index.php?page=page_client";</script>');
				}
			}
		else
			{
			echo utf8_decode('<script type="text/javascript">
							alert("Le format de saisie est incorrecte");
							window.location.href ="../index.php?page=page_client";</script>');
			}
	}

?>