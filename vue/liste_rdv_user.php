<style>
		#rdv_cancel {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background-color: #fff;
		padding: 20px;
		border-radius: 5px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	}	#message {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background-color: #fff;
		padding: 20px;
		border-radius: 5px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	}
</style>
	<h2 style="text-align: center;">Liste de RDV</h2>

	</select></div>



	<div style="width: 80%; margin: 0 auto;">
<div class="row row-cols-md-4 g-3">

	<?php
	for ($i = 0; $i <= sizeof($_SESSION['liste_rdv'][0]) - 1; $i++) {
		$id = $_SESSION['liste_rdv'][0][$i]['id'];
		$annulation = $_SESSION['liste_rdv'][0][$i]['annulation'];
		$pec = $_SESSION['liste_rdv'][0][$i][4];
		$praticien = $_SESSION['liste_rdv'][0][$i][1] . ' ' . $_SESSION['liste_rdv'][0][$i]['prenom'] . ', ' . $_SESSION['liste_rdv'][0][$i]['specialite'];
		$date_heure = str_replace(' ', ' à ', $_SESSION['liste_rdv'][0][$i]['heure_rdv']);

	
	?>
		<div class="col">
    <div class="card h-100" style="height: 400px;">
      <div class="card-body" style="height: 40%;">
        <p class="card-text">
          <?= $pec ?>
        <ul>
          <li><?= $praticien?></li>
          <li><?= $date_heure ?></li>

        </ul>
        </p>
      </div>

      <div class="card-footer" style="height: 30%;">
        <div style="text-align:center;">
		<?php if($annulation == 1){

echo '<div style="color:red""><strong>Une demande d\'annulation a été transmise au praticien</strong></div>';
}
else{?>
		<form method="post" action="?action=liste_rdv&id=<?= $id ?>">
<input type="submit" value="Annuler le RDV" name="cancel">
<?php  } ?>
</form>
        </div>
      </div>

    </div>
  </div>






  
<?php
}
?>


<div id="rdv_cancel" style="display:none;">
<input type="hidden" name="id" value="hidden">
<p>Êtes-vous sûr de vouloir demander l'annulation du RDV : <?= $pec . ', avec ' . $praticien . ', le ' . $date_heure . ' ?' ?>
<form method="POST">
<input type="hidden" name="id" value="hidden">
<div style="text-align:center">
<input type="submit" name="oui" value="Oui">
<input type="submit" name="non" value="Non">
</form>
</div>
</div>
</div>

		<script>
			if (window.location.search.indexOf('id=') > -1) {
				document.getElementById('rdv_cancel').style.display = 'block';
			}
			
				
		</script>


		<br />

		<li><a href="?action=accueil_user">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>


