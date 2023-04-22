<?php
require_once('modele/dao.php');

class contr_rdv extends rdv
{

    public static function listing_rdv()
    {
        $_SESSION['liste_rdv'] = rdv::read_rdv_prat_id($_SESSION['prat_id']);
        $path = 'assets/rdv/'.$_SESSION['prat_id'];
            if (!file_exists($path)){//Si le dossier en question n'existe pas
            mkdir($path);//On le créé
            }
        $json = json_encode($_SESSION['liste_rdv']);
        $file = $path.'/rdv.json';
        file_put_contents($file, $json);

    }

    public static function listing_rdv_by_pec()
    {
        $typepec[] = array();
        $type_pec_arr = typepec::read_typepec_pratid($_SESSION['prat_id']);
        for ($i = 0; $i <= sizeof($type_pec_arr[0]) - 1; $i++) { //récupère les noms des PEC
            array_push($typepec, $type_pec_arr[0][$i]['nom']);
            $_SESSION['nom_pec'] = $typepec;
        }
        if (isset($_GET['id']) && $_GET['id'] != "") {
            unset($_SESSION['liste_rdv']); //Vider le tableau session_liste_rdv
            $_SESSION['liste_rdv'] = rdv::read_rdv_prat_id_nom($_SESSION['prat_id'], $_GET['id']); //Le re-remplir avec uiquement les rdv associés à un type de PEC et un ID praticien


        }
        if (isset($_GET['id']) && $_GET['id'] == "") {
            $action = "liste_rdv_prat";
            header("Location: ?action=" . $action);
            exit();
        }
    }
    public static function listing_rdv_by_date()
    {
        if (isset($_GET['date']) && $_GET['date'] != "") {
            unset($_SESSION['liste_rdv']); //Vider le tableau session_liste_rdv
            $_SESSION['liste_rdv'] = rdv::read_rdv_prat_id_date($_SESSION['prat_id'], $_GET['date']); //Le re-remplir avec uiquement les rdv associés à une date

        }

        if (isset($_GET['date']) && $_GET['date'] == "") {
            $action = "liste_rdv_prat";
            header("Location: ?action=" . $action);
            exit();
        }
    }

    public static function creation_rdv()
    {

        //Récupérer type de pec si array vide
        $typepec = array();
        $type_pec_arr = typepec::read_typepec_pratid($_SESSION['prat_id']); //récup les typepec prat
        for ($i = 0; $i <= sizeof($type_pec_arr[0]) - 1; $i++) {
            $typepec[$type_pec_arr[0][$i]['id']] = $type_pec_arr[0][$i]['nom']; //Tableau associatif pour connecter en clef l'id PEC avec le nom de la PEC en valeur pour la fonction create_rdv
            $_SESSION['nom_pec'] = $typepec; // stockage du tableau dans la variable de session
        }
 

        if (isset($_GET['id'])) {
            $_SESSION['creation_rdv'] = user::read_user_id($_GET['id']);
            if ($_SESSION['creation_rdv'][0]['prat_id'] != $_SESSION['prat_id']) { //Bloque l'accès si le patient ne correspond pas au prat
                $action = "ajout_rdv";
                header("Location: ?action=" . $action);
                exit();
            } else {
                if (isset($_POST['ajouter'])) {
                    $id = array_search($_POST['id'], $typepec); //Récupère l'id de la PEC en récupérant la clef associée au string de post dans le tableau associatif
                    echo $id;
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

    public static function suppr_rdv_prat()
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
            $action = "liste_rdv_prat";
            header("Location: ?action=" . $action);
            exit();
        } else {
            $_SESSION['delete_rdv'] = rdv::read_rdv_id($rdv_id);
            if (isset($_POST['oui'])) {
                rdv::delete_rdv($rdv_id);
                $action = "liste_rdv_prat";
                header("Location: ?action=" . $action);
                exit();
            }
            if (isset($_POST['non'])) {
                $action = "liste_rdv_prat";
                header("Location: ?action=" . $action);
                exit();
            }
        }
    }

    public static function listing_rdv_user_id()
    {
        $_SESSION['liste_rdv'] = rdv::read_rdv_user_id($_SESSION['user_id']);
    }


    public static function suppr_rdv_user()
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $delete = rdv::read_rdv_id($_GET['id']);
            if ($_SESSION['user_id'] == $delete[0]['user_id']) { // Si le rdv appartient au patient
                if (isset($_POST['oui'])) {
                    //die("yes");
                    rdv::cancel_rdv($_GET['id']);
                    $action = "liste_rdv";
                    header("Location: ?action=" . $action);
                    // echo " <script>window.location.href='?action=liste_rdv'</script> ";
                    exit();
                }
                if (isset($_POST['non'])) {
                    // die("non");
                    $action = "liste_rdv";
                    header("Location: ?action=" . $action);
                    exit();
                }
            } else {
                $action = "liste_rdv";
                header("Location: ?action=" . $action);
                exit();
            }
        }
    }
}
