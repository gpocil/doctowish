<?php
require("modele/dao.php");


function listing_rdv(){
$rdv_arr = rdv::read_rdv_prat_id($_SESSION['prat_id']);
$_SESSION['liste_rdv']=$rdv_arr;
}


function listing_rdv_by_pec(){
$typepec[] = array();
    $type_pec_arr=typepec::read_typepec_pratid($_SESSION['prat_id']);
    for ($i=0; $i<=sizeof($type_pec_arr[0])-1; $i++){
        array_push($typepec, $type_pec_arr[0][$i]['nom'])  ;
        $_SESSION['nom_pec'] = $typepec;
    }
    if (isset($_GET['id']) && $_GET['id']!=""){
        unset($_SESSION['liste_rdv']);
        $_SESSION['liste_rdv']=rdv::read_rdv_prat_id_nom($_SESSION['prat_id'], $_GET['id']);


    }
    if(isset($_GET['id']) && $_GET['id']==""){
        $action = "liste_rdv_prat";
        header("Location: ?action=" . $action);
        exit();
    }

      }

?>