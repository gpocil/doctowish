
    <?php
	if(sizeof($_SESSION['list_pec'][0])==0){
		echo 'Nous n\'avez pas encore de prise en charge renseignée. Cliquez ci-dessous pour en créer une.';
	}
	?>


<div style="width: 80%; margin: 0 auto;">
<div class="row row-cols-md-4 g-3">


	<?php
for ($i = 0; $i <= sizeof($_SESSION['list_pec'][0])-1; $i++) {
	$nom = $_SESSION['list_pec'][0][$i]['nom'];
	$tarif= $_SESSION['list_pec'][0][$i]['tarif'];
	$duree= $_SESSION['list_pec'][0][$i]['duree'];
    $id= $_SESSION['list_pec'][0][$i]['id'];

    	?>
<div class="col">
  <div class="card h-100" style="height: 300px!important;">
    <div class="card-body" style="height: 100%;">
      <p class="card-text">
        <?= $nom?>
        <ul>
          <li>Tarif : <?=$tarif ?> €</li>
          <li>Durée : <?= $duree ?> minutes</li>
        </ul>
      </p>
    </div>
    <div class="card-buttons">
      <a class="small-button" href='?action=pec&p=update&id=<?=$id?>'>Modifier</a>
      <a class="small-button" href='?action=pec&p=delete&id=<?=$id?>'>Supprimer</a>
    </div>
  </div>
</div>
					<?php
    	} 
    	?>
	</div></div>
	<ul>
    	<li><a href="?action=pec&p=create" class="large-link">Nouvelle prise en charge</a></li>
		<li><a href="?action=accueil_prat">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
