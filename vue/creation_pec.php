<!DOCTYPE html>
<html>
<head>
	<title>Création de prise en charge</title>
</head>
<body>
    <h1 style="text-align: center;">Créer une nouvelle prise en charge</h1>
    <div id="inscription" style="text-align: right; margin-right: 44%;">
        <form method="post" action="?action=pec&p=create">
            <p>Nom de la prise en charge : <input type="text" id="formu" name="nom"></p>
            <p>Tarif : <input type="number" id="formu" name="tarif"></p>
            <p>Durée de la consultation :</p>
            <p>30 minutes <input type="radio" id="formu" name="30" value="30"></p>
            <p>60 minutes<input type="radio" id="formu" name="60" value="60"></p>
            <p>
                <input type="submit" value="Valider" name="submit">
            </p>
        </form>
        <a href="?action=pec">Retour</a>

    </div>
</body>
</html>