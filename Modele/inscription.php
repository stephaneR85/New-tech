<?php
require("connection.php");

function ajouterutilisateur($nom, $prenom, $adresse, $code_postal, $ville, $numero, $numero, $mdp, $adresse_mail, $role)
		{
			$bdd = bdd();
			if($nom!=null && $prenom!=null && $adresse!=null && $code_postal!=null && $ville!=null && $numero!=null && $numero!=null && $mdp!=null && $adresse_mail!=null && $role!=null)
				{
				$pdo = $bdd->prepare("INSERT INTO utilisateur  VALUES(NULL, :nom, :prenom, :adresse, :numero, :adresse_mail, :mdp, :role)");
				$pdo->bindValue(':nom', $nom, PDO::PARAM_STR);
				$pdo->bindValue(':prenom', $prenom, PDO::PARAM_STR);
				$pdo->bindValue(':adresse', $adresse." ".$code_postal." ".$ville, PDO::PARAM_STR);
				$pdo->bindValue(':numero', $numero, PDO::PARAM_INT);
				$pdo->bindValue(':adresse_mail', $adresse_mail, PDO::PARAM_STR);
				$pdo->bindValue(':mdp', $mdp, PDO::PARAM_STR);
				$pdo->bindValue(':role', $role, PDO::PARAM_STR);
				$pdo->execute();
				$count = $pdo->rowCount();
				if ($count != null)
				{
					echo utf8_decode('<script type="text/javascript">
							alert("Votre inscription à bien été prise en compte, Vous pouvez à présent vous connecter");
							window.location.href ="../index.php?page=accueil";</script>');					
				}
				else
				{
					echo utf8_decode('<script type="text/javascript">
							alert("Un problème est survenu veuillez contacter l\'administrateur");
							window.location.href ="../index.php?page=inscription";</script>');	
				}
			}
			else
			{
				echo '<script type="text/javascript">alert("Vous n\'avez pas rempli tous les champs");
													window.location.href ="../index.php?page=inscription";</script>';
			}
		}
		
function double_email($adresse_mail)
{
	$bdd = bdd();
	$pdo = $bdd->prepare("SELECT adr_mail FROM utilisateur");
	$pdo->execute();
	while($selection = $pdo->fetch())
			{
			if($adresse_mail != $selection['adr_mail'])
			{
				$double = true;
			}
			else
			{
				$double = false;
				break;
			}
			return $double;
		}
}
?>