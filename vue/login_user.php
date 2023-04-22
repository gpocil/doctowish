<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="../assets/css/login_user.css">

    <title>Page de connexion - DoctoWish</title>
    <link rel="icon" type="image/png" sizes="220x220" href="assets/img/favicon.png">

</head>
<body>
    <h1>Connexion Utilisateur</h1>

    <form method="POST" action="?action=login_user">
        <label for="username">EMAIL :</label>
        <input type="text" name="email" id="email" required>

        <br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <br>

        <input type="submit" value="Se connecter">

        <a href="?action=defaut"> Retour </a>

        <img id = "logo" src="assets/img/Doctowish-logo.png">

    </form>

</body>
</html>