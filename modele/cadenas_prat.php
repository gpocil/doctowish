<?php 
function cadenas_prat(){
    if ($_SESSION['type']!='user'){
        $action = "defaut";
        $redirection = redirigeVers($action);
        header("Location: ?action=" . $action);
        exit();
    }
}
?>