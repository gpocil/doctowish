<?php
include("modele/dao.php");
require("vue/inscription_praticien.php");

if(isset($_POST["mail"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) &&  isset($_POST["adresse"]) &&  isset($_POST["ville"]) && isset($_POST["cp"]) && isset($_POST["adeli"]) && isset($_POST["tel"]) && isset($_POST["specialite"])) {

    $mail=$_POST["mail"]; 
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $adresse=$_POST["adresse"];
    $ville=$_POST["ville"];
    $cp=$_POST["cp"];
    $adeli=$_POST["adeli"];
    $tel=$_POST["tel"];
    $spec=$_POST["specialite"];

    $array[] = praticien::read_prat_adeli($adeli);
    if (!isset($array[0][0]['n_adeli'])) {
    praticien::create_prat($nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $spec, $adeli);
    $adeli_prat[] = praticien::read_prat_adeli($adeli);
    $id =  $adeli_prat[0][0]['id'];
    login_prat::create_login_prat($id, $mdp);
    $action = "defaut";
$redirection = redirigeVers($action);
header("Location: ?action=" . $action);
exit();
    } 
    else 
    {
        echo "Ce numéro adeli est déja utilisé";
    }
    
}
?>