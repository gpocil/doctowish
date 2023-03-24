<?php 
include( "model/read_user_model.php");
$posts = read_user($_GET['id']);
include( "vues/read_user.php");

