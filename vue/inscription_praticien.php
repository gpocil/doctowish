<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Inscription Praticien</title>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/validationForm.js"></script>
    <script src="../assets/js/formUser.js"></script>

    <title>Inscription Praticien</title>
</head>
<body>
    <h1 style="text-align: center;">Inscription Praticien</h1>
    <div id="inscription" style="text-align: right; margin-right: 44%;">
        <form method="post">
            
            <p>Email : <input type="text" id="mail" name="mail"></p>
            <p>Mot de passe : <input type="text" id="mdp" name="mdp"></p>
            
            <p>Nom : <input type="text" id="nom" name="nom"></p>
            <p id="nom-info" style="display:none;">Nom obligatoire</p>
            
            <p>Prénom : <input type="text" id="prenom" name="prenom"></p>
            <p id="prenom-info" style="display:none;">Prénom obligatoire</p>
            
            <p>Adresse : <input type="text" id="adresse" name="adresse"></p>
            <p id="adresse-info" style="display:none;">Adresse obligatoire</p>
            
            <p>Ville : <input type="text" id="ville" name="ville"></p>
            <p id="ville-info" style="display:none;">Ville obligatoire</p>
            
            <p>CP : <input type="text" id="cp" name="cp"></p>
            <p id="cp-info" style="display:none;">Code postal obligatoire</p>
            
            <p>Tel : <input type="text" id="tel" name="tel"></p>
            <p id="tel-info" style="display:none;">Numéro de téléphone obligatoire</p>
            
            <p>Spécialité : <input type="text" id="specialite" name="specialite"></p>
            <p id="specialite-info" style="display:none;">Specialité obligatoire</p>


            <p>N° Adeli : <input type="text" id="adeli" name="adeli"></p>
            <p id="adeli-info" style="display:none;">Numéro Adeli obligatoire</p>

            
            <p>
                <input type="submit" value="Valider" name="submit">
            </p>
        </form>
    </div>
</body>
=======
<!DOCTYPE html>
<html>
<head>
	<title>Inscription Praticien</title>
</head>
<body>
    <h1 style="text-align: center;">Inscription Praticien</h1>
    <div id="inscription" style="text-align: right; margin-right: 44%;">
        <form method="post" action="?action=inscription_prat">
            <p>Email : <input type="text" id="formu" name="mail"></p>
            <p>Mot de passe : <input type="text" id="formu" name="mdp"></p>
            <p>Nom : <input type="text" id="formu" name="nom"></p>
            <p>Prénom : <input type="text" id="formu" name="prenom"></p>
            <p>Adresse : <input type="text" id="formu" name="adresse"></p>
            <p>Ville : <input type="text" id="formu" name="ville"></p>
            <p>CP : <input type="text" id="formu" name="cp"></p>
            <p>Tel : <input type="text" id="formu" name="tel"></p>
            <p>Spécialité : <input type="text" id="formu" name="specialite"></p>
            <p>N° Adeli : <input type="text" id="formu" name="adeli"></p>
            <p>
                <input type="submit" value="Valider" name="submit">
            </p>
        </form>
    </div>
</body>
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
</html>