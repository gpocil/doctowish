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
<div style="display: flex; justify-content: center;">
<form method="post" action="?action=pec&p=delete&id=<?=$_GET['id'];?>">
                <input type="submit" class="btn btn-primary"value="Oui" name="yes">
                <input type="submit" class="btn btn-primary"value="Retour aux prises en charge" name="no">
</div>
</form>
    <ul>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
