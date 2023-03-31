<!DOCTYPE html>
<html>
<head>
	<title>Inscription User</title>
</head>
<body>
    <h1 style="text-align: center;">Inscription User</h1>
    <div id="inscription" style="text-align: right; margin-right: 44%;">
        <form method="post" action="?action=inscription_user">
            <p>Email : <input type="text" id="formu" name="mail"></p>
            <p>Mot de passe : <input type="text" id="formu" name="mdp"></p>
            <p>Nom : <input type="text" id="formu" name="nom"></p>
            <p>Prénom : <input type="text" id="formu" name="prenom"></p>
            <p>Adresse : <input type="text" id="formu" name="adresse"></p>
            <p>Ville : <input type="text" id="formu" name="ville"></p>
            <p>CP : <input type="text" id="formu" name="cp"></p>
            <p>Tel : <input type="text" id="formu" name="tel"></p>
            <p>Tuteur : <input type="text" id="formu" name="tuteur"></p>
            <p>Date de naissance  : <input type="datetime-local" id="formu" name="dn"></p>
            <p>Photo  : <input type="text" id="formu" name="photo"></p>
            <p>
                <input type="submit" value="Valider" name="submit">
            </p>
        </form>
    </div>
</body>
</html>