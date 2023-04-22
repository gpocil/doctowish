<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="../assets/css/login_prat.css">
<link rel="icon" type="image/png" sizes="220x220" href="assets/img/favicon.png">
    <title>Page de connexion - Doctowish</title>
</head>
<body>
    <h1>Connexion Praticien</h1>

    <form method="POST" action="?action=login_prat">
        <label for="username">N° ADELI :</label>
        <input type="text" name="adeli" id="adeli" required>

        <br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <br>

        <input type="submit" value="Se connecter">
    </form>

    <a href="?action=inscription_prat"> S'inscrire </a>
    <a href="?action=defaut"> Retour </a>
    <img id = "logo" src="assets/img/Doctowish-logo.png">



</body>
</html>