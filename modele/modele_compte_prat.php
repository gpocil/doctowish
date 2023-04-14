<?php
require("modele/dao.php");

function read_infos_prat(){
     $_SESSION['compte_prat'] = praticien::read_prat($_SESSION['prat_id']);
}
?>