<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Inscription User</title>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/validationForm.js"></script>
    <script src="../assets/js/formUser.js"></script>
</head>
<body>
    <h1 style="text-align: center;">Inscription User</h1>
    <form method="post" enctype="multipart/form-data">

    <div id="inscription" style="text-align: right; margin-right: 44%;">
           
            <p>Email* : <input type="text" id="mail" name="mail"></p>
            <p id="mail-info" style="display:none;">Adresse email obligatoire</p>

            <p>Mot de passe* : <input type="text" id="mdp" name="mdp"></p>
            <p id="mdp-info" style="display:none;">Mot de passe obligatoire</p>
            
            <p>Nom* : <input type="text" id="nom" name="nom"></p>
            <p id="nom-info" style="display:none;">Nom obligatoire</p>
            
            <p>Prénom* : <input type="text" id="prenom" name="prenom"></p>
            <p id="prenom-info" style="display:none;">Prénom obligatoire</p>
            
            <p>Adresse* : <input type="text" id="adresse" name="adresse"></p>
            
            
            <p>Ville* : <input type="text" id="ville" name="ville"></p>
            <p id="ville-info" style="display:none;">Ville obligatoire</p>
            
            <p>CP* : <input type="text" id="cp" name="cp"></p>
            <p id="cp-info" style="display:none;">Code postal obligatoire</p>
            
            <p>Tel* : <input type="text" id="tel" name="tel"></p>
            <p id="tel-info" style="display:none;">Numéro de téléphone obligatoire</p>
            
            <p>Tuteur : <input type="text" id="tuteur" name="tuteur"></p>
            <p>Date de naissance*  : <input type="date" id="dn" name="dn"></p>
            <p id="dn-info" style="display:none;">Date de naissance obligatoire</p>
            
            <p>Photo  : <input type="file" id="photo" name="photo"></p>
            <p>
                <input type="submit" value="Valider" name="submit">
            </p>
        </form>
    </div>
    <a href="?action=accueil_prat">Retour à l'accueil</a>

</body>
=======
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
            <p>Date de naissance  : <input type="date" id="formu" name="dn"></p>
            <p>Photo  : <input type="text" id="formu" name="photo"></p>
            <p>
                <input type="submit" value="Valider" name="submit">
            </p>
        </form>
    </div>
    <a href="?action=accueil_prat">Retour à l'accueil</a>

</body>
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
</html>