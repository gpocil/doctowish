<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
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
    </form>

</body>
</html>