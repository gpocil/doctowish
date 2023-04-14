<?php
require("modele/dao.php");

function read_pec(){
    $_SESSION['list_pec'] = typepec::read_typepec_pratid($_SESSION['prat_id']);

}
?>