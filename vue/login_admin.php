<!DOCTYPE html>
<link rel="stylesheet" href="../assets/css/login_prat.css">

<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
    <h1>Connexion Praticien</h1>

    <form method="POST" action="?action=login_admin">
        <label for="username">Username :</label>
        <input type="text" name="admin" id="admin" required>

        <br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <br>

        <input type="submit" value="Se connecter">
    </form>

    <img id = "logo" src="assets/img/Doctowish-logo.png">



</body>
</html>