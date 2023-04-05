<?php
require('dao.php');
function delete_rdv()
{
    $rdv_id = $_GET['id'];
    // Recherche du rendez-vous correspondant dans la liste des rendez-vous stockée dans la session
    $rdv_trouve = false;
    foreach ($_SESSION['liste_rdv'][0] as $rdv) {
        if ($rdv['id'] == $rdv_id) {
            // Vérification que l'ID du praticien du rendez-vous correspond à l'ID du praticien stocké dans la session
            if ($rdv['prat_id'] == $_SESSION['prat_id']) {
                $rdv_trouve = true;
            }
        }
    }
    if (!$rdv_trouve) {
        // Le rendez-vous n'a pas été trouvé dans la liste des rendez-vous stockée dans la session
        echo "Vous n'êtes pas autorisé à supprimer ce rendez-vous.";
    } else {
        $_SESSION['delete_rdv'] = rdv::read_rdv_id($rdv_id);
        if (isset($_POST['oui'])) {
            rdv::delete_rdv($rdv_id);
            $action = "liste_rdv_prat";
            header("Location: ?action=" . $action);
            exit();
        }if (isset($_POST['non'])) {
            $action = "liste_rdv_prat";
            header("Location: ?action=" . $action);
            exit();
        }
    }
}
