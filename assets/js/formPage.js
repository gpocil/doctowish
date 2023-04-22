const urlParams = new URLSearchParams(window.location.search);
const action = urlParams.get('action');

function isEmail(mail) {
    let pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return pattern.test(mail);
}

function isPostal(cp) {
    let pattern = /^[0-9]{5}$/;
    return pattern.test(cp);
}

function isTel(tel) {
    let pattern = /^[0-9]{10}$/;
    return pattern.test(tel);
}

function isAdeli(adeli) {
    let pattern = /^[0-9]{9}$/;
    return pattern.test(adeli);
}
if (action == 'compte_prat'){
    console.log(action);
}


if (action === 'inscription_prat') {
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
} 
if (action === 'inscription_user') {
    $(document).ready(function () {
        //On créé les string "champ obligatoire", et on les cache
//
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
                    name: 'Date de Naissance',
                    selector: '#dn'
                },
                {
                    name: 'PratID',
                    selector: '#pratID'
                }
            ];
            fields.forEach(({
                name,
                selector
            }) => {
                let value = $(selector).val();
                if (value == '') {
                    isValid = false;
                    // Add red border via css to input field with "*" if it's empty
                    $(selector).addClass("error");
                }
                //Sinon, on vérifie si la valeur est valide pour les champs ayant une validation spécifique (email, code postal, numéro de téléphone)
                else if (!validateFormField(selector.substring(1), value)) {
                    isValid = false;
                    $(selector).addClass("error");
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
                formData.append("nom", $('#nom').val());
                formData.append("prenom", $('#prenom').val());
                formData.append("adresse", $('#adresse').val());
                formData.append("ville", $('#ville').val());
                formData.append("cp", $('#cp').val());
                formData.append("tel", $('#tel').val());
                formData.append("dn", $('#dn').val());
                formData.append("pratID", $('#pratID').val());

                if ($('#tuteur').val() != '') {
                    formData.append("tuteur", $('#tuteur').val());
                }

                if ($('#photo').val() != '') {
                    formData.append("photo", $('#photo').val());
                }


                formData.append("action", "inscription");

                // Envoyer une requête AJAX au serveur
                $.ajax({
                    url: 'index.php?action=inscription_user', // URL pour soumettre le formulaire
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Gérer la réponse en cas de succès
                        console.log(response); // Enregistrer la réponse pour le débogage
                        alert('Formulaire soumis avec succès'); // Afficher un message de succès
                        // Réinitialiser les champs du formulaire
                        $('form')[0].reset();
                        // Faire quelque chose avec la réponse, si nécessaire
                    },
                    error: function (xhr, status, error) {
                        // Gérer la réponse en cas d'erreur
                        console.error(error); // Enregistrer l'erreur pour le débogage
                        alert('Erreur lors de la soumission du formulaire'); // Afficher un message d'erreur
                        // Faire quelque chose avec l'erreur, si nécessaire
                    }
                })
            }


        })
    })
} 
if (action === 'update_user') {
    $(document).ready(function () {
        // Attacher un gestionnaire d'événement de clic au bouton 'Valider'
        $('input[name="submit"]').on("click", function (event) {

            // Réinitialiser les messages d'erreur précédents
            $('input[name="cp"]').css('border-color', '');
            $('input[name="tel"]').css('border-color', '');
            $('input[name="mail"]').css('border-color', '');

            // Valider les champs du formulaire
            var cp = $('input[name="cp"]').val();
            var tel = $('input[name="tel"]').val();
            var mail = $('input[name="mail"]').val();

            let isValid = true;
            if (mail !== '' && !validateFormField('mail', mail)) {
                $('input[name="mail"]').val('Format de mail invalide').css('border-color', 'red');
                isValid == false;
            }
            if (cp !== '' && !validateFormField('cp', cp)) {
                $('input[name="cp"]').val('Format de code postal invalide').css('border-color', 'red');
                isValid == false;
            }
            if (tel !== '' && !validateFormField('tel', tel)) {
                $('input[name="tel"]').val('Format de numéro téléphonique invalide').css('border-color', 'red');
                isValid == false;
            }

            if (isValid == false) {
                // Empêcher la soumission du formulaire
                event.preventDefault();
            }

        });

        // Réinitialiser la couleur de bordure par défaut
        $('input[name="' + fieldName + '"]').css('border-color', '');
        // Ajouter un gestionnaire d'événement pour effacer le champ lorsqu'il est cliqué
        $('input[name="cp"], input[name="tel"], input[name="mail"]').on("focus", function () {
            $(this).val('');
        });
        return true;
    });
}


 if (action == 'compte_prat&p=update') {
    console.log(action);
    console.log();
    $(document).ready(function () {

        // Attacher un gestionnaire d'événement de clic au bouton 'Valider'
        $('input[name="submit"]').on("click", function (event) {

            // Réinitialiser les messages d'erreur précédents
            $('input[name="cp"]').css('border-color', '');
            $('input[name="adeli"]').css('border-color', '');
            $('input[name="tel"]').css('border-color', '');
            $('input[name="mail"]').css('border-color', '');

            // Valider les champs du formulaire (déclare les variables pour être réutiliser plus bas)
            var cp = $('input[name="cp"]').val();
            var adeli = $('input[name="adeli"]').val();
            var tel = $('input[name="tel"]').val();
            var mail = $('input[name="mail"]').val();

            let isValid = true;
            if (mail !== '' && !validateFormField('mail', mail)) {
                $('input[name="mail"]').val('Format de mail invalide').css('border-color', 'red');
                isValid = false;
            }
            if (cp !== '' && !validateFormField('cp', cp)) {
                $('input[name="cp"]').val('Format de code postal invalide').css('border-color', 'red');
                isValid = false;
            }
            if (tel !== '' && !validateFormField('tel', tel)) {
                $('input[name="tel"]').val('Format de numéro téléphonique invalide').css('border-color', 'red');
                isValid = false;
            }
            if (adeli !== '' && !validateFormField('adeli', adeli)) {
                $('input[name="adeli"]').val('Format de numéro Adélie invalide').css('border-color', 'red');
                isValid = false;
            }

            if (isValid == false) {
                // Empêcher la soumission du formulaire
                event.preventDefault();
            }

        });


        // Réinitialiser la couleur de bordure par défaut
        $('input[name="' + fieldName + '"]').css('border-color', '');

        // Ajouter un gestionnaire d'événement pour effacer le champ lorsqu'il est cliqué
        $('input[name="cp"], input[name="adeli"], input[name="tel"], input[name="mail"]').on("focus", function () {
            $(this).val('');
        });

        return true;
    })
}


// Fonction de validation pour les champs du formulaire
function validateFormField(fieldName, fieldValue) {
    if (fieldValue == '') {
        // Champ vide, renvoyer vrai
        return true;
    }

    switch (fieldName) {
        case 'mail':
            if (!isEmail(fieldValue)) {
                $('input[name="mail"]').val('Format de mail invalide').css('border-color', 'red');
                return false;
            }
            break;
        case 'cp':
            if (!isPostal(fieldValue)) {
                $('input[name="cp"]').val('Format de code postal invalide').css('border-color', 'red');
                return false;
            }
            break;
        case 'tel':
            if (!isTel(fieldValue)) {
                $('input[name="tel"]').val('Format de numéro téléphonique invalide').css('border-color', 'red');
                return false;
            }
            break;
        case 'adeli':
            if (!isAdeli(fieldValue)) {
                $('input[name="adeli"]').val('Format de numéro Adélie invalide').css('border-color', 'red');
                return false;
            }
            break;
        default:
            break;
    }
    return true;
}


