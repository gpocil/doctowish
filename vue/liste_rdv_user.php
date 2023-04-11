<!DOCTYPE html>
<html>
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

<head>
	<title>Accueil praticien</title>
</head>

<body>
	<h1>Bienvenue sur votre espace patient</h1>
	<p>Vous êtes connecté en tant que : <?= $_SESSION['name'] . " " . $_SESSION['prenom']; ?>.</p>
	<h2 style="text-align: center;">Liste de RDV</h2>

	</select></div>

	<?php
	$counter = 0;
	for ($i = 0; $i <= sizeof($_SESSION['liste_rdv'][0]) - 1; $i++) {
		$id = $_SESSION['liste_rdv'][0][$i]['id'];
		$annulation = $_SESSION['liste_rdv'][0][$i]['annulation'];
		$pec = $_SESSION['liste_rdv'][0][$i][4];
		$praticien = $_SESSION['liste_rdv'][0][$i][1] . ' ' . $_SESSION['liste_rdv'][0][$i]['prenom'] . ', ' . $_SESSION['liste_rdv'][0][$i]['specialite'];
		$date_heure = str_replace(' ', ' à ', $_SESSION['liste_rdv'][0][$i]['heure_rdv']);

		$counter++;
	?>
		<div class="news">
			<h3>
				<?php echo "RDV " . $counter . " : "; ?>
			</h3>
			<p>
				<?php
				echo '<br>Type de prise en charge :' . $pec . '';
				echo '<br>Praticien : ' . $praticien;
				echo "</br>Date & heure : " . $date_heure;

					if($annulation == 1){

						echo '</br><div style="color:red""><strong>Une demande d\'annulation pour ce rendez-vous a été transmise au praticien</strong></div>';
					}
					else{?>
			<form method="post" action="?action=liste_rdv_user&id=<?= $id ?>">
				<input type="submit" value="Annuler le RDV" name="cancel">
			</form>
		<?php   }} ?>

		<div id="rdv_cancel" style="display:none;">
			<input type="hidden" name="id" value="hidden">

			<p>Êtes-vous sûr de vouloir demander l'annulation du RDV : <?= $pec . ', avec ' . $praticien . ', le ' . $date_heure . ' ?' ?>
			<form method="POST" action="?action=liste_rdv_user&id=<?= $_GET['id'] ?>">
				<input type="hidden" name="id" value="hidden">
				<div style="text-align:center">
					<input type="submit" name="oui" value="Oui">
					<input type="submit" name="non" value="Non">
			</form>
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



</body>

</html>