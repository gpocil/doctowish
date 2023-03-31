<?php
session_start();
require("modele/dao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $adeli = $_POST['adeli'];
    $mdp = $_POST['password'];
    $user[] = praticien::read_prat_adeli($adeli);

    if (isset($user[0][0]['n_adeli'])) {
        
        $form_id = $user[0][0]['id'];
        $prat[] = login_prat::read_login_prat($form_id);
        $prat_id = $prat[0][0]['prat_id'];
        if ($form_id == $prat_id) {
            $password = $prat[0][0]['mdp'];
            if (password_verify($mdp, $password)) {
                $action = "accueil_prat";
                $redirection = redirigeVers($action);
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
require("vue/login_praticien.php");
