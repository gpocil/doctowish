<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
cadenas_user();
require('modele/modele_compte_prat_update.php');
update_prat();
require("vue/compte_prat_update.php");

?>