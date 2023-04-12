<?php
require("modele/dao.php");

function create_rdv()
{

    //Récupérer type de pec si array vide
    $typepec = array();
    $type_pec_arr = typepec::read_typepec_pratid($_SESSION['prat_id']);
    for ($i = 0; $i <= sizeof($type_pec_arr[0]) - 1; $i++) {
        $typepec[$type_pec_arr[0][$i]['id']] = $type_pec_arr[0][$i]['nom'];

        $_SESSION['nom_pec'] = $typepec; // stockage du tableau dans la variable de session
    }
    if (isset($_GET['id'])) {
        $_SESSION['creation_rdv'] = user::read_user_id($_GET['id']);
        if ($_SESSION['creation_rdv'][0]['prat_id'] != $_SESSION['prat_id']) {//Bloque l'accès si le patient ne correspond pas au prat
            $action = "ajout_rdv";
            header("Location: ?action=" . $action);
            exit();
        } 
        else {
            if (isset($_POST['ajouter'])) {
                $id = array_search($_POST['id'], $typepec); //Récupère l'id de la PEC
                rdv::create_rdv($_GET['id'], $id, 0, $_POST['date']);
            }

            if (isset($_POST['retour'])) {
                $action = "ajout_rdv";
                header("Location: ?action=" . $action);
                exit();
            }
        }
    }
}



function listing_users()
{

    $list = user::read_user_prat($_SESSION['prat_id']);
    $_SESSION['list_users'] = $list;

    if (isset($_POST['nom'])) {
        $list = user::read_user_name($_POST['nom'], $_SESSION['prat_id']);
        $_SESSION['list_users'] = $list;
    }
    if (isset($_POST['ville'])) {
        $list = user::read_user_ville($_POST['ville'], $_SESSION['prat_id']);
        $_SESSION['list_users'] = $list;
    }
}
