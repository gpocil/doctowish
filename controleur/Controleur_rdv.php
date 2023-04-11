<?php
include("modele/dao.php");
require("vue/calendrier.php");

if(isset($_GET['date'])){
    $user_id='123';
    $type_id='456';
    $annulation='0';
    $date=$_GET['date'];
    rdv::create_rdv($user_id, $type_id, $annulation, $date);
}
    
?>