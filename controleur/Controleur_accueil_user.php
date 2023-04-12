<?php 
session_set_cookie_params(0);
session_start();
require('modele/cadenas_prat.php');
cadenas_prat();
require("vue/accueil_user.php");

?>