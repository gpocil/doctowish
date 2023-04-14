<?php 
session_start();
require('Contr_class_praticien.php');
contr_prat::cadenas_user();
contr_prat::read_infos_prat();
require("vue/compte_prat.php");
?>