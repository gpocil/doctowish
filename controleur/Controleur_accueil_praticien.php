<?php 
session_start();
require("Contr_class_praticien.php");
contr_prat::cadenas_user();
require("vue/accueil_praticien.php");
?>