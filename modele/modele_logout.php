<<<<<<< HEAD
<?php
require("modele/dao.php");

function logout(){
    session_destroy();
    $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $redirection = substr($url, 0, -6);
    $redirection.='defaut';
    header("Refresh:5; URL=".$redirection."");
    exit();
    
}

=======
<?php

function logout(){
    session_destroy();
    $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $redirection = substr($url, 0, -6);
    $redirection.='defaut';
    header("Refresh:5; URL=".$redirection."");
    exit();
    
}

>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>