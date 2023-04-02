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


if (!empty($_POST['old']) && !empty($_POST['new']) && !empty($_POST['new_confirm'])){
    $arr=login_prat::read_login_prat($_SESSION['prat_id']);
    $pw_db = $arr[0]['mdp'];
    $pw_old = $_POST['old'];
    $pw_new = $_POST['new'];
    $pw_new_confirm = $_POST['new_confirm']; 
    if ($pw_new == $pw_new_confirm){
        if (password_verify($pw_old, $pw_db)){
            login_prat::update_login_prat($_SESSION['prat_id'], password_hash($pw_new, PASSWORD_DEFAULT));
            echo "le mdp a bien été modifi";
        }
        else {
            echo "Le mdp n'est pas valide";
        }
    }
    else{
        echo "Les deux mots de passe ne sont pas identiques";
    }
}


require("vue/password_update.php");

?>