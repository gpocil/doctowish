<<<<<<< HEAD
<?php
function cadenas_user(){
if ($_SESSION['type']!='prat'){
	$action = "defaut";
	$redirection = redirigeVers($action);
	header("Location: ?action=" . $action);
	exit();
}}
=======
<?php
function cadenas_user(){
if ($_SESSION['type']!='prat'){
	$action = "defaut";
	header("Location: ?action=" . $action);
	exit();
}}
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>