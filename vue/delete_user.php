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
<p>Êtes vous sûr de vouloir supprimer le patient : <b><?=$_SESSION['delete_user'][0]['prenom'].' '.$_SESSION['delete_user'][0]['nom']?></b> ?</p>

<form method="post" action="?action=delete_user&id=<?=$_GET['id'];?>">
                <input type="submit" value="Oui" name="yess">
                <input type="submit" value="Retour à la liste des patients" name="nope">
    <ul>
		<li><a href="?action=liste_users">Retour</a></li>
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
<p>Êtes vous sûr de vouloir supprimer le patient : <b><?=$_SESSION['delete_user'][0]['prenom'].' '.$_SESSION['delete_user'][0]['nom']?></b> ?</p>
<form method="post" action="?action=delete_user&id=<?=$_GET['id'];?>">
                <input type="submit" value="Oui" name="yess">
                <input type="submit" value="Retour à la liste des patients" name="nope">
    <ul>
		<li><a href="?action=liste_users">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
