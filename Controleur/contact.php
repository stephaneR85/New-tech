<?php
require "/PHPMailer-master/class.phpmailer.php"; 
require "/PHPMailer-master/class.smtp.php";
if(isset($_POST['email']))
	{   
	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$message = $_POST['message'];
	
	$mail = new PHPmailer();       
	$mail->Host='smtp.gmail.com'; 
	$mail->SMTPAuth = false;
	$mail->From= ($email); 
	$mail->FromName= $nom;
	$mail->AddAddress('rafflin.stephane@gmail.com');   
	$mail->Subject='Contact client';   
	$mail->Body= $message;      
	if(!$mail->Send()) 
	{
		echo 'Erreur : Veuillez contacter l\'administrateur '.$mail->ErrorInfo;
	}
	else  
	{
		echo utf8_decode('<p>Votre message à bien été envoyé, nous allons y repondre dans les plus bref délais.</p><br>'); 
		echo utf8_decode('<a href ="../index.php">Retour à la page d\'accueil</a>');
	}
	$mail->SmtpClose();   
	unset($mail); 
	}
?>