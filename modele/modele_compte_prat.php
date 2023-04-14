<<<<<<< HEAD
<?php
require("modele/dao.php");

function read_infos_prat(){
$list = praticien::read_prat($_SESSION['prat_id']);
$_SESSION['compte_prat'] = $list;
}

=======
<?php
require("modele/dao.php");

function read_infos_prat(){
     $_SESSION['compte_prat'] = praticien::read_prat($_SESSION['prat_id']);
}
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>