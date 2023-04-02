<?php 
session_set_cookie_params(0);
session_start();
if ($_SESSION['type']!='prat'){
	$action = "defaut";
	$redirection = redirigeVers($action);
	header("Location: ?action=" . $action);
	exit();
}
require("modele/dao.php");
$list = praticien::read_prat($_SESSION['prat_id']);
$_SESSION['compte_prat'] = $list;



require("vue/compte_prat.php");

?>