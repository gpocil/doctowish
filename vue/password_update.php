<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
<div id="mdp" style="text-align:center;">
<form method="POST" action="?action=password_update">
	<p>Ancien mot de passe : <input type="text" id="formu" name="old"></p>
            <p>Nouveau mot de passe : <input type="text" id="formu" name="new"></p>
            <p>Confirmer le nouveau mot de passe : <input type="text" id="formu" name="new_confirm"></p>
			<input type="submit" value="Confirmer">

</div>


    <li><a href="?action=compte_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>



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
<div id="mdp" style="text-align:center;">
<form method="POST" action="?action=password_update">
	<p>Ancien mot de passe : <input type="text" id="formu" name="old"></p>
            <p>Nouveau mot de passe : <input type="text" id="formu" name="new"></p>
            <p>Confirmer le nouveau mot de passe : <input type="text" id="formu" name="new_confirm"></p>
			<input type="submit" value="Confirmer">

</div>


    <li><a href="?action=compte_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>



</body>
</html>
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
