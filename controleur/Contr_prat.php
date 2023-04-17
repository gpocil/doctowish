<?php

session_start();
require('Contr_class/Contr_class_pec.php');
require('Contr_class/Contr_class_rdv.php');
require('Contr_class/Contr_class_user.php');
require('Contr_class/Contr_class_praticien.php');


if (!empty($_SESSION)) {
    contr_prat::cadenas_user();
}
class logged_praticien extends contr_prat
{
    public static function page_login()
    {
        contr_prat::login_prat();
        require("vue/login_praticien.php");
    }

    public static function page_accueil()
    {
        require("vue/accueil_praticien.php");
    }

    public static function page_compte()
    {
        contr_prat::read_infos_prat();
        require("vue/compte_prat.php");
    }

    public static function page_update_compte()
    {
        contr_prat::update_compte_prat();
        require("vue/compte_prat_update.php");
    }
    public static function page_password_update()
    {
        contr_prat::password_update();
        require("vue/password_update.php");
    }
    public static function page_inscription_user()
    {
        contr_user::inscription_user();
        require("vue/inscription_user.php");
    }
    public static function page_ajout_rdv()
    {
        contr_user::listing_users();
        contr_rdv::creation_rdv();
        require("vue/creation_rdv.php");
    }
    public static function page_liste_rdv_prat()
    {
        contr_rdv::listing_rdv();
        contr_rdv::listing_rdv_by_pec();
        require("vue/liste_rdv_prat.php");
    }
    public static function page_delete_rdv_prat()
    {
        contr_rdv::suppr_rdv_prat();
        require("vue/delete_rdv.php");
    }
    public static function page_pec()
    {
        contr_pec::read_pec();
        require("vue/pec.php");
    }
    public static function page_update_pec()
    {
        contr_pec::update_pec();
        require("vue/update_pec.php");
    }
    public static function page_delete_pec()
    {
        contr_pec::delete_pec();
        require("vue/delete_pec.php");
    }
    public static function page_creation_pec()
    {
        contr_pec::create_pec();
        require("vue/creation_pec.php");
    }
    public static function page_listing_users()
    {
        contr_user::listing_users();
        require("vue/listing_users.php");
    }
    public static function page_update_user()
    {
        contr_user::maj_user();
        require("vue/update_user.php");
    }
    public static function page_delete_user()
    {
        contr_user::suppr_user();
        require("vue/delete_user.php");
    }
    public static function page_inscr_prat()
    {
        contr_prat::inscription_prat();
        require("vue/inscription_praticien.php");
    }
}

//---------------Inscription prat-----------------

if (isset($_GET['action']) && $_GET['action'] == "inscription_prat") {
    logged_praticien::page_inscr_prat();
    die();
}

//---------------Login prat-----------------
if (isset($_GET['action']) && $_GET['action'] == "login_prat") {
    if (empty($_SESSION)) {
        logged_praticien::page_login();
        die();
    } else {
        logged_praticien::page_accueil();
    }
} else if (!empty($_SESSION)) {
    //---------------Accueil prat---------------
    if (isset($_GET['action']) && $_GET['action'] == "accueil_prat") {
        logged_praticien::page_accueil();
    }

    //---------------Compte prat---------------
    if (isset($_GET['action']) && $_GET['action'] == "compte_prat") {
        if (!isset($_GET['p'])) {
            logged_praticien::page_compte();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'update') {
            logged_praticien::page_update_compte();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'pw') {
            logged_praticien::page_password_update();
        }
    }

    //---------------Ajout patient---------------
    if (isset($_GET['action']) && $_GET['action'] == "inscription_user") {
        logged_praticien::page_inscription_user();
    }

    //---------------Ajout RDV---------------
    if (isset($_GET['action']) && $_GET['action'] == "ajout_rdv") {
        logged_praticien::page_ajout_rdv();
    }

    //---------------Listing RDV---------------
    if (isset($_GET['action']) && $_GET['action'] == "liste_rdv_prat") {
        if (!isset($_GET['p'])) {
            logged_praticien::page_liste_rdv_prat();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'delete') {
            logged_praticien::page_delete_rdv_prat();
        }
    }
    //---------------PEC---------------
    if (isset($_GET['action']) && $_GET['action'] == "pec") {
        if (!isset($_GET['p'])) {
            logged_praticien::page_pec();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'update') {
            logged_praticien::page_update_pec();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'delete') {
            logged_praticien::page_delete_pec();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'create') {
            logged_praticien::page_creation_pec();
        }
    }
    //---------------Listing users---------------
    if (isset($_GET['action']) && $_GET['action'] == "liste_users") {
        if (!isset($_GET['p'])) {
            logged_praticien::page_listing_users();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'update') {
            logged_praticien::page_update_user();
        }
        if (isset($_GET['p']) && $_GET['p'] == 'delete') {
            logged_praticien::page_delete_user();
        }
    }



} else {
    $action = "defaut";
    header("Location: ?action=" . $action);
    exit();
}
