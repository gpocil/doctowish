<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>

	<ul>
		<li><a href="?action=compte_prat">Mon compte</a></li>
    	<li><a href="?action=inscription_user">Ajouter un patient</a></li>
		<li><a href="?action=ajout_rdv">Ajouter un rendez-vous</a></li>
		<li><a href="?action=liste_rdv">Liste des rendez-vous</a></li>
		<li><a href="?action=pec">Mes prises en charge</a></li>
		<li><a href="?action=liste_users">Accéder au listing des patients</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
