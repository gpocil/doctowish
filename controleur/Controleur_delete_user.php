<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
cadenas_user();
require("modele/modele_delete_user.php");
delete_user();
require("vue/delete_user.php");
?>