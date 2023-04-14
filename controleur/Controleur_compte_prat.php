<<<<<<< HEAD
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
require('modele/modele_compte_prat.php');
cadenas_user();
read_infos_prat();
require("vue/compte_prat.php");
=======
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
require('modele/modele_compte_prat.php');
cadenas_user();
read_infos_prat();
require("vue/compte_prat.php");
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>