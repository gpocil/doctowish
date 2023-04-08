<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
    <body>
<p>Supprimer le RDV : <b><?=$_SESSION['delete_rdv'][0]['nom'].', avec '.$_SESSION['delete_rdv'][0][1].'' .$_SESSION['delete_rdv'][0]['prenom'].' à '.$_SESSION['delete_rdv'][0]['heure_rdv']?></b> ?</p>
<form method="post" action="?action=delete_rdv&id=<?=$_GET['id'];?>">
                <input type="submit" value="Yes" name="oui">
                <input type="submit" value="Retour à la liste des RDV" name="non"></form>
    <ul>
		<li><a href="?action=liste_rdv_prat">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
