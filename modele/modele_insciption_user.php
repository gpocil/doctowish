<?php
require("modele/dao.php");

function inscription_user(){

    if (isset($_POST["mail"]) && isset($_POST["nom"]) && isset($_POST["mdp"]) && isset($_POST["prenom"]) &&  isset($_POST["adresse"]) &&  isset($_POST["ville"]) && isset($_POST["cp"]) && isset($_POST["dn"]) && isset($_POST["tel"]) && isset($_POST["tuteur"])) {
        $prat_id = $_SESSION['prat_id'];
        $mail = $_POST["mail"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresse = $_POST["adresse"];
        $ville = $_POST["ville"];
        $cp = $_POST["cp"];
        $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $tel = $_POST["tel"];
        $dn = $_POST["dn"];
        $tuteur = $_POST["tuteur"];
        $photo = $_POST["photo"];
        $array[] = user::read_user_mail($mail);//Vérif que le mail n'existe pas déjà dans la BD
        if (!isset($array[0][0]['mail'])) {
            user::create_user($nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $dn, $prat_id, $tuteur, $photo);//Création user
            $mail_user[] = user::read_user_mail($mail);
            $id =  $mail_user[0][0]['id'];
            login_user::create_login_user($id, $mdp);//Création login user
        } else {
            echo "Cette adresse mail existe déjà dans la DB";
        }
    }
    
}
?>