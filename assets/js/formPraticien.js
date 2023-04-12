$(document).ready(function () {
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
        // nom, prenom, mail, adresse, ville, cp, tel, specialite, adeli 
        let nom = $('#nom').val(),
            prenom = $('#prenom').val(),
            mail = $('#mail').val(),
            adresse = $('#adresse').val(),
            ville = $('#ville').val(),
            cp = $('#cp').val(),
            tel = $('#tel').val(),
            specialite = $('#specialite').val(),
            adeli = $('#adeli').val();

        let formFields = [nom, prenom, mail, adresse, ville, cp, tel, specialite, adeli];
        let fieldNames = ['Nom', 'Prénom', 'Email', 'Adresse', 'Ville', 'Code Postal', 'Téléphone', 'Spécialité', 'Adeli'];
        let isValid = true;

        // Loop through form fields and perform validation
        for (let i = 0; i < formFields.length; i++) {
            if (formFields[i] == "") {
                $(`#${fieldNames[i]}-info`).fadeIn("slow");
                $(`#${fieldNames[i]}-info`).fadeOut("slow");
                isValid = false;
            }
        }

        if (mail != '') {
            if (isEmail(mail) == false) {
                $('#mail').val('Format de mail invalide');
            }
        }

        if (cp != '') {
            if (isPostal(cp) == false) {
                $('#cp').val('Format de code postal invalide')
            }
        }

        if (tel != '') {
            if (isTel(tel) == false) {
                $('#tel').val('Format de numéro téléphonique invalide')
            }
        }


        if (adeli != '') {
            if (isAdeli(adeli) == false) {
                $('#adeli').val('Format de numéro Adélie invalide')
            }
        }

        if (isValid && nom != "" && prenom != "" && isEmail(mail) == true &&
            adresse != "" && ville != "" && isPostal(cp) == true &&
            isTel(tel) == true && specialite != "" && isAdeli(adeli) == true) {
            let formData = {
                "titre": $('#titre').text(),
                "nom": $('#nom').val(),
                "prenom": $('#prenom').val(),
                "mail": $('#mail').val(),
                "ville": $('#ville').val(),
                "cp": $('#cp').val(),
                "tel": $('#tel').val(),
                "specialite": $('#specialite').val(),
                "adeli": $('#adeli').val()
            };
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



            //-------------Réinitialisation champ 'Mail' au clic si erreur--------------
            $('#mail').on('click', function () {
                if (($('#mail').val()) === 'Format de mail invalide') {
                    $('#mail').val('');
                }
            })

            $('#cp').on('click', function () {
                if (($('#cp').val()) === 'Format de code postal invalide') {
                    $('#cp').val('');
                }
            })

            $('#adeli').on('click', function () {
                if (($('#adeli').val()) === 'Format de mail invalide') {
                    $('#adeli').val('');
                }
            })
        }
    })
})