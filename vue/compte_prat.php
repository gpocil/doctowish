<!DOCTYPE html>
<link rel="stylesheet" href="../asset/css/compte_prat.css">

<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
	<h2>Mes informations personnelles</h2>
<?php
	$nom = $_SESSION['compte_prat'][0]['nom'];
	$prenom = $_SESSION['compte_prat'][0]['prenom'];
	$adresse = $_SESSION['compte_prat'][0]['adresse'].", ".$_SESSION['compte_prat'][0]['cp'].", ".$_SESSION['compte_prat'][0]['ville'];
	$spec = $_SESSION['compte_prat'][0]['specialite'];
	$tel = $_SESSION['compte_prat'][0]['tel'];
	$mail = $_SESSION['compte_prat'][0]['mail'];
    $adeli = $_SESSION['compte_prat'][0]['n_adeli'];

    ?>

	<ul>
    <li><b>Nom :</b> <?=$nom?></li>
    <li><b>Prénom :</b> <?=$prenom?></li>
    <li><b>Adresse :</b> <?=$adresse?></li>
    <li><b>Spécialité :</b> <?=$spec?></li>
    <li><b>N° Adeli :</b> <?=$adeli?></li>
    <li><b>Téléphone :</b> <?=$tel?></li>
    <li><b>Mail :</b> <?=$mail?></li>
	<li><a href="?action=compte_prat_update">Modifier mes coordonnées</a></li>
    <li><a href="?action=password_update">Modifier mon mot de passe</a></li>
    <li><a href="?action=accueil_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>
	</ul>


	<img id = "logo" src="asset/img/Doctowish-logo.png">

</body>
</html>
