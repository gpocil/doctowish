<?php
require_once("modele/dao.php");
class contr_pec extends typepec {

    public static function read_pec(){
        $_SESSION['list_pec'] = typepec::read_typepec_pratid($_SESSION['prat_id']);

    }
    public static function create_pec(){
        if(isset($_POST["tarif"]) && isset($_POST["nom"]) && (isset($_POST["60"]) || isset($_POST["30"]))){
    
            $tarif = $_POST["tarif"];
            $nom = $_POST["nom"];
            $prat_id=$_SESSION['prat_id'];
        
            if (isset($_POST["60"])){//TODO Une seule sélection
                $duree=$_POST["60"];
            }
            if (isset($_POST["30"])){
                $duree=$_POST["30"];
            }
        typepec::create_typepec($nom, $tarif, $prat_id, $duree);
        }
        
    }


    public static function update_pec()
    {
    
        $_SESSION['update_pec'] = typepec::read_typepec($_GET['id']);
        if ($_SESSION['update_pec'][0]['prat_id'] != $_SESSION['prat_id']) {//Si la PEC n'appartient pas au prat
            $action = "pec";
            header("Location: ?action=" . $action);
        } else {
            var_dump($_SESSION['update_pec']);

            $id = $_GET['id'];
            $nom = $_SESSION['update_pec'][0]['nom'];
            $tarif = $_SESSION['update_pec'][0]['tarif'];
            $duree = $_SESSION['update_pec'][0]['duree'];
       
            if (isset($_POST["tarif"]) || isset($_POST["nom"]) || (isset($_POST["60"]) || isset($_POST["30"]))) {
          
                if (!empty($_POST["tarif"])) {
                    $tarif = $_POST["tarif"];
                }
                if (!empty($_POST["nom"])) {
                    $nom = $_POST["nom"];
                }
                if (!empty($_POST["30"])) {
                    $duree = $_POST["30"];
                }
                if (!empty($_POST["60"])) {
                    $duree = $_POST["60"];
                }
                typepec::update_typepec($id, $nom, $tarif, $_SESSION['prat_id'], $duree);
             
                echo 'La prise en charge a bien été modifiée.';
                $action = "pec";
                header("Location: ?action=" . $action);
                exit();
            }
        }
    }
    public static function delete_pec(){

        $list = typepec::read_typepec($_GET['id']);
        $prat_id = $list[0]['prat_id'];
        
        if ($prat_id !=$_SESSION['prat_id']){//Si la PEC n'appartient pas au prat
            $action = "accueil_prat";
            header("Location: ?action=" . $action);
            exit();
        }
        
        $_SESSION['delete_pec']=$list;
        $id = $_SESSION['delete_pec'][0]['id'];
        
        if (isset($_POST['yes'])){
        typepec::delete_typepec($id);
        $action = "pec";
        header("Location: ?action=" . $action);
        exit();
        
        }
        
        if (isset($_POST['no'])){
            $action = "pec";
            header("Location: ?action=" . $action);
            exit();
        }
        
    
    }
    
}
