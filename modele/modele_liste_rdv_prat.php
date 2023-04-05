<?php
require("modele/dao.php");
function listing_rdv(){

$rdv_arr = rdv::read_rdv_prat_id(140);
$_SESSION['liste_rdv']=$rdv_arr;
}


?>