<?php 
include( "model/read_prat_model.php");
$posts = read_prat($_GET['id']);
include( "vues/read_prat.php");


