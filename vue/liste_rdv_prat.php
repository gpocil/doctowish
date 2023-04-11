<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
    <h2 style="text-align: center;">Liste de RDV</h2>
	<div style="text-align: center;">
	<label for="pet-select">Filtrer par type de prise en charge :</label>

	<form method="get">
	<input type="hidden" name="action" value="liste_rdv_prat">
    <select name="id" id="pec-select">
        <option value="">--Choisir une prise en charge--</option>
        <option value="<?=$_SESSION['nom_pec'][1];?>"><?=$_SESSION['nom_pec'][1];?></option>
        <option value="<?=$_SESSION['nom_pec'][2];?>"><?=$_SESSION['nom_pec'][2]?></option>
        <option value="<?=$_SESSION['nom_pec'][3];?>"><?=$_SESSION['nom_pec'][3]?></option>
    </select>
    <button type="submit">Envoyer</button>
</form>



<?php
if(isset($_GET['pec']) && $_GET['pec'] != 'defaut') {
    $selected_value = $_GET['pec'];
echo $selected_value;}
?>
</select></div>

	<?php
	$counter = 0;
	for ($i = 0; $i <= sizeof($_SESSION['liste_rdv'][0])-1; $i++) {
		$id = $_SESSION['liste_rdv'][0][$i]['id'];
        $nom = $_SESSION['liste_rdv'][0][$i]['nom'];
		$prenom = $_SESSION['liste_rdv'][0][$i]['prenom'];
		$nom_user = $_SESSION['liste_rdv'][0][$i][1];
        $date_heure = str_replace(' ', ' à ', $_SESSION['liste_rdv'][0][$i]['heure_rdv']);
        $annulation = $_SESSION['liste_rdv'][0][$i]['annulation'];
	
		$counter++;
	?>
		<div class="news">
			<h3>
				<?php echo "RDV " . $counter . " : "; ?>
			</h3>
			<p>
				<?php
                echo '<br>Type de prise en charge : '.$nom;
				echo '<br>Patient : ' . $nom_user . ', ' . $prenom;
				echo "</br>Date & heure : " . $date_heure;
                if ($annulation == 1){
				echo '</br><div style="color:red""><strong>Le patient souhaite annuler le rdv</strong></div>'?>

                <form method="post" action="?action=delete_rdv&id=<?=$id?>">
				<input type="submit" value="Annuler le RDV" name="yes">
			    </form>
                <?php } ?>
				

			<br />
		<?php
	}

		?>
    <li><a href="?action=accueil_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>



</body>
</html>
