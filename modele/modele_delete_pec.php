<?php
require("modele/dao.php");

function delete_pec(){

    $list = typepec::read_typepec($_GET['id']);
    $prat_id = $list[0]['prat_id'];
    
    if ($prat_id !=$_SESSION['prat_id']){//Si la PEC n'appartient pas au prat
        $action = "accueil_prat";
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
    

}
?>