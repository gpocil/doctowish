<?php 
session_start();
require("Contr_class_pec.php");
require("Contr_class_praticien.php");
contr_prat::cadenas_user();
contr_pec::update_pec();
require("vue/update_pec.php");
?>