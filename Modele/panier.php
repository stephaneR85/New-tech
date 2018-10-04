<?php

function TotalLigne($i)
	{
		$ligne = $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
		return $ligne;
	}
	
function MontantGlobal()
		{
			$total=0;
			for($i = 0; $i < count($_SESSION['panier']['nom']); $i++)
			{
				$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
			}
			return $total;
		}
function Ligne($i)
{
	$num_ligne = $i+1;
	array_push($_SESSION['panier']['num_ligne'],$num_ligne);
	return $num_ligne;
}
function Ajout($nom, $prix)
{
	if(isset($_SESSION['panier']))
	{
		$verif = array_search($nom, $_SESSION['panier']['nom']);
		if($verif!==false)
		{
			$quantite = $_SESSION['panier']['quantite'][$verif];
			$quantite++;
			$_SESSION['panier']['quantite'][$verif] = $quantite;
		}
		else
		{
			array_push($_SESSION['panier']['nom'],$nom);
			array_push($_SESSION['panier']['prix'],$prix);
			array_push($_SESSION['panier']['quantite'],1);
		}
	}
	else
	{
		$_SESSION['panier']=array();
		$_SESSION['panier']['nom'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
		$_SESSION['panier']['num_ligne'] = array();
		array_push($_SESSION['panier']['nom'],$nom);
		array_push($_SESSION['panier']['prix'],$prix);
		array_push($_SESSION['panier']['quantite'],1);
		array_push($_SESSION['panier']['num_ligne'],1);
	}
	echo "<script type='text/javascript'>window.location.href ='../index.php?page=panier';</script>";
}
function Suppression_panier()
{
	if(isset($_SESSION['panier']))
	{
		unset($_SESSION['panier']);
		echo utf8_decode ("Votre panier a été supprimé");
		echo "<p><a href='../index.php?page=accueil'/>Retour a la page d'acceuil</p>";
	}
	else
	{
		echo utf8_decode('<script type="text/javascript">
							alert("Votre panier est déjà vide");
							window.location.href ="../index.php?page=accueil";</script>');
	}
}

function Suppression_article($nom)
{
	$tmp=array();
	$tmp['nom'] = array();
	$tmp['quantite'] = array();
	$tmp['prix'] = array();
	$tmp['num_ligne'] = array();

	for($i = 0; $i < count($_SESSION['panier']['nom']); $i++)
	{
		if ($_SESSION['panier']['nom'][$i] !== $nom)
		{
			array_push( $tmp['nom'],$_SESSION['panier']['nom'][$i]);
			array_push( $tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
			array_push( $tmp['prix'],$_SESSION['panier']['prix'][$i]);
			array_push( $tmp['num_ligne'],$_SESSION['panier']['num_ligne'][$i]);
		}
	}
	$_SESSION['panier'] =  $tmp;
	unset($tmp);
}
function Actualiser($quantite, $i)
{
		$_SESSION['panier']['quantite'][$i] = $quantite[$i];	
}

function Stock($nom_produit)
{
	$bdd = bdd();
	$pdo = $bdd->prepare("SELECT stock FROM produit WHERE nom = '$nom_produit'");
	$pdo->execute();
	$resultat = $pdo->fetch();
	$stock= $resultat['stock'];
	return $stock;
}

function Ajuste_stock()
{
	$bdd = bdd();
	$nom = $_SESSION['panier']['nom'];
	$quantite = $_SESSION['panier']['quantite'];
	for($i=0; $i<count($quantite); $i++)
	{
		$nom_produit = $nom[$i];
		$stock = Stock($nom_produit);
		$qte_soust = $stock - $quantite[$i];
		$pdo = $bdd->prepare("UPDATE produit SET stock = $qte_soust WHERE nom = '$nom_produit'");
		$pdo->execute();
	}
}

function Validation($id_client, $date, $prix)
{
	$bdd = bdd();
	$pdo = $bdd->prepare("INSERT INTO commande VALUES(NULL, $id_client, '$date' , $prix)");
		
	$pdo->execute();
	$count = $pdo->rowCount();
	if ($count>0)
	{
		echo utf8_decode("<p>Votre commande est validée.</p><br>
				<p>Un email de confirmation vous a été envoyé.</p><br>");
		echo utf8_decode("<p><a href='../index.php?page=accueil'/>Retour à la page d'accueil</p>");
	}
	else
	{
		echo 'Erreur : Veuillez contacter l\'administrateur';
	}
}

function Select_id($id_client, $date, $prix)
{
	$bdd = bdd();
	$pdo = $bdd->prepare("SELECT id_commande FROM commande WHERE id_utilisateur = $id_client and date = '$date' and prix = $prix ORDER BY id_commande");
	$pdo->execute();
	$resultat = $pdo->fetch();
	$id_commande = $resultat['id_commande'];
	return $id_commande;
}

function Ligne_commande($id_commande, $nom_produit, $prix_produit, $qte_produit)
{
	$bdd = bdd();
	$nbArticles = count($_SESSION['panier']['nom']);
	for ($i=0 ;$i < $nbArticles ; $i++)
	{
		$pdo = $bdd->prepare("SELECT id_produit FROM produit where nom = '$nom_produit[$i]'");
		$pdo->execute();
		$resultat = $pdo->fetch();
		$id_produit = $resultat['id_produit'];
		$prix_ligne = TotalLigne($i);
		$pdo2 = $bdd->prepare("INSERT INTO ligne_commande VALUES(NULL, $id_produit, $qte_produit[$i], $id_commande, $prix_produit[$i], $prix_ligne)");	
		$pdo2->execute();
	}
	$count = $pdo2->rowCount();
	if (!$count>0)
	{
		echo 'Erreur : Veuillez contacter l\'administrateur';
	}
}
function email($email, $nom_client, $prenom)
{
	require "../PHPMailer-master/class.phpmailer.php"; 
	require "../PHPMailer-master/class.smtp.php";
	$message = utf8_decode("Bonjour ".$prenom." ".$nom_client."\n 
				Nous vous remercions de la confiance que vous nous accordez, et nous allons préparer votre commande dans les plus bref délais.\n
				Cordialement l'equipe de new-tech.");
	$mail = new PHPmailer();         
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth = false;
	$mail->From=('new-tech@gmail.com'); 
	$mail->FromName= 'www.new-tech.com';
	$mail->AddAddress($email);   
	$mail->Subject='Confirmation commande';   
	$mail->Body= $message;      
	$mail->Send();
	$mail->SmtpClose();   
	unset($mail); 
	
}
?>
