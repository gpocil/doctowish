<?php 

require  __DIR__ .  "/controleur/routage.php";


/**
*co    nnard	Controleur principal  
*/
$action = null;

if (isset($_GET["action"])) {
	$action = $_GET["action"];
}


//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = redirigeVers($action);
require  __DIR__ . "/controleur/" . $fichier;

?>