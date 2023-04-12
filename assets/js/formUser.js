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

			$("#dn-info").append("Date de naissance obligatoire");
			$("#dn-info").hide();

			$("#pratID-info").append("Numéro de praticien obligatoire");
			$("#pratID-info").hide();

			//Au clic du bouton, si la valeur du champ est "", on fait apparaître et disparaître les strings
			$(".btnAction").on("click", function () {
				// nom, prenom, mail, adresse, ville, cp, tel, dn, prat_id:, tuteur:, photo 
				let nom = $('#nom').val(),
					prenom = $('#prenom').val(),
					mail = $('#mail').val(),
					adresse = $('#adresse').val(),
					ville = $('#ville').val(),
					cp = $('#cp').val(),
					tel = $('#tel').val(),
					dn = $('#dn').val(),
					pratID = $('#pratID').val(),
					tuteur = $('#tuteur').val(),
					photo = $('#photo').val();

				let formFields = [nom, prenom, mail, adresse, ville, cp, tel, dn, pratID];
				let fieldNames = ['Nom', 'Prénom', 'Email', 'Adresse', 'Ville', 'Code Postal', 'Téléphone', 'Date de Naissance', 'PratID'];
				let isValid = true;

				// Loop through form fields and perform validation
				for (let i = 0; i < formFields.length; i++) {
					if (formFields[i] == "") {
						$(`#${fieldNames[i]}-info`).fadeIn("slow");
						$(`#${fieldNames[i]}-info`).fadeOut("slow");
						isValid = false;
					}
				}

				if (isValid) {
					// Affichage alerte
					alert('Contenu du formulaire : \nNom : ' + nom + '\n' + 'Email : ' + mail + '\n' + 'Sujet : ' + subject + '\n' + 'Message : ' + msg + '\n');

					let formData = {
						nom: nom,
						prenom: prenom,
						mail: mail,
						adresse: adresse,
						ville: ville,
						cp: cp,
						tel: tel,
						dn: dn,
						pratID: pratID,
						tuteur: tuteur,
						photo: photo
					};

					// Send an AJAX request to the server
					$.ajax({
						url: '?action=inscription_user', // URL to submit the form
						type: 'POST', // HTTP method
						data: formData, // Form data to send
						success: function (response) {
							// Handle success response
							console.log(response); // Log the response for debugging
							alert('Form submitted successfully'); // Show a success message
							// Reset form fields
							$('form')[0].reset();
							// Do something with the response, if needed
						},
						error: function (xhr, status, error) {
							// Handle error response
							console.error(error); // Log the error for debugging
							alert('Error submitting form'); // Show an error message
							// Do something with the error, if needed
						}
					})

					// Reset email field on click if invalid
					$('#mail').on('click', function () {
						let mailVal = $('#mail').val();
						if (!isEmail(mailVal)) {
							$('#mail').val('');
						}
					});

					// Reset telephone field on click if invalid
					$('#tel').on('click', function () {
						let telVal = $('#tel').val();
						if (!isTel(telVal)) {
							$('#tel').val('');
						}
					});

					// Reset postal code field on click if invalid
					$('#cp').on('click', function () {
						let cpVal = $('#cp').val();
						if (!isPostal(cpVal)) {
							$('#cp').val('');
						}
					});
				}})})