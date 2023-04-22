
<?php
	$nom = $_SESSION['compte_prat'][0]['nom'];
	$prenom = $_SESSION['compte_prat'][0]['prenom'];
	$adresse = $_SESSION['compte_prat'][0]['adresse'];
    $cp=$_SESSION['compte_prat'][0]['cp'];
    $ville=$_SESSION['compte_prat'][0]['ville'];
	$spec = $_SESSION['compte_prat'][0]['specialite'];
	$tel = $_SESSION['compte_prat'][0]['tel'];
	$mail = $_SESSION['compte_prat'][0]['mail'];
    $adeli = $_SESSION['compte_prat'][0]['n_adeli'];

    ?>

	<ul>
    <form method="post" action="?action=compte_prat&p=update">
    <li>Nom : <?=$nom?></li><input type="text" id="formu" name="nom"></p>
    <li>Prénom : <?=$prenom?></li><input type="text" id="formu" name="prenom"></p>
    <li>Adresse : <?=$adresse?></li><input type="text" id="formu" name="adresse"></p>
    <li>Ville : <?=$ville?></li><input type="text" id="formu" name="ville"></p>
    <li>Code Postal : <?=$cp?></li><input type="text" id="formu" name="cp"></p>
    <li>Spécialité : <?=$spec?></li><input type="text" id="formu" name="spec"></p>
    <li>N° Adeli : <?=$adeli?></li><input type="text" id="formu" name="adeli"></p>
    <li>Téléphone : <?=$tel?></li><input type="text" id="formu" name="tel"></p>
    <li>Mail : <?=$mail?></li><input type="text" id="formu" name="mail"></p>
    <div style="text-align: center;">
  <input type="submit" class="btn btn-primary" value="Valider" name="submit">
</div>


	</ul>

	<ul>
    <li><a href="?action=compte_prat">Retour</a></li>
    <li><a href="?action=logout">Déconnexion</a></li>
	</ul>

