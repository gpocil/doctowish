<?php

/**
*	Module du routing (routage).
*	Chaque action est récupérée par la méthode : $_GET
*/

function redirigeVers($action="defaut") {
	
    $lesActions = array();
    $lesActions["defaut"] = "Controleur_defaut.php";
    $lesActions["login_user"] = "Controleur_login_user.php";
    $lesActions["login_prat"] = "Controleur_login_praticien.php";
    $lesActions["inscription_prat"] = "Controleur_inscription_praticien.php"; 
    $lesActions["inscription_user"] = "Controleur_inscription_user.php"; 
    $lesActions["accueil_prat"] = "Controleur_accueil_praticien.php";
    $lesActions["accueil_user"] = "Controleur_accueil_user.php";
    $lesActions["logout"] = "Controleur_logout.php";
    $lesActions["creation_pec"] = "Controleur_creation_pec.php";
    $lesActions["pec"] = "Controleur_pec.php";
    $lesActions["update_pec"] = "Controleur_update_pec.php";
    $lesActions["delete_pec"] = "Controleur_delete_pec.php";
    $lesActions["liste_users"] = "Controleur_listing_users.php";
    $lesActions["update_user"] = "Controleur_update_user.php";
    $lesActions["delete_user"] = "Controleur_delete_user.php";
    $lesActions["compte_prat"] = "Controleur_compte_prat.php";
    $lesActions["compte_prat_update"] = "Controleur_compte_prat_update.php";
    $lesActions["password_update"] = "Controleur_password_update.php";
    $lesActions["liste_rdv_prat"] = "Controleur_liste_rdv_prat.php";
    $lesActions["delete_rdv"] = "Controleur_delete_rdv.php";
    $lesActions["ajout_rdv"] = "Controleur_creation_rdv.php";
    $lesActions["liste_rdv_user"] = "Controleur_liste_rdv_user.php";
    $lesActions["calendrier"] = "Controleur_calendrier.php";
    $lesActions["new_rdv"] = "Controleur_rdv.php";
    $lesActions["error"] = "Controleur_error.php";
    
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