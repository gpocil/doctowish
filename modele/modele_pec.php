<?php
require("modele/dao.php");

function read_pec(){
    $list = typepec::read_typepec_pratid($_SESSION['prat_id']);
$_SESSION['list_pec']=$list;

}
?>