    <h1 style="text-align: center;">Modifier la prise en charge</h1>

    <div style="text-align:right;">
    <div id="inscription" style="text-align: right;">
        <form method="post" action="?action=pec&p=update&id=<?=$_GET['id'];?>">
        <p>Nom : <?=$_SESSION['update_pec'][0]['nom']?></p>
            <p><b>Modifier : </b><input type="text" id="formu" name="nom"></p>
            <p>Tarif : <?=$_SESSION['update_pec'][0]['tarif']?> €</p>
            <p><b>Modifier : </b><input type="number" id="formu" name="tarif"></p>
            <p>Durée de la consultation : <?=$_SESSION['update_pec'][0]['duree']?> minutes</p>
            <p><b>Modifier :</b> </p>
          
  <p>30 minutes <input type="radio" id="30min" name="30" value="30"></p>
  <p>60 minutes <input type="radio" id="60min" name="60" value="60"></p>
  <p>
                <input type="submit" class="btn btn-primary" value="Valider" name="submit">
            </p>
        </form></div></div>



    <ul>
		<li><a href="?action=pec">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>

