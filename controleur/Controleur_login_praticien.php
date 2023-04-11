<?php
session_set_cookie_params(0);
session_start();
require("modele/modele_login_prat.php");
login_prat();
require("vue/login_praticien.php");
