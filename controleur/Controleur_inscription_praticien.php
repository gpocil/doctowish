<?php
include("modele/dao.php");
require("vue/inscription_praticien.php");

if(isset($_POST["mail"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) &&  isset($_POST["adresse"]) &&  isset($_POST["ville"]) && isset($_POST["cp"]) && isset($_POST["adeli"]) && isset($_POST["tel"]) && isset($_POST["specialite"])) {

    $mail=$_POST["mail"]; 
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $adresse=$_POST["adresse"];
    $ville=$_POST["ville"];
    $cp=$_POST["cp"];
    $adeli=$_POST["adeli"];
    $tel=$_POST["tel"];
    $spec=$_POST["specialite"];

    praticien::create_prat($nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $spec, $adeli);
}
?>