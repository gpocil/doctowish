
    <h1 style="text-align: center;">Modifier la fiche patient</h1>

    <br><br><br><br>
        <div class = "container"style="width: 500px; height: 600px;">
    <form method="post" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="mail" class="form-control" id="prenom" name="prenom">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['prenom']?></div>
      </div>
      <div class="col-md-6">
        <label for="nom" class="form-label">Nom</label>
        <input type="mail" class="form-control" id="nom" name="nom">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['nom']?></div>

      </div>
      <div class="col-md-6">
        <label for="mail" class="form-label">Email</label>
        <input type="mail" class="form-control" id="mail" name="mail">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['mail']?></div>
      </div>
      <div class="col-md-6">
        <label for="tel" class="form-label">Téléphone</label>
        <input type="text" class="form-control" id="tel" name="tel">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['tel']?></div>

      </div>
      <div class="col-md-6">
        <label for="tuteur" class="form-label">Tuteur</label>
        <input type="text" class="form-control" id="tuteur" name="tuteur">
        <div id="emailHelp" class="form-text"><?php if (isset($_SESSION['update_user'][0]['tuteur'])){echo$_SESSION['update_user'][0]['tuteur'];} ?></div>
      </div>
      <div class="col-12">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="adresse" placeholder="12 rue des Poules" name ="adresse">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['adresse']?></div>

      </div>
      <div class="col-md-6">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['ville']?></div>

      </div>
      <div class="col-md-2">
        <label for="cp" class="form-label">C. Postal</label>
        <input type="text" class="form-control" id="cp" name="cp">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['cp']?></div>

      </div>
      <div class="col-md-6">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg, image/png">
      </div>      
      <div class="col-md-6">
        <label for="dn" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" id="dn" name="dn">
        <div id="emailHelp" class="form-text"><?=$_SESSION['update_user'][0]['date_naissance']?></div>

      </div>
      <div class="col-12">
      <div style="display: flex; justify-content: center;">

      <input type="submit" class="btn btn-primary" value="Valider" name="submit">
      </div>
      </div>
    </form>
</div>

<br><br><br>

    <ul>
		<li><a href="?action=liste_users">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>

