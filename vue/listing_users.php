<!DOCTYPE html>
<html>

<head>
	<title>Accueil praticien</title>
</head>

<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?= $_SESSION['name'] . " " . $_SESSION['prenom']; ?>.</p>
	<h2>Liste de vos patients : </h2>

	<form method="POST" action="?action=liste_users">
		<label for="username">Rechercher un patient par nom : </label>
		<input type="text" name="nom" id="nom" required>
		<input type="submit" value="Rechercher">
	</form>
	<form method="POST" action="?action=liste_users">
		<label for="username">Rechercher un patient par ville : </label>
		<input type="text" name="ville" id="ville" required>
		<input type="submit" value="Rechercher">

	</form>
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
		$counter++;
	?>
		<div class="news">
			<h3>
				<?php echo "Patient " . $counter . " : "; ?>
			</h3>
			<p>
				<?php
				echo '<br>' . $nom . ', ' . $prenom;
				echo "</br>Adresse : " . $adresse;
				echo "</br>Ville : " . $ville;
				echo "</br>Code postal : " . $cp;
				echo "</br>Date de naissance : " . $dn;
				echo "</br>Mail : " . $mail;
				echo "</br>N° Téléphone : " . $tel;
				echo "</br>Tuteur : " . $tuteur;
				?>
			<form method="post" action="?action=update_user&id=<?=$id?>">
				<input type="submit" value="Modifier fiche patient" name="yes">
			</form>
			<form method="post" action="?action=delete_user&id=<?=$id?>">
				<input type="submit" value="Supprimer fiche patient" name="no">
			</form>
			<br />
		<?php
	}
		?>
		<ul>
			<li><a href="?action=accueil_prat">Retour</a></li>
		</ul>
</body>

</html>