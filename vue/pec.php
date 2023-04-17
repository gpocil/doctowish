<!DOCTYPE html>
<html>
<head>
	<title>Accueil praticien</title>
</head>
<body>
	<h1>Bienvenue sur votre espace praticien</h1>
	<p>Vous êtes connecté en tant que : <?=$_SESSION['name']." ".$_SESSION['prenom'];?>.</p>
    <?php
	if(sizeof($_SESSION['list_pec'][0])==0){
		echo 'Nous n\'avez pas encore de prise en charge renseignée. Cliquez ci-dessous pour en créer une.';
	}
for ($i = 0; $i <= sizeof($_SESSION['list_pec'][0])-1; $i++) {
	$nom = $_SESSION['list_pec'][0][$i]['nom'];
	$tarif= $_SESSION['list_pec'][0][$i]['tarif'];
	$duree= $_SESSION['list_pec'][0][$i]['duree'];
    $id= $_SESSION['list_pec'][0][$i]['id'];

    	?>
        	<div class="news">
            	<h3>
            	</h3>
            	<p>
                	<?php
					echo '<br>'.$nom;
                	echo "</br>Tarif : ".$tarif."€";
                    echo "</br>Durée : ".$duree." minutes.";
                    echo "</br><a href='?action=pec&p=update&id=".$id."'>Modifier la prise en charge</a>";
                    echo "</br><a href='?action=pec&p=delete&id=".$id."'>Supprimer la prise en charge</a>";

                	?>
					<?php
    	} 
    	?>
	<ul>
    	<li><a href="?action=pec&p=create">Créer une nouvelle prise en charge</a></li>
		<li><a href="?action=accueil_prat">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
</body>
</html>
