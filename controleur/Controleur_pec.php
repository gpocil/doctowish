<?php 
session_start();
require('Contr_class_pec.php');
require('Contr_class_praticien.php');
contr_prat::cadenas_user();
contr_pec::read_pec();
require("vue/pec.php");
?>