<?php
require("modele/dao.php");

function create_pec(){
    if(isset($_POST["tarif"]) && isset($_POST["nom"]) && (isset($_POST["60"]) || isset($_POST["30"]))){

        $tarif = $_POST["tarif"];
        $nom = $_POST["nom"];
        $prat_id=$_SESSION['prat_id'];
    
        if (isset($_POST["60"])){
            $duree=$_POST["60"];
        }
        if (isset($_POST["30"])){
            $duree=$_POST["30"];
        }
    typepec::create_typepec($nom, $tarif, $prat_id, $duree);
    }
    
}
?>