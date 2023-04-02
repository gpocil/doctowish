<?php 
session_set_cookie_params(0);
session_start();
if ($_SESSION['type']!='user'){
	$action = "defaut";
	$redirection = redirigeVers($action);
	header("Location: ?action=" . $action);
	exit();
}
require("modele/dao.php");
require("vue/accueil_user.php");

?>