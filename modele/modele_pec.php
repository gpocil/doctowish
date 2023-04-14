<<<<<<< HEAD
<?php
require("modele/dao.php");

function read_pec(){
    $list = typepec::read_typepec_pratid($_SESSION['prat_id']);
$_SESSION['list_pec']=$list;

}
=======
<?php
require("modele/dao.php");

function read_pec(){
    $_SESSION['list_pec'] = typepec::read_typepec_pratid($_SESSION['prat_id']);

}
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>