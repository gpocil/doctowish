<<<<<<< HEAD
<?php
require("modele/dao.php");

function listing_users(){

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

}

=======
<?php
require("modele/dao.php");

function listing_users(){

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

}

>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>