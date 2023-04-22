<h2>Liste de vos patients : </h2>
<script src="../assets//js/listing_users.js"></script>

<form method="POST" action="?action=liste_users"class="search-forms">
  <label for="username">Rechercher un patient par nom : </label>
  <input type="text" name="nom" id="nom" required>
  <input type="submit" class="btn btn-primary"value="Rechercher">
</form>
<form method="POST" action="?action=liste_users"class="search-forms">
  <label for="username">Rechercher un patient par ville : </label>
  <input type="text" name="ville" id="ville" required>
  <input type="submit" class="btn btn-primary"value="Rechercher">

</form>
<div id="overlay">
<img id="image-display">
</div>
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

      <div class="card-footer" style="height: 16%;">
  <div style="text-align:center;">
    <form class="patient-form-update" method="post" action="?action=liste_users&p=update&id=<?= $id ?>">
      <input type="submit" value="Modifier fiche patient" name="yes" class="btn btn-primary" style="margin-bottom: 3px;">
    </form>
    <form class="patient-form-delete" method="post" action="?action=liste_users&p=delete&id=<?= $id ?>">
      <input type="submit" value="Supprimer fiche patient" class="btn btn-primary" name="no" >
    </form>
  </div>

      </div>

    </div>
  </div>

<?php
}
?>

</div>
</div>

<li><a href="?action=accueil_prat">Retour</a></li>
<li><a href="?action=logout">Déconnexion</a></li>