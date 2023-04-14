<?php
session_set_cookie_params(0);
session_start();
require("vue/inscription_user.php");
require("modele/modele_insciption_user.php");
if (isset($_POST["action"]) && !empty($_POST["action"])) {
    inscription_user();
<<<<<<< HEAD
}
=======
}
//------------------TODO : Contraintes email etc---------------
>>>>>>> a14bbb40d243560312edbdcb8a52bd77cc53801c
