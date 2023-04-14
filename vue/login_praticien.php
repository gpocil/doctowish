<!DOCTYPE html>
<link rel="stylesheet" href="../asset/css/login_prat.css">

<html>
<head>
    <title>Page de connexion</title>
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
    <img id = "logo" src="asset/img/Doctowish-logo.png">



</body>
</html>