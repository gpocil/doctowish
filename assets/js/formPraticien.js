

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

    if ($("#nom").val() == "") {
        $("#nom-info").fadeIn("slow");
        $("#nom-info").fadeOut("slow");
    }

    if ($("#prenom").val() == "") {
        $("#prenom-info").fadeIn("slow");
        $("#prenom-info").fadeOut("slow");
    }

    if ($("#mail").val() == "") {
        $("#mail-info").fadeIn("slow");
        $("#mail-info").fadeOut("slow");
    }

    if ($("#adresse").val() == "") {
        $("#adresse-info").fadeIn("slow");
        $("#adresse-info").fadeOut("slow");
    }

    if ($("#ville").val() == "") {
        $("#ville-info").fadeIn("slow");
        $("#ville-info").fadeOut("slow");
    }

    if ($("#cp").val() == "") {
        $("#cp-info").fadeIn("slow");
        $("#cp-info").fadeOut("slow");
    }

    if ($("#tel").val() == "") {
        $("#tel-info").fadeIn("slow");
        $("#tel-info").fadeOut("slow");
    }

    if ($("#specialite").val() == "") {
        $("#specialite-info").fadeIn("slow");
        $("#specialite-info").fadeOut("slow");
    }

    if ($("#adeli").val() == "") {
        $("#adeli-info").fadeIn("slow");
        $("#adeli-info").fadeOut("slow");
    }

    if (mail != ''){
        if (isEmail(mail) == false){
            $('#mail').val('Format de mail invalide');
        }
    }

    if (cp != ''){
        if (isPostal(cp) == false){
            $('#cp').val('Format de code postal invalide')
        }
    }  

    if (tel != ''){
        if (isTel(tel) == false){
            $('#tel').val('Format de numéro téléphonique invalide')
        }
    }


    if (adeli != ''){
        if (isAdeli(adeli) == false){
            $('#adeli').val('Format de numéro Adélie invalide')
        }
    }
        
    if (nom != "" && prenom != "" && isEmail(mail)==true 
        && adresse !="" && ville != "" && isPostal(cp)==true && 
        isTel(tel)==true && specialite != "" && isAdeli(adeli)==true){
            //Affichage alerte
            alert('Contenu du formulaire : \nNom : ' + nom + '\n' + 'prenom' + prenom +
             '\n' + 'Email : ' + mail + '\n' + 'Ville : ' + ville + '\n' +
              'Code postal : ' + cp + '\n' + 'Téléphone : ' + tel + '\n' + 
              'Spécialité : ' + specialite + '\n');

            let formData = {
                "titre":$('#titre').text(),
                "nom":$('#nom').val(),
                "prenom":$('#prenom').val(),
                "mail":$('#mail').val(),
                "ville":$('#ville').val(),
                "cp":$('#cp').val(),
                "tel":$('#tel').val(),
                "specialite":$('#specialite').val(),
                "adeli":$('#adeli').val()
                };
                $.ajax({
                    url: 'index.php?action=inscription_prat',
                    // 'window.location.href="?action=inscription"
                    type:'POST',
                    data: formData,
                    error: function(){
                        alert('Erreur à définir');
                    },
                    success: function(retour) {
                        if (retour === 'err') {
                          $('#content').html("Erreur de traitement !");
                        } else {
                          $('#content').html(retour);
                        }
                      },
                    complete: function(){
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
})})
