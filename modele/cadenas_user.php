<?php
function cadenas_user(){
if ($_SESSION['type']!='prat'){
	$action = "defaut";
	header("Location: ?action=" . $action);
	exit();
}}
?>