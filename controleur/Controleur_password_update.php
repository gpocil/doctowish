<?php 
session_start();
require('Contr_class_praticien.php');
contr_prat::cadenas_user();
contr_prat::password_update();
require("vue/password_update.php");
?>