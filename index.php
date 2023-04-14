<<<<<<< HEAD
<?php 

require  __DIR__ .  "/controleur/routage.php";


/**
*	Controleur principal  
*/
$action = null;

if (isset($_GET["action"])) {
	$action = $_GET["action"];
}


//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = redirigeVers($action);
require  __DIR__ . "/controleur/" . $fichier;

=======
<?php 

require  __DIR__ .  "/controleur/routage.php";


/**
*	Controleur principal 156 
*/
$action = null;

if (isset($_GET["action"])) {
	$action = $_GET["action"];
}


//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = redirigeVers($action);
require  __DIR__ . "/controleur/" . $fichier;

>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>