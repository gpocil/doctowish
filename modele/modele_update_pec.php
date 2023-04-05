<?php
require("modele/dao.php");

function update_pec(){

    $list = typepec::read_typepec($_GET['id']);
$_SESSION['update_pec']=$list;
$id = $_GET['id'];
$nom=$_SESSION['update_pec'][0]['nom'];
$tarif=$_SESSION['update_pec'][0]['tarif'];
$duree=$_SESSION['update_pec'][0]['duree'];
if(isset($_POST["tarif"]) || isset($_POST["nom"]) || (isset($_POST["60"]) || isset($_POST["30"]))){
    if (!empty($_POST["tarif"])){$tarif=$_POST["tarif"];}
    if (!empty($_POST["nom"])){$nom=$_POST["nom"];}
    if (!empty($_POST["30"])){$duree=$_POST["30"];}
    if (!empty($_POST["60"])){$duree=$_POST["60"];}
typepec::update_typepec($id, $nom, $tarif, $_SESSION['prat_id'], $duree);
echo 'La prise en charge a bien été modifiée.';
$action = "pec";
$redirection = redirigeVers($action);
header("Location: ?action=" . $action);
exit();
}

}
?>