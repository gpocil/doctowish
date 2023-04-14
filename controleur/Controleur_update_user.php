<?php 
session_start();
require("Contr_class_praticien.php");
contr_prat::cadenas_user();
require("Contr_class_user.php");
contr_user::maj_user();
require("vue/update_user.php");
?>