<<<<<<< HEAD
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
cadenas_user();
require('modele/modele_pec.php');
read_pec();
require("vue/pec.php");
=======
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
cadenas_user();
require('modele/modele_pec.php');
read_pec();
require("vue/pec.php");
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>