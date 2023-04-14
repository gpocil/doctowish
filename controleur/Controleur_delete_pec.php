<?php 
session_start();
require('Contr_class_praticien.php');
contr_prat::cadenas_user();
require('Contr_class_pec.php');
contr_pec::delete_pec();
require("vue/delete_pec.php");
?>