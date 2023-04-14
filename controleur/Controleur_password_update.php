<<<<<<< HEAD
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
cadenas_user();
require("modele/modele_password_update.php");
password_update();
require("vue/password_update.php");

=======
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
cadenas_user();
require("modele/modele_password_update.php");
password_update();
require("vue/password_update.php");

>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>