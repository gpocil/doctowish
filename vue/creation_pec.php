
<body>
    <h1 style="text-align: center;">Créer une nouvelle prise en charge</h1>
    <div id="inscription" style="text-align: right; ">
        <form method="post" action="?action=pec&p=create">
            <p>Nom de la prise en charge : <input type="text" id="formu" name="nom"></p>
            <p>Tarif : <input type="number" id="formu" name="tarif"></p>
            <p>Durée de la consultation :</p>
            <p>30 minutes <input type="radio" id="formu" name="30" value="30"></p>
            <p>60 minutes <input type="radio" id="formu" name="60" value="60"></p>
            <p>
                <input type="submit" class="btn btn-primary" value="Valider" name="submit">
            </p>
        </form>
        <a href="?action=pec">Retour</a>
        <script>
  const boutonsRadio = document.getElementsByName('duree');

  // Ajoute un écouteur d'événements à chaque bouton radio
  boutonsRadio.forEach(function(bouton) {
    bouton.addEventListener('change', function() {
      // Désélectionne tous les autres boutons radio
      boutonsRadio.forEach(function(autreBouton) {
        if (autreBouton !== bouton) {
          autreBouton.checked = false;
        }
      });
    });
  });
</script>

    </div>
</body>
</html>