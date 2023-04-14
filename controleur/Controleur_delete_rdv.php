<?php 
session_start();
require("Contr_class_praticien.php");
contr_prat::cadenas_user();
require("Contr_class_rdv.php");
contr_rdv::suppr_rdv_prat();
require("vue/delete_rdv.php");
?>