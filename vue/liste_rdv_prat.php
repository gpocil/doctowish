    <h2 style="text-align: center;">Liste de RDV</h2>
	<div style="text-align: center;">
	<label for="pet-select">Filtrer par type de prise en charge :</label>

	<form method="get">
	<input type="hidden" name="action" value="liste_rdv_prat">
    <select name="id" id="pec-select">
        <option value="">--Choisir une prise en charge--</option>
		<?php 
		for ($i = 1; $i <= sizeof($_SESSION['nom_pec']) - 1; $i++) {
?>
        <option value="<?=$_SESSION['nom_pec'][$i];?>"><?=$_SESSION['nom_pec'][$i];?></option>
		<?php } ?>
    </select>
    <button class="btn btn-primary" type="submit">Rechercher</button>


</form><br>	
<div style="display: flex; justify-content: center; align-items: center;">
  <div style="display: flex; flex-direction: column; align-items: center;">
    <label for="date">Filtrer par date :</label>
    <form method="get" style="display: flex; flex-direction: row; align-items: center;">
      <input type="hidden" name="action" value="liste_rdv_prat">
      <input type="date" name="date" id="date" required style="margin-right: 10px;">
      <button class="btn btn-primary" type="submit" style="margin-left: 10px;">Rechercher</button>
    </form>
  </div>
</div>
<a class="small-button" href='?action=liste_rdv_prat'>Réinitaliser</a>


</select></div>


<div style="width: 80%; margin: 0 auto;">
<div class="row row-cols-md-4 g-3">


	<?php
for ($i = 0; $i <= sizeof($_SESSION['liste_rdv'][0])-1; $i++) {
	$id = $_SESSION['liste_rdv'][0][$i]['id'];
	$nom = $_SESSION['liste_rdv'][0][$i]['nom'];
	$prenom = $_SESSION['liste_rdv'][0][$i]['prenom'];
	$nom_user = $_SESSION['liste_rdv'][0][$i][1];
	$date_heure = str_replace(' ', ' à ', $_SESSION['liste_rdv'][0][$i]['heure_rdv']);
	$annulation = $_SESSION['liste_rdv'][0][$i]['annulation'];

    	?>
<div class="col">
  <div class="card h-100" style="height: 300px!important;">
    <div class="card-body" style="height: 100%;">
      <p class="card-text">
        <?= $nom?>
        <ul>
          <li><?=$nom_user . ', ' . $prenom?></li>
		  <li><?=$date_heure?></li>
        </ul>
      </p>
    </div>
    <div class="card-buttons">
	<?php if ($annulation == 1){ ?>
		<div style="text-align:center; margin:auto">
    <strong style="color:red;">Le patient souhaite annuler le rendez-vous</strong><br>
    <form method="post" action="?action=liste_rdv_prat&p=delete&id=<?=$id?>">
        <input class="btn btn-primary" type="submit" value="Annuler le RDV" name="yes">
    </form>
</div>
<?php } ?>
    </div>
  </div>
</div>
					<?php
    	} 
    	?>
	</div></div>



    <li><a href="?action=accueil_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>
