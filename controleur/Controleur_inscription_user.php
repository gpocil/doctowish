<?php
session_set_cookie_params(0);
session_start();
require("vue/inscription_user.php");
require("modele/modele_insciption_user.php");
inscription_user();
//------------------TODO : Contraintes email etc---------------
