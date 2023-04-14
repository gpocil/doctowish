<<<<<<< HEAD
<?php 
session_set_cookie_params(0);
session_start();
//--------------------------------TODO : bloquer accès patients non pris en charge----------------------------
require("modele/cadenas_user.php");
cadenas_user();
require("modele/modele_update_user.php");
update_user();
require("vue/update_user.php");
=======
<?php 
session_set_cookie_params(0);
session_start();
//--------------------------------TODO : bloquer accès patients non pris en charge----------------------------
require("modele/cadenas_user.php");
cadenas_user();
require("modele/modele_update_user.php");
update_user();
require("vue/update_user.php");
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>