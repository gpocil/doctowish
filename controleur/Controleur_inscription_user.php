<<<<<<< HEAD
<?php
session_set_cookie_params(0);
session_start();
require("vue/inscription_user.php");
require("modele/modele_insciption_user.php");
if (isset($_POST["action"]) && !empty($_POST["action"])) {
    inscription_user();
}
=======
<?php
session_start();
require('Contr_class_praticien.php');
require('Contr_class_user.php');
contr_prat::cadenas_user();
contr_user::inscription_user();
require("vue/inscription_user.php");
>>>>>>> 45c61e6d3ad0fc120e9ce8006b53fb4147af6e53
