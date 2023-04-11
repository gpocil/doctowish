<?php 
require("modele/dao.php");

function login_prat(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adeli = $_POST['adeli'];
        $mdp = $_POST['password'];
        $user[] = praticien::read_prat_adeli($adeli);
        $name = $user[0][0]['nom'];
        $prat_id=$user[0][0]['id'];
            
        if (isset($user[0][0]['n_adeli'])) {
            
            $form_id = $user[0][0]['id'];
            $prat[] = login_prat::read_login_prat($form_id);
            $prat_id = $prat[0][0]['prat_id'];
            if ($form_id == $prat_id) {
                $password = $prat[0][0]['mdp'];
                if (password_verify($mdp, $password)) {
                    $_SESSION['name']=$name;
                    $_SESSION['prenom']=$user[0][0]['prenom'];
                    ;
                    $_SESSION['type']="prat";
                    $_SESSION['prat_id']=$prat_id;
                    $action = "accueil_prat";
                    header("Location: ?action=" . $action);
                    exit();
                } else {
                    echo 'Login ou MDP inconnu';
                }
            }
        } else {
            echo "N° ADELI non reconnu";
        }
    }
    
}
?>