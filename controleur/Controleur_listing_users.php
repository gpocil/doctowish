<?php 
session_set_cookie_params(0);
session_start();
require("modele/cadenas_user.php");
cadenas_user();
require("modele/modele_listing_users.php");
listing_users();
require("vue/listing_users.php");
?>