<?php 
session_set_cookie_params(0);
session_start();
require("modele/dao.php");
if ($_SESSION['type']!='prat'){
	$action = "defaut";
	$redirection = redirigeVers($action);
	header("Location: ?action=" . $action);
	exit();
}
if(isset($_POST["tarif"]) && isset($_POST["nom"]) && (isset($_POST["60"]) || isset($_POST["30"]))){

    $tarif = $_POST["tarif"];
    $nom = $_POST["nom"];
    $prat_id=$_SESSION['prat_id'];

    if (isset($_POST["60"])){
        $duree=$_POST["60"];
    }
    if (isset($_POST["30"])){
        $duree=$_POST["30"];
    }

var_dump($_POST);

typepec::create_typepec($nom, $tarif, $prat_id, $duree);
echo "la prise en charge ".$nom." a bien été créée.";
}
require("vue/creation_pec.php");
?>