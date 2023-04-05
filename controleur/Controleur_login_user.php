<?php
session_set_cookie_params(0);
session_start();
require("modele/modele_login_user.php");
login_user();
require("vue/login_user.php");
