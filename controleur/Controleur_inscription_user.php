<<<<<<< HEAD
<?php
session_set_cookie_params(0);
session_start();
require("vue/inscription_user.php");
require("modele/modele_insciption_user.php");
if (isset($_POST["action"]) && !empty($_POST["action"])) {
    inscription_user();
}
//------------------TODO : Contraintes email etc---------------
=======
<?php
session_set_cookie_params(0);
session_start();
require("vue/inscription_user.php");
require("modele/modele_insciption_user.php");
inscription_user();
//------------------TODO : Contraintes email etc---------------
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
