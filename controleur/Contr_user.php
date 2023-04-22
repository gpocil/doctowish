<?php

session_start();
require('Contr_class/Contr_class_rdv.php');
require('Contr_class/Contr_class_user.php');

if (!empty($_SESSION)) {
    contr_user::cadenas_prat();
}

class logged_user extends contr_user
{

    public static function page_login()
    {
        contr_user::login_user();
        require("vue/login_user.php");
    }
    public static function page_accueil()
    {
        contr_rdv::listing_rdv_user_id();
        $title = "Accueil patient - DoctoWish";
        $url = "vue/accueil_user.php";
        include("vue/template.php");
    }
    public static function page_rdv()
    {
        contr_rdv::listing_rdv_user_id();
        contr_rdv::suppr_rdv_user();
        $title = "Mes RDVs - DoctoWish";
        $url = "vue/liste_rdv_user.php";
        include("vue/template.php");

    }
}

if (isset($_GET['action']) && $_GET['action'] == "login_user") {
    if (empty($_SESSION)) {
        logged_user::page_login();
        die();
    } else {
        logged_user::page_accueil();
    }
} else if (!empty($_SESSION)) {
    if (isset($_GET['action']) && $_GET['action'] == "accueil_user") {
        logged_user::page_accueil();
    }
    if (isset($_GET['action']) && $_GET['action'] == "liste_rdv") {
        logged_user::page_rdv();
    }
}
