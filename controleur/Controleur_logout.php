<?php 
session_start();
require('vue/logout.php');

function logout(){
    session_destroy();
    $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $redirection = substr($url, 0, -6);
    $redirection.='defaut';
    header("Refresh:5; URL=".$redirection."");
    exit();
    
}

logout();


?>