$(document).ready(function () {
    //On créé les string "champ obligatoire", et on les cache
    $("#nom-info").append("Nom obligatoire");
    $("#nom-info").hide();

    $("#prenom-info").append("Prénom obligatoire");
    $("#prenom-info").hide();

    $("#mail-info").append("Mail obligatoire");
    $("#mail-info").hide();

    $("#adresse-info").append("Adresse obligatoire");
    $("#adresse-info").hide();

    $("#ville-info").append("Ville obligatoire");
    $("#ville-info").hide();

    $("#cp-info").append("Code postal obligatoire");
    $("#cp-info").hide();

    $("#tel-info").append("Numéro de téléphone obligatoire");
    $("#tel-info").hide();

    $("#specialite-info").append("spécialité obligatoire");
    $("#specialite-info").hide();

    $("#adeli-info").append("Numéro Adeli obligatoire");
    $("#adeli-info").hide();

    //Au clic du bouton, si la valeur du champ est "", on fait apparaître et disparaître les strings
    $(".btnAction").on("click", function () {
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
                name: 'Spécialité',
                selector: '#specialite'
            },
            {
                name: 'Adeli',
                selector: '#adeli'
            }
        ];

        let isValid = true;

        fields.forEach(field => {
            let value = $(field.selector).val();

            if (value === '') {
                $(`#${field.name}-info`).fadeIn("slow").fadeOut("slow");
                isValid = false;
            }
        });

        function validateFormField(fieldName, fieldValue) {
            switch (fieldName) {
                case 'mail':
                    if (fieldValue !== '' && !isEmail(fieldValue)) {
                        $('#mail').val('Format de mail invalide');
                        return false;
                    }
                    break;
                case 'cp':
                    if (fieldValue !== '' && !isPostal(fieldValue)) {
                        $('#cp').val('Format de code postal invalide');
                        return false;
                    }
                    break;
                case 'tel':
                    if (fieldValue !== '' && !isTel(fieldValue)) {
                        $('#tel').val('Format de numéro téléphonique invalide');
                        return false;
                    }
                    break;
                case 'adeli':
                    if (fieldValue !== '' && !isAdeli(fieldValue)) {
                        $('#adeli').val('Format de numéro Adélie invalide');
                        return false;
                    }
                    break;
                default:
                    break;
            }
            return true;
        }

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
                data: formData, //verifier
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



            //-------------Réinitialisation champ 'Mail' au clic si erreur--------------
            $('#mail').on('click', function () {
                let mailVal = $('#mail').val();
                if (!isEmail(mailVal)) {
                    $('#mail').val('');
                }
            });

            // Réinitialiser le champ de téléphone en cliquant dessus s'il est invalide
            $('#tel').on('click', function () {
                let telVal = $('#tel').val();
                if (!isTel(telVal)) {
                    $('#tel').val('');
                }
            });

            // Réinitialiser le champ de code postal en cliquant dessus s'il est invalide
            $('#cp').on('click', function () {
                let cpVal = $('#cp').val();
                if (!isPostal(cpVal)) {
                    $('#cp').val('');
                }
            });

            // Réinitialiser le champ de numéro adeli en cliquant dessus s'il est invalide
            $('#adeli').on('click', function () {
                let cpVal = $('#adeli').val();
                if (!isPostal(cpVal)) {
                    $('#adeli').val('');
                }
            });
        }
    })
})