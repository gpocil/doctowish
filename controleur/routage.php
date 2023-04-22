<?php

/**
*	Module du routing (routage).
*	Chaque action est récupérée par la méthode : $_GET
*/

function redirigeVers($action="defaut") {
	
    $lesActions = [
        "defaut" => "Contr_defaut.php",
        "login_user" => "Contr_user.php",
        "login_prat" => "Contr_prat.php",
        "inscription_prat" => "Contr_prat.php", 
        "inscription_user" => "Contr_prat.php", 
        "accueil_prat" => "Contr_prat.php",
        "accueil_user" => "Contr_user.php",
        "logout" => "Contr_logout.php",
        "pec" => "Contr_prat.php",
        "liste_users" => "Contr_prat.php",
        "compte_prat" => "Contr_prat.php",
        "liste_rdv_prat" => "Contr_prat.php",
        "ajout_rdv" => "Contr_prat.php",
        "liste_rdv" => "Contr_user.php",
        "error" => "Controleur_error.php",
        "admin" => "Contr_admin.php",
        "login_admin" => "Contr_admin.php"
    ];
    


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