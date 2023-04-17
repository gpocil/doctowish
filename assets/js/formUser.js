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
            if (value === '') {
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

    function validateFormField(fieldName, fieldValue) {
        switch (fieldName) {
            case 'mail':
                if (!isEmail(fieldValue)) {
                    $('#mail').val('Format de mail invalide');
                    return false;
                }
                break;
            case 'cp':
                if (!isPostal(fieldValue)) {
                    $('#cp').val('Format de code postal invalide');
                    return false;
                }
                break;
            case 'tel':
                if (!isTel(fieldValue)) {
                    $('#tel').val('Format de numéro téléphonique invalide');
                    return false;
                }
                break;
            default:
                break;
        }
        return true;
    }
})