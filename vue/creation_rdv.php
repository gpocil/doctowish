<!DOCTYPE html>
<html>
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
   }
</style>

<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>






	<form method="POST" action="?action=ajout_rdv">
		<label for="username">Rechercher un patient par nom : </label>
		<input type="text" name="nom" id="nom" required>
		<input type="submit" value="Rechercher">
	</form>
	<form method="POST" action="?action=ajout_rdv">
		<label for="username">Rechercher un patient par ville : </label>
		<input type="text" name="ville" id="ville" required>
		<input type="submit" value="Rechercher">

	</form>

<div id="rdv_form" style="display:none;" >
<p>Ajouter un RDV pour le patient : <?=$_SESSION['creation_rdv'][0]['nom'].", ".$_SESSION['creation_rdv'][0]['prenom']?>
    <form method="POST" action="?action=ajout_rdv&id=<?=$_GET['id']?>">
   <input type="hidden" name="id" value="hidden">
   <label for="pec">Type de consultation : </label>
   <select name="id" id="pec-select">
        <option value="">--Choisir une prise en charge--</option>
        <option value="<?=$_SESSION['nom_pec'][10];?>"><?=$_SESSION['nom_pec'][10];?></option><!---------------------- TODO ------------------------------------------>
        <option value="<?=$_SESSION['nom_pec'][11];?>"><?=$_SESSION['nom_pec'][11]?></option>
        <option value="<?=$_SESSION['nom_pec'][13];?>"><?=$_SESSION['nom_pec'][13]?></option>
    </select><br>
		<label for="date">Date & heure : </label>
		<input type="datetime-local" name="date" id="date" required><br>
		<input type="submit" name="ajouter" value="Ajouter">
        <input type="submit" name="retour" value="Retour">
	</form>
  

</div>

    <script>
   if(window.location.search.indexOf('id=') > -1) {
      document.getElementById('rdv_form').style.display = 'block';
   }
</script>


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
			<form method="post" action="?action=ajout_rdv&id=<?=$id?>">
				<input type="submit" value="Ajouter un RDV" name="yes">
			</form>

			<br />
		<?php
	}
?>


    <li><a href="?action=accueil_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>



</body>
</html>
