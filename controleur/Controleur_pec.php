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
$list = typepec::read_typepec_pratid($_SESSION['prat_id']);
$_SESSION['list_pec']=$list;

require("vue/pec.php");
?>