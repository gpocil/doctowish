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
$list = typepec::read_typepec($_GET['id']);
$prat_id = $list[0]['prat_id'];

if ($prat_id !=$_SESSION['prat_id']){
    $action = "accueil_prat";
	$redirection = redirigeVers($action);
	header("Location: ?action=" . $action);
	exit();
}

$_SESSION['delete_pec']=$list;
$id = $_SESSION['delete_pec'][0]['id'];

if (isset($_POST['yes'])){
typepec::delete_typepec($id);
$action = "pec";
$redirection = redirigeVers($action);
header("Location: ?action=" . $action);
exit();

}

if (isset($_POST['no'])){
    $action = "pec";
	$redirection = redirigeVers($action);
	header("Location: ?action=" . $action);
	exit();
}

require("vue/delete_pec.php");
?>