<?php
require("modele/dao.php");

function delete_user(){
    $arr = user::read_user_id($_GET['id']);
    $prat_id = $arr[0]['prat_id'];
    
    if ($prat_id !=$_SESSION['prat_id']){
        $action = "accueil_prat";
        $redirection = redirigeVers($action);
        header("Location: ?action=" . $action);
        exit();
    }
    
    $_SESSION['delete_user']=$arr;
    $id = $_SESSION['delete_user'][0]['id'];
    
    if (isset($_POST['yess'])){
    user::delete_user($id);
    $action = "liste_users";
    $redirection = redirigeVers($action);
    header("Location: ?action=" . $action);
    exit();
    
    }
    
    if (isset($_POST['nope'])){
        $action = "liste_users";
        $redirection = redirigeVers($action);
        header("Location: ?action=" . $action);
        exit();
    }
    

}
?>