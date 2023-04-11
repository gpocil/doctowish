<?php 
function cadenas_prat(){
    if ($_SESSION['type']!='user'){
        $action = "defaut";
        header("Location: ?action=" . $action);
        exit();
    }
}
?>