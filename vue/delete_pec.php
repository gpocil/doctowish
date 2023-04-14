<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
    <body>
<p>Êtes vous sûr de vouloir supprimer la prise en charge : <b><?=$_SESSION['delete_pec'][0]['nom']?></b> ?</p>
<form method="post" action="?action=delete_pec&id=<?=$_GET['id'];?>">
                <input type="submit" value="Oui" name="yes">
                <input type="submit" value="Retour aux prises en charge" name="no">
    <ul>
    	<li><a href="?action=creation_pec">Créer une nouvelle prise en charge</a></li>
		<li><a href="?action=pec">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
    <body>
<p>Êtes vous sûr de vouloir supprimer la prise en charge : <b><?=$_SESSION['delete_pec'][0]['nom']?></b> ?</p>
<form method="post" action="?action=delete_pec&id=<?=$_GET['id'];?>">
                <input type="submit" value="Oui" name="yes">
                <input type="submit" value="Retour aux prises en charge" name="no">
    <ul>
    	<li><a href="?action=creation_pec">Créer une nouvelle prise en charge</a></li>
		<li><a href="?action=pec">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
