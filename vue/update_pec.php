<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
    <body>
    <h1 style="text-align: center;">Modifier la prise en charge</h1>
    <div id="inscription" style="text-align: right; margin-right: 44%;">
        <form method="post" action="?action=update_pec&id=<?=$_GET['id'];?>">
        <p>Nom : <?=$_SESSION['update_pec'][0]['nom']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="nom"></p>
            <p>Tarif : <?=$_SESSION['update_pec'][0]['tarif']?></p>
            <p><b>Modifier : </b><input type="number" id="formu" name="tarif"></p>
            <p>Durée de la consultation : <?=$_SESSION['update_pec'][0]['duree']?> minutes</p>
            <p><b>Modifier :</b> </p>
            <p>30 minutes <input type="radio" id="formu" name="30" value="30"></p>
            <p>60 minutes<input type="radio" id="formu" name="60" value="60"></p>
            <p>
                <input type="submit" value="Valider" name="submit">
            </p>
        </form></div>




    <ul>
    	<li><a href="?action=creation_pec">Créer une nouvelle prise en charge</a></li>
		<li><a href="?action=pec">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
