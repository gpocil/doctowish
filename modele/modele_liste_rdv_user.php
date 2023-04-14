<?php
require("modele/dao.php");

function listing_rdv_user_id(){
          $_SESSION['liste_rdv'] = rdv::read_rdv_user_id($_SESSION['user_id']);
}
function delete_rdv_user(){
if (isset($_GET['id'])&& $_GET['id']!=""){
    $delete = rdv::read_rdv_id($_GET['id']);
    if ($_SESSION['user_id']==$delete[0]['user_id']){// Si le rdv appartient au patient
        if(isset($_POST['oui'])){
            rdv::cancel_rdv($_GET['id']);
            $action = "liste_rdv_user";
            header("Location: ?action=" . $action);
            exit();


        } 
        if(isset($_POST['non'])){
            $action = "liste_rdv_user";
        header("Location: ?action=" . $action);
        exit();
  
        } 
        




    }
    else{
        $action = "liste_rdv_user";
        header("Location: ?action=" . $action);
        exit();
    }
}


}


?>