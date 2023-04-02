<?php
session_set_cookie_params(0);
session_start();
require("modele/dao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    $arr[] = user::read_user_mail($email);
    $name = $arr[0][0]['nom'];

    if (isset($arr[0][0]['mail'])) {
        $db_mail = $arr[0][0]['mail'];
        $db_id = $arr[0][0]['id'];
        $user[] = login_user::read_login_user($db_id);
        $db_mdp = $user[0][0]['mdp'];
        if (password_verify($mdp, $db_mdp)) {
            $_SESSION['name']=$name;
            $_SESSION['type']='user';
            $action = "accueil_user";
            var_dump($_SESSION);
            $redirection = redirigeVers($action);
            header("Location: ?action=" . $action);
            exit();
        } else {
            echo 'Mauvais MDP';
        }
    } else {
        echo 'Adresse mail non reconnue';
    }
}
require("vue/login_user.php");
