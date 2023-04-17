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

            if (value === '') {
                isValid = false;
                // Add red border to input field with "*" if it's empty
                $(field.selector).addClass("error");
            } else if (!validateFormField(field.name.toLowerCase(), value)) {
                isValid = false;
                // Add red border to input field with "*" if validation fails
                $(field.selector).addClass("error");
            }
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
                    if (retour === 'err') {
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
            case 'adeli':
                if (!isAdeli(fieldValue)) {
                    $('#adeli').val('Format de numéro Adélie invalide');
                    return false;
                }
                break;
            default:
                break;
        }
        return true;
    }

})