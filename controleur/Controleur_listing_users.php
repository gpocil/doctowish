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
$list = user::read_user_prat($_SESSION['prat_id']);
$_SESSION['list_users']=$list;

if(isset($_POST['nom'])){
	$list = user::read_user_name($_POST['nom'], $_SESSION['prat_id']);
	$_SESSION['list_users']=$list;
}
if(isset($_POST['ville'])){
	$list = user::read_user_ville($_POST['ville'], $_SESSION['prat_id']);
$_SESSION['list_users']=$list;
}
require("vue/listing_users.php");
?>