<?php

/**
*	Module du routing (routage).
*	Chaque action est récupérée par la méthode : $_GET
*/

function redirigeVers($action="defaut") {
	
    $lesActions = array();
    $lesActions["defaut"] = "defaut.php";
    $lesActions["login_user"] = "Controleur_login_user.php";
    $lesActions["login_prat"] = "Controleur_login_praticien.php";
    $lesActions["inscription_prat"] = "Controleur_inscription_praticien.php"; 
    $lesActions["inscription_user"] = "Controleur_inscription_user.php"; 
    $lesActions["accueil_prat"] = "Controleur_accueil_praticien.php";
    $lesActions["accueil_user"] = "Controleur_accueil_user.php";

if (isset($_GET['action'])){
	$controler_id = $lesActions[$action];

	//si le fichier n'existe pas :
	if(! file_exists(__DIR__ . '/'. $controler_id) ) die("Le fichier : " . $controler_id . " n'existe pas !");

	//si la clé "action" existe dans notre tableau "lesActions" :
    if (array_key_exists($action, $lesActions)) {
		// le fichier à inclure sera retourné :
        return $controler_id;
    } 
}
else {
        return $lesActions["defaut"];
    }
}

?>