<?php
session_set_cookie_params(0);
session_start();
include("modele/dao.php");
require("vue/calendrier.php");

if(isset($_GET['date'])){
    $type_id="1";
    $annulation="0";
    $user_id="123";
    rdv::create_rdv($user_id, $type_id, $annulation, $_GET['date']);
}
    
?>