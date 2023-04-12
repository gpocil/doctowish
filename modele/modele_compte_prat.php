<?php
require("modele/dao.php");

function read_infos_prat(){
$list = praticien::read_prat($_SESSION['prat_id']);
$_SESSION['compte_prat'] = $list;
}

?>