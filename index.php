<?php 
if(isset($_GET['show']) && $_GET['show']=='user'){
include ('contr/read_user_contr.php');}

if(isset($_GET['show']) && $_GET['show']=='prat'){
include ('contr/read_prat_contr.php');}

if(isset($_GET['show']) && $_GET['show']=='all_users'){
include ('contr/read_all_users_from_prat_contr.php');}

else if(!isset($_GET['show'])) {
    include('vues/error.html');
}