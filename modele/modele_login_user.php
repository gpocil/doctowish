<?php 
require("modele/dao.php");

function login_user(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $mdp = $_POST['password'];
        
    
        $arr[] = user::read_user_mail($email);
        $name = $arr[0][0]['nom'];
        $prenom = $arr[0][0]['prenom'];
        $id = $arr[0][0]['id'];
        if (isset($arr[0][0]['mail'])) {
            $db_mail = $arr[0][0]['mail'];
            $db_id = $arr[0][0]['id'];
            $user[] = login_user::read_login_user($db_id);
            $db_mdp = $user[0][0]['mdp'];
            if (password_verify($mdp, $db_mdp)) {
                $_SESSION['name']=$name;
                $_SESSION['prenom']=$prenom;
                $_SESSION['user_id']=$id;
                $_SESSION['type']='user';
                $action = "accueil_user";
                var_dump($_SESSION);
                header("Location: ?action=" . $action);
                exit();
            } else {
                echo 'Mauvais MDP';
            }
        } else {
            echo 'Adresse mail non reconnue';
        }
    }
    
}

?>