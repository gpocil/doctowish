<?php 
include( "model/read_all_users_from_prat_model.php");
$posts = read_all_users($_GET['id']);
include( "vues/read_all_users_from_prat.php");

