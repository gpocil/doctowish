<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
    <body>
    <h1 style="text-align: center;">Modifier la fiche patient</h1>
    <div id="inscription" style="text-align: right; margin-right: 44%;">
        <form method="post" action="?action=update_user&id=<?=$_GET['id'];?>">
        <p>Nom : <?=$_SESSION['update_user'][0]['nom']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="nom"></p>
            <p>Prénom : <?=$_SESSION['update_user'][0]['prenom']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="prenom"></p>
            <p>Mail : <?=$_SESSION['update_user'][0]['mail']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="mail"></p>
            <p>Adresse : <?=$_SESSION['update_user'][0]['adresse']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="adresse"></p>
            <p>Ville : <?=$_SESSION['update_user'][0]['ville']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="ville"></p>
            <p>Code postal : <?=$_SESSION['update_user'][0]['cp']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="cp"></p>
            <p>Date de naissance : <?=$_SESSION['update_user'][0]['date_naissance']?></p>
            <p><b>Modifier : </b><input type="date" id="formu" name="dn"></p>
            <p>Téléphone : <?=$_SESSION['update_user'][0]['tel']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="tel"></p>
            <p>Tuteur : <?=$_SESSION['update_user'][0]['tuteur']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="tuteur"></p>
            <p>Photo : <?=$_SESSION['update_user'][0]['photo']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="photo"></p>
                <input type="submit" value="Valider" name="submit">
        </form></div>




    <ul>
    	<li><a href="?action=creation_pec">Créer une nouvelle prise en charge</a></li>
		<li><a href="?action=pec">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
