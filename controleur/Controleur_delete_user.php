<?php 
session_set_cookie_params(0);
session_start();
require("Contr_class_praticien.php");
contr_prat::cadenas_user();
require("Contr_class_user.php");
contr_user::suppr_user();
require("vue/delete_user.php");
?>