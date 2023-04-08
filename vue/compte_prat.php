<!DOCTYPE html>
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
    <li>Nom : <?=$nom?></li>
    <li>Prénom : <?=$prenom?></li>
    <li>Adresse : <?=$adresse?></li>
    <li>Spécialité : <?=$spec?></li>
    <li>N° Adeli : <?=$adeli?></li>
    <li>Téléphone : <?=$tel?></li>
    <li>Mail : <?=$mail?></li>
	<li><a href="?action=compte_prat_update">Modifier mes informations personnelles</a></li>
    <li><a href="?action=password_update">Modifier mon mot de passe</a></li>

	</ul>



	<ul>
    <li><a href="?action=accueil_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
