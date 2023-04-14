<<<<<<< HEAD
<?php 
function cadenas_prat(){
    if ($_SESSION['type']!='user'){
        $action = "defaut";
        header("Location: ?action=" . $action);
        exit();
    }
}
=======
<?php 
function cadenas_prat(){
    if ($_SESSION['type']!='user'){
        $action = "defaut";
        header("Location: ?action=" . $action);
        exit();
    }
}
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
?>