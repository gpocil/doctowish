$(document).ready(function(){
    // Attacher un gestionnaire d'événement de clic au bouton 'Valider'
    $('input[name="submit"]').on("click", function(event){
        // Empêcher la soumission du formulaire
        event.preventDefault();

        // Réinitialiser les messages d'erreur précédents
        $('input[name="cp"]').css('border-color', '');
        $('input[name="adeli"]').css('border-color', '');
        $('input[name="tel"]').css('border-color', '');
        $('input[name="mail"]').css('border-color', '');

        // Valider les champs du formulaire
        var cp = $('input[name="cp"]').val();
        var adeli = $('input[name="adeli"]').val();
        var tel = $('input[name="tel"]').val();
        var mail = $('input[name="mail"]').val();

        if (mail !== '' && !validateFormField('mail', mail)) {
            $('input[name="mail"]').val('Format de mail invalide').css('border-color', 'red');
        }
        if (cp !== '' && !validateFormField('cp', cp)) {
            $('input[name="cp"]').val('Format de code postal invalide').css('border-color', 'red');
        }
        if (tel !== '' && !validateFormField('tel', tel)) {
            $('input[name="tel"]').val('Format de numéro téléphonique invalide').css('border-color', 'red');
        }
        if (adeli !== '' && !validateFormField('adeli', adeli)) {
            $('input[name="adeli"]').val('Format de numéro Adélie invalide').css('border-color', 'red');
        }
    });

    // Fonction de validation pour les champs du formulaire
    function validateFormField(fieldName, fieldValue) {
        if (fieldValue === '') {
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

        // Réinitialiser la couleur de bordure par défaut
        $('input[name="' + fieldName + '"]').css('border-color', '');

        return true;
    }
});
