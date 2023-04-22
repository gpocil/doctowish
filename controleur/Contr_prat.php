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
        $title = "Accueil praticien - DoctoWish";
        $url = "vue/accueil_praticien.php";
        include("vue/template.php");
    }

    public static function page_compte()
    {
        $title = "Compte praticien - DoctoWish";
        contr_prat::read_infos_prat();
        $url = "vue/compte_prat.php";
        require("vue/template.php");

    }

    public static function page_update_compte()
    {
        $title = "Compte praticien - DoctoWish";
        contr_prat::update_compte_prat();
        $url = "vue/compte_prat_update.php";
        require("vue/template.php");
     
    }
    public static function page_password_update()
    {
        $title = "Compte praticien - DoctoWish";
        contr_prat::password_update();
        $url = "vue/password_update.php";
        require("vue/template.php");
       
    }
    public static function page_inscription_user()
    {
        $title = "Inscription de patient - DoctoWish";
        contr_user::inscription_user();
        $url = "vue/inscription_user.php";
        require("vue/template.php");

    }
    public static function page_ajout_rdv()
    {
        $title = "Ajout de RDV - DoctoWish";
        contr_user::listing_users();
        contr_rdv::creation_rdv();
        $url = "vue/creation_rdv.php";
        require("vue/template.php");
    }
    public static function page_liste_rdv_prat()
    {
        $title = "Listing des RDV - DoctoWish";
        contr_rdv::listing_rdv();
        contr_rdv::listing_rdv_by_date();
        contr_rdv::listing_rdv_by_pec();
        $url = "vue/liste_rdv_prat.php";
        require("vue/template.php");
    }
    public static function page_delete_rdv_prat()
    {
        $title = "Suppression de RDV - DoctoWish";
        contr_rdv::suppr_rdv_prat();
        $url = "vue/delete_rdv.php";
        require("vue/template.php");
    }
    public static function page_pec()
    {
        $title = "Mes prises en charge - DoctoWish";
        contr_pec::read_pec();
        $url = "vue/pec.php";
        require("vue/template.php");
    }
    public static function page_update_pec()
    {
        $title = "Mise à jour de prises en charge - DoctoWish";
        contr_pec::update_pec();
        $url = "vue/update_pec.php";
        require("vue/template.php");
    }
    public static function page_delete_pec()
    {
        $title = "Suppression de prise en charge - DoctoWish";
        contr_pec::delete_pec();
        $url = "vue//delete_pec.php";
        require("vue/template.php");
    }
    public static function page_creation_pec()
    {
        $title = "Création de prise en charge - DoctoWish";
        contr_pec::create_pec();
        $url = "vue/creation_pec.php";
        require("vue/template.php");
 
    }
    public static function page_listing_users()
    {
        $title = "Listing de patients - DoctoWish";
        contr_user::listing_users();
        $url = "vue/listing_users.php";
        require("vue/template.php");
    }
    public static function page_update_user()
    {
        $title = "Mise à jour de patient - DoctoWish";
        contr_user::maj_user();
        $url = "vue/update_user.php";
        require("vue/template.php");
    }
    public static function page_delete_user()
    {
        $title = "Suppression de fiche patient - DoctoWish";
        $url = "vue/delete_user.php";
        contr_user::suppr_user();
        require("vue/template.php");
    
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
