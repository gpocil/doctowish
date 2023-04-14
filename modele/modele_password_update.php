<<<<<<< HEAD
<?php 
require("modele/dao.php");

function password_update(){

    if (!empty($_POST['old']) && !empty($_POST['new']) && !empty($_POST['new_confirm'])){
        $arr=login_prat::read_login_prat($_SESSION['prat_id']);
        $pw_db = $arr[0]['mdp'];
        $pw_old = $_POST['old'];
        $pw_new = $_POST['new'];
        $pw_new_confirm = $_POST['new_confirm']; 
        if ($pw_new == $pw_new_confirm){
            if (password_verify($pw_old, $pw_db)){
                login_prat::update_login_prat($_SESSION['prat_id'], password_hash($pw_new, PASSWORD_DEFAULT));
                echo "le mdp a bien été modifi";
            }
            else {
                echo "Le mdp n'est pas valide";
            }
        }
        else{
            echo "Les deux mots de passe ne sont pas identiques";
        }
    }
    
    
}
=======
<?php 
require("modele/dao.php");

function password_update(){

    if (!empty($_POST['old']) && !empty($_POST['new']) && !empty($_POST['new_confirm'])){
        $arr=login_prat::read_login_prat($_SESSION['prat_id']);
        $pw_db = $arr[0]['mdp'];
        $pw_old = $_POST['old'];
        $pw_new = $_POST['new'];
        $pw_new_confirm = $_POST['new_confirm']; 
        if ($pw_new == $pw_new_confirm){
            if (password_verify($pw_old, $pw_db)){
                login_prat::update_login_prat($_SESSION['prat_id'], password_hash($pw_new, PASSWORD_DEFAULT));
                echo "le mdp a bien été modifi";
            }
            else {
                echo "Le mdp n'est pas valide";
            }
        }
        else{
            echo "Les deux mots de passe ne sont pas identiques";
        }
    }
    
    
}
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>