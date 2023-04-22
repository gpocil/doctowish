<style>
	#rdv_form {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background-color: #fff;
		padding: 20px;
		border-radius: 5px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		z-index: 9999;
	}


</style>

<form method="POST" action="?action=ajout_rdv"class="search-forms">
	<label for="username">Rechercher un patient par nom : </label>
	<input type="text" name="nom" id="nom" required>
	<input type="submit"class="btn btn-primary" value="Rechercher">
</form>
<form method="POST" action="?action=ajout_rdv"class="search-forms">
	<label for="username">Rechercher un patient par ville : </label>
	<input type="text" name="ville" id="ville" required>
	<input type="submit"class="btn btn-primary" value="Rechercher">

</form>

<div id="rdv_form" style="display:none;">
	<p>Ajouter un RDV pour le patient : <?= $_SESSION['creation_rdv'][0]['nom'] . ", " . $_SESSION['creation_rdv'][0]['prenom'] ?>
	<form method="POST" action="?action=ajout_rdv&id=<?= $_GET['id'] ?>">
		<input type="hidden" name="id" value="hidden">
		<label for="pec">Type de consultation : </label>
		<select name="id" id="pec-select">
			<option value="">--Choisir une prise en charge--</option>
			<?php
			foreach ($_SESSION['nom_pec'] as $key => $value) {

			?>
				<option value="<?= $value ?>"><?= $value ?></option>
			<?php } ?>
		</select><br>
		<label for="date">Date & heure : </label>
		<input type="datetime-local" name="date" id="date" required><br>
		<input type="submit" name="ajouter" value="Ajouter">
		<input type="submit" name="retour" value="Retour" formnovalidate>
	</form>


</div>

<script>
	if (window.location.search.indexOf('id=') > -1) {
		document.getElementById('rdv_form').style.display = 'block';
	}
</script>


				
		


<div style="width: 80%; margin: 0 auto;">
  <div class="row row-cols-md-4 g-3">

  <?php
if (sizeof($_SESSION['list_users'][0]) == 0) {
  echo 'Vous n\'avez pas encore de patients';
}
$counter = 0;
for ($i = 0; $i <= sizeof($_SESSION['list_users'][0]) - 1; $i++) {
  $id = $_SESSION['list_users'][0][$i]['id'];
  $nom = $_SESSION['list_users'][0][$i]['nom'];
  $prenom = $_SESSION['list_users'][0][$i]['prenom'];
  $adresse = $_SESSION['list_users'][0][$i]['adresse'];
  $ville = $_SESSION['list_users'][0][$i]['ville'];
  $cp = $_SESSION['list_users'][0][$i]['cp'];
  $dn = $_SESSION['list_users'][0][$i]['date_naissance'];
  $mail = $_SESSION['list_users'][0][$i]['mail'];
  $tel = $_SESSION['list_users'][0][$i]['tel'];
  $tuteur = $_SESSION['list_users'][0][$i]['tuteur'];
  $photo = $_SESSION['list_users'][0][$i]['photo'];
?>

  <div class="col">
    <div class="card h-100" style="height: 400px;">

      <div class="text-center" style="height: 40%;">
        <img src="<?=$photo?>" onclick="displayImage('<?=$photo?>')" style="max-height: 100%; max-width: 100%; object-fit: contain;" class="image-thumbnail">
      </div>

      <div class="card-body" style="height: 40%;">
        <p class="card-text">
          <?= $prenom . ' '.$nom ?>
        <ul>
          <li><?= $adresse . ', ' . $ville . ', ' . $cp ?></li>
          <li><?= $dn ?></li>
          <li><?= $mail ?></li>
          <li><?= $tuteur ?></li>
          <li><?= $tel ?></li>
        </ul>
        </p>
      </div>

      <div class="card-footer">
<div style="text-align:center;">
  <form method="post" action="?action=ajout_rdv&id=<?= $id ?>">
    <input type="submit" class="btn btn-primary" value="Ajouter un RDV" name="yes">
  </form>
</div>
</div>

    </div>
  </div>

<?php
}
?>  </div>
</div>

<li><a href="?action=accueil_prat">Retour</a></li>
<li><a href="?action=logout">Déconnexion</a></li>

