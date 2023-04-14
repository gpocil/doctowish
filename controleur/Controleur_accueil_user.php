<?php 
session_set_cookie_params(0);
session_start();
require('Contr_class_user.php');
contr_user::cadenas_prat();
require("vue/accueil_user.php");

?>