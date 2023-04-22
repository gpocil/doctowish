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
	<ul>
  <li><a href="?action=compte_prat&p=update" class="large-link">Modifier mes coordonnées</a></li>
  <li><a href="?action=compte_prat&p=pw" class="large-link">Modifier mon mot de passe</a></li>
  <li><a href="?action=accueil_prat">Retour</a></li>
  <li><a href="?action=logout">Déconnexion</a></li>
</ul>

	</ul>

