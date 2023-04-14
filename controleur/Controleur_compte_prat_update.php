<?php 
session_start();
require('Contr_class_praticien.php');
contr_prat::cadenas_user();
contr_prat::update_compte_prat();
require("vue/compte_prat_update.php");
?>