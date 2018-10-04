<?php
if(isset($_POST['nom']))
{
	include('../Modele/inscription.php');
	$nom = $_POST['nom'];
	$prenom =$_POST['prenom'];
	$adresse = $_POST['adresse'];
	$code_postal =$_POST['cp'];
	$ville = $_POST['ville'];
	$tel = $_POST['num_tel'];
	$numero = VerifierNum($tel);
	$mail = $_POST['adr_mail'];
	$adresse_mail = VerifierMail($mail);
	$passe = $_POST['mot_de_passe'];
	$conf = $_POST['confirmation'];
	$mdp = VerifierMotDePasse($passe, $conf);
	$role = role();

	if (empty($numero))
	{
		echo '<script type="text/javascript">alert("Le format du numero que vous avez indiquez n\'est pas correct");
											window.location.href ="../index.php?page=inscription";</script>';
		exit;
	}
	if(empty($mdp))
	{
		echo '<script type="text/javascript">alert("Erreur de saisie du mot de passe");
											window.location.href ="../index.php?page=inscription";</script>';
		exit;
	}
	if(empty($adresse_mail))
	{
		echo '<script type="text/javascript">alert("Votre adresse e-mail n\'est pas valide");
											window.location.href ="../index.php?page=inscription";</script>';
		exit;
	}
	if(double_email($adresse_mail) == false)
		{
		echo utf8_decode('<script type="text/javascript">alert("Cette adresse e-mail est déja utilisée");
											window.location.href ="../index.php?page=inscription";</script>');
		exit;
		}
	else
		{
			ajouterutilisateur($nom, $prenom, $adresse, $code_postal, $ville, $numero, $numero, $mdp, $adresse_mail, $role);
		}
}	
	
function VerifierNum($tel)
	{
	$motif ='`^0[1-7][0-9]{8}$`';
	if(preg_match($motif,$tel))
		{
		return $tel;
		}
		else
		{
		$tel = false;
		return $tel;
		}
	}

function VerifierMotDePasse($passe, $conf)
	{
		if($passe == $conf && strlen($passe) > 3)
		{
		return sha1($passe);
		}
		else
		{
		$passe = false;
		return $passe;
		}
	}	
						
function VerifierMail($mail)
{

	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mail))
	{
    return  $mail;
	}
	else
	{
	$mail = false;
	return $mail;	
	}
}
function role()
	{
	if (isset($_POST['role']))
	{
		$role = $_POST['role'];
	}
	else
	{
		$role = 'client';
	}
		return $role;
}
include('Vue/inscription.php');
?>