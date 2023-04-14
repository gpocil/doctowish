<<<<<<< HEAD
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

=======
<?php
require("modele/dao.php");


function listing_rdv(){
    $_SESSION['liste_rdv'] = rdv::read_rdv_prat_id($_SESSION['prat_id']);
}


function listing_rdv_by_pec(){
$typepec[] = array();
    $type_pec_arr=typepec::read_typepec_pratid($_SESSION['prat_id']);
    for ($i=0; $i<=sizeof($type_pec_arr[0])-1; $i++){//récupère les noms des PEC
        array_push($typepec, $type_pec_arr[0][$i]['nom'])  ;
        $_SESSION['nom_pec'] = $typepec;
    }
    if (isset($_GET['id']) && $_GET['id']!=""){
        unset($_SESSION['liste_rdv']);//Vider le tableau session_liste_rdv
        $_SESSION['liste_rdv']=rdv::read_rdv_prat_id_nom($_SESSION['prat_id'], $_GET['id']);//Le re-remplir avec uiquement les rdv associés à un type de PEC et un ID praticien


    }
    if(isset($_GET['id']) && $_GET['id']==""){
        $action = "liste_rdv_prat";
        header("Location: ?action=" . $action);
        exit();
    }

      }

>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>