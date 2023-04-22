<!DOCTYPE html>
<html>
<head>




<link rel="stylesheet" href="../assets/css/defaut.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="icon" type="image/png" sizes="220x220" href="assets/img/favicon.png">
    <title>Page de connexion - Doctowish</title>    <script src="/assets//js//jquery-2.1.1.min.js"></script>


    <title>Inscription Praticien</title>
</head>
<body>

<script>

    console.log('test');
    $(document).ready(function () {
        //On créé les string "champ obligatoire", et on les cache

        //Au clic du bouton, si la valeur du champ est "", on fait apparaître et disparaître les strings
        $(".btnAction").on("click", function () {
            let isValid = true;
            let fields = [{
                    name: 'Nom',
                    selector: '#nom'
                },
                {
                    name: 'Prénom',
                    selector: '#prenom'
                },
                {
                    name: 'Email',
                    selector: '#mail'
                },
                {
                    name: 'mdp',
                    selector: '#mdp'
                },
                {
                    name: 'Adresse',
                    selector: '#adresse'
                },
                {
                    name: 'Ville',
                    selector: '#ville'
                },
                {
                    name: 'Code Postal',
                    selector: '#cp'
                },
                {
                    name: 'Téléphone',
                    selector: '#tel'
                },
                {
                    name: 'Spécialité',
                    selector: '#specialite'
                },
                {
                    name: 'Adeli',
                    selector: '#adeli'
                }
            ];

            fields.forEach(field => {
                let value = $(field.selector).val();

                if (value == '') {
                    isValid = false;
                    // Add red border to input field with "*" if it's empty
                    $(field.selector).addClass("error");
                } else if (!validateFormField(field.name.toLowerCase(), value)) {
                    isValid = false;
                    // Add red border to input field with "*" if validation fails
                    $(field.selector).addClass("error");
                }
            });

            // Réinitialiser la couleur de bordure par défaut
            $('input[name="cp"], input[name="tel"], input[name="mail"]').css('border-color', '');
            // Ajouter un gestionnaire d'événement pour effacer le champ lorsqu'il est cliqué
            $('input[name="cp"], input[name="tel"], input[name="mail"]').on("focus", function () {
                $(this).val('');
            });


            if (isValid) {
                let formData = new FormData();
                formData.append("clef", "valeur");
                formData.append("titre", $('#titre').val());
                formData.append("nom", $('#nom').val());
                formData.append("prenom", $('#prenom').val());
                formData.append("mail", $('#mail').val());
                formData.append("cp", $('#cp').val());
                formData.append("tel", $('#tel').val());
                formData.append("specialite", $('#specialite').val());
                formData.append("adeli", $('#adeli').val());


                formData.append("action", "inscription");
                $.ajax({
                    url: 'index.php?action=inscription_prat',
                    type: 'POST',
                    data: formData,
                    error: function () {
                        alert('Erreur à définir');
                    },
                    success: function (retour) {
                        if (retour == 'err') {
                            $('#content').html("Erreur de traitement !");
                        } else {
                            $('#content').html(retour);
                        }
                    },
                    complete: function () {
                        $('#loading').hide();
                        $('#form').show();
                    }
                });
            }
        })
    })

  </script>



<h1 style="text-align: center;">Inscription Praticien</h1>

<div class = "container"style="width: 500px; height: 600px;">
<form method="post" enctype="multipart/form-data" class="row g-3">
<div class="col-md-6">
    <label for="prenom" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom">
  </div>
  <div class="col-md-6">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom">
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
    <label for="adeli" class="form-label">N° ADELI</label>
    <input type="text" class="form-control" id="adeli" name="adeli">
  </div>
  <div class="col-md-6">
    <label for="tel" class="form-label">Téléphone</label>
    <input type="int" class="form-control" id="tel" name="tel">
  </div>
  <div class="col-md-6">
    <label for="specialite" class="form-label">Spécialité</label>
    <input type="text" class="form-control" id="specialte" name="specialite">
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
    <input type="int" class="form-control" id="cp" name="cp">
  </div>
  <div class="col-12">
  <input type="submit" class="btn btn-primary" value="Valider" name="submit">
  </div>
</form>
</div>

<a href="?action=login_prat">Retour</a>

<img id = "logo" src="/assets/img/Doctowish-logo.png">


</body>
</html>