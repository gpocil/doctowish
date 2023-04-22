
    <h1 style="text-align: center;">Inscription de patient</h1>


    <div class = "container"style="width: 500px; height: 600px;">
    <form method="post" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="mail" class="form-control" id="prenom" name="prenom">
      </div>
      <div class="col-md-6">
        <label for="nom" class="form-label">Nom</label>
        <input type="mail" class="form-control" id="nom" name="nom">
      </div>
      <div class="col-md-6">
        <label for="mail" class="form-label">Email</label>
        <input type="mail" class="form-control" id="mail" name="mail">
      </div>
      <div class="col-md-6">
        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="mdp" name="mdp">
      </div>
      <div class="col-md-6">
        <label for="tel" class="form-label">Téléphone</label>
        <input type="text" class="form-control" id="tel" name="tel">
      </div>
      <div class="col-md-6">
        <label for="tuteur" class="form-label">Tuteur</label>
        <input type="text" class="form-control" id="tuteur" name="tuteur">
      </div>
      <div class="col-12">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="adresse" placeholder="12 rue des Poules" name ="adresse">
      </div>
      <div class="col-md-6">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville">
      </div>
      <div class="col-md-2">
        <label for="cp" class="form-label">C. Postal</label>
        <input type="text" class="form-control" id="cp" name="cp">
      </div>
      <div class="col-md-6">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg, image/png">
      </div>      <div class="col-md-6">
        <label for="dn" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" id="dn" name="dn">
      </div>
      <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Valider" name="submit">
      </div>
    </form>
</div>

    <a href="?action=accueil_prat">Retour à l'accueil</a>
