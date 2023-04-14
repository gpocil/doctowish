<?php
require("modele/dao.php");

function update_prat(){
$id=$_SESSION['compte_prat'][0]['id'];
$nom = $_SESSION['compte_prat'][0]['nom'];
$adresse = $_SESSION['compte_prat'][0]['adresse'];
$prenom = $_SESSION['compte_prat'][0]['prenom'];
$ville = $_SESSION['compte_prat'][0]['ville'];
$adeli = $_SESSION['compte_prat'][0]['n_adeli'];
$cp = $_SESSION['compte_prat'][0]['cp'];
$tel = $_SESSION['compte_prat'][0]['tel'];
$mail = $_SESSION['compte_prat'][0]['mail'];
$spec = $_SESSION['compte_prat'][0]['specialite'];
if(isset($_POST["nom"]) || isset($_POST["prenom"]) || (isset($_POST["adresse"]) || isset($_POST["cp"])|| isset($_POST["ville"])|| isset($_POST["spec"])|| isset($_POST["adeli"])|| isset($_POST["mail"])|| isset($_POST["tel"]))){
    if (!empty($_POST["nom"])){$nom=$_POST["nom"];}
    if (!empty($_POST["prenom"])){$prenom=$_POST["prenom"];}
    if (!empty($_POST["adresse"])){$adresse=$_POST["adresse"];}
    if (!empty($_POST["cp"])){$cp=$_POST["cp"];}
    if (!empty($_POST["ville"])){$ville=$_POST["ville"];}
    if (!empty($_POST["adeli"])){$adeli=$_POST["adeli"];}
    if (!empty($_POST["tel"])){$tel=$_POST["tel"];}
    if (!empty($_POST["spec"])){$spec=$_POST["spec"];}
    if (!empty($_POST["mail"])){$mail=$_POST["mail"];}
$_SESSION['name']=$nom;
$_SESSION['prenom']=$prenom;
praticien::update_prat($id, $nom, $prenom,$mail, $adresse, $ville, $cp, $tel, $spec, $adeli);
$action = "compte_prat";
	header("Location: ?action=" . $action);
	exit();

}

}
?>