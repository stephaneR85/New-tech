<?php
if (isset($_GET["page"]))
	{
    $page = $_GET["page"];
	session_start();
	}
else 
	{
	$page = "accueil";
	}
    switch ($page)
    {
        case "page_client":
            $title = "Page_client";
            $include = "Controleur/page_client.php";
            break;
        case "page_produit":
			$title = "page_produit";
            $include = "Controleur/produit.php";
            break;
		case "admin":
			$title = "admin";
			$include = "Controleur/admin/admin.php";
			break;
		case "inscription":
			$title = "inscription";
			$include = "Controleur/inscription.php";
			break;
		case "panier":
			$title = "panier";
			$include = "Controleur/panier.php";
			break;
		 case "selection":
            $title = "selection";
            $include = "Controleur/sel_cat.php";
            break;
		case "info_client":
			$title= "info client";
			$include = "Controleur/info_client.php";
			break;
		case "accueil":
            $title = "Accueil";
            $include = "Vue/accueil.php";
            break;
		case "garantie":
			$title = "garantie";
			$include = "Vue/garantie.html";
			break;
		case "paiement":
			$title = "Moyens de paiement";
			$include = "Vue/paiement.html";
			break;
		case "transport":
			$title = "Transport";
			$include= "Vue/transport.html";
			break;
		case "cgv":
			$title = "Conditions générales de vente";
			$include= "Vue/cgv.html";
			break;
		case "mentions":
			$title = "Conditions générales de vente";
			$include= "Vue/mentions.html";
			break;
		case "contact":
			$title = "Contact";
			$include= "Vue/contact.php";
			break;
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style/index.css">
		<title><?php echo $title;?></title>
	</head>
	<body>
<?php require("Vue/header.php");?>

	<div id="content">
		<div id="main">
			<?php if (isset($include)) require_once $include;?>
		</div>
		<div class="footer">
			<?php require('Vue/footer.php');?>
		</div>
	</div>
	</body>
	<script src="Javascript/jquery.js"></script>
	<script type="text/javascript" src="Javascript/recherche.js"></script>
	<script type="text/javascript" src="Javascript/form.js"></script>
	<script type="text/javascript" src="Javascript/footer.js"></script>
</html>