<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" href="../assets/css/listing_users.css">
<script src="../assets//js/listing_users.js"></script>
	<title>Accueil praticien</title>
</head>

<body>
	
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?= $_SESSION['name'] . " " . $_SESSION['prenom']; ?>.</p>
	<h2>Liste de vos patients : </h2>
	<div id="overlay">
  <img id="image-display">
</div>

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
echo '<div class="patient-row">';
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
  $counter++;
  ?>
  <div class="patient-box">
	<div id = "photo">

  <img src="<?=$photo?>" onclick="displayImage('<?=$photo?>')" style="max-width:30%" class="image-thumbnail">


	</div>
  <div id ="infos">
<ul>
<li><?=$prenom.' '.$nom?></li>
<li><?=$adresse.', '.$cp.', '.$ville?></li>
<li><?=$dn?></li>
<li><?=$mail?></li>
<li><?=$tel?></li>
<?php
if ($tuteur!=""){?>
<li>Tuteur : <?=$tuteur?></li>
<?php }?>
</ul>
  </div>
  <form class="patient-form-update" method="post" action="?action=liste_users&p=update&id=<?= $id ?>">
  <input type="submit" value="Modifier fiche patient" name="yes" style="margin-right: 10px;">
</form>
<form class="patient-form-delete" method="post" action="?action=liste_users&p=delete&id=<?= $id ?>">
  <input type="submit" value="Supprimer fiche patient" name="no">
</form>
    </div>

    <?php
    if ($counter % 3 == 0) {
      echo '</div><div class="patient-row">';
    }
  }
  echo '</div>';
  ?>
		
			<a href="?action=accueil_prat">Retour</a></li>
	
</body>

</html>