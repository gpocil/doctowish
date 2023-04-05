<?php
require("modele/dao.php");

function update_user(){

    $id = $_GET['id'];
$arr = user::read_user_id($id);
$_SESSION['update_user']=$arr;
$nom=$_SESSION['update_user'][0]['nom'];
$prenom=$_SESSION['update_user'][0]['prenom'];
$mail=$_SESSION['update_user'][0]['mail'];
$adresse=$_SESSION['update_user'][0]['adresse'];
$ville=$_SESSION['update_user'][0]['ville'];
$cp=$_SESSION['update_user'][0]['cp'];
$prat_id=$_SESSION['update_user'][0]['prat_id'];
$tel=$_SESSION['update_user'][0]['date_naissance'];
$tuteur=$_SESSION['update_user'][0]['tuteur'];
$dn=$_SESSION['update_user'][0]['date_naissance'];
$photo=$_SESSION['update_user'][0]['photo'];

if(isset($_POST["nom"]) || isset($_POST["prenom"]) || isset($_POST["adresse"]) || isset($_POST["cp"])|| isset($_POST["ville"])|| isset($_POST["tuteur"])|| isset($_POST["mail"])|| isset($_POST["tel"])|| isset($_POST["dn"])|| isset($_POST["photo"])){
    if (!empty($_POST["nom"])){$nom=$_POST["nom"];}
    if (!empty($_POST["prenom"])){$prenom=$_POST["prenom"];}
    if (!empty($_POST["adresse"])){$adresse=$_POST["adresse"];}
    if (!empty($_POST["cp"])){$cp=$_POST["cp"];}
    if (!empty($_POST["ville"])){$ville=$_POST["ville"];}
    if (!empty($_POST["tel"])){$tel=$_POST["tel"];}
    if (!empty($_POST["mail"])){$mail=$_POST["mail"];}
    if (!empty($_POST["tuteur"])){$tuteur=$_POST["tuteur"];}
    if (!empty($_POST["photo"])){$photo=$_POST["photo"];}
    if (!empty($_POST["dn"])){$dn=$_POST["dn"];}
user::update_user($id, $nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $dn, $prat_id, $tuteur, $photo);
echo 'La prise en charge a bien été modifiée.';
$action = "liste_users";
$redirection = redirigeVers($action);
header("Location: ?action=" . $action);
exit();
}

}
?>