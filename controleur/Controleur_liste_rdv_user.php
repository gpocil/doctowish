<<<<<<< HEAD
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_prat.php");
cadenas_prat();
require("modele/modele_liste_rdv_user.php");
listing_rdv_user_id();
delete_rdv_user();
require("vue/liste_rdv_user.php");
=======
<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_prat.php");
cadenas_prat();
require("modele/modele_liste_rdv_user.php");
listing_rdv_user_id();
delete_rdv_user();
require("vue/liste_rdv_user.php");
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>