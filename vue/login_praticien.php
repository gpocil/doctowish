<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <form method="POST" action="login_handler.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>

        <br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <br>

        <input type="submit" value="Se connecter">
    </form>

    <a href="?action=page_inscription"> S'inscrire </a>


</body>
</html>