<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace utilisateur</h1>
	<p>Vous êtes connecté en tant que : <?php echo $_SESSION['name'];?>.</p>

	<ul>
		<li><a href="?action=liste_rdv_user">Liste des rendez-vous</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
