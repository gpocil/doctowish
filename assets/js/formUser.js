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
		let isValid = true;
		fields.forEach(({
			name,
			selector
		}) => {
			let value = $(selector).val();
			if (value === '') {
				$(`#${name}-info`).fadeIn("slow").fadeOut("slow");
				isValid = false;
			}
		});
	});

	// Boucle  les champs de formulaire et effectuer la validation
	for (let i = 0; i < formFields.length; i++) {
		if (formFields[i] == "") {
			$(`#${fieldNames[i]}-info`).fadeIn("slow");
			$(`#${fieldNames[i]}-info`).fadeOut("slow");
			isValid = false;
		}
	}

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
			default:
				break;
		}
		return true;
	}

	if (isValid) {
		let formData = new FormData;
		formData.append("clef", "valeur");
		formData.append("nom", $('#nom').val());
		formData.append("prenom", $('#prenom').val());
		formData.append("adresse", $('#adresse').val());
		formData.append("ville", $('#ville').val());
		formData.append("cp", $('#cp').val());
		formData.append("tel", $('#tel').val());
		formData.append("dn", $('#dn').val());
		formData.append("pratID", $('#pratID').val());

		if (tuteur != '') {
			formData.append("tuteur", tuteur);
		}

		if (photo != '') {
			formData.append("photo", photo);
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

		// Réinitialiser le champ email en cliquant dessus s'il est invalide
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
	}
})