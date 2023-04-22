<?php
require_once('modele/dao.php');

class contr_prat extends praticien
{


    public static function cadenas_user()
    {
        if ($_SESSION['type'] != 'prat') {
            $action = "defaut";
            header("Location: ?action=" . $action);
            exit();
        }
    }

    public static function login_prat(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {//Si post reçu
            $adeli = $_POST['adeli'];
            $mdp = $_POST['password'];
            $user[] = praticien::read_prat_adeli($adeli);
         if ($user[0][0]!=false){
            $name = $user[0][0]['nom'];
            $prat_id=$user[0][0]['id'];
        }
            if (isset($user[0][0]['n_adeli'])) {
                
                $form_id = $user[0][0]['id'];
                $prat[] = login_prat::read_login_prat($form_id);
                $prat_id = $prat[0][0]['prat_id'];
                if ($form_id == $prat_id) {
                    $password = $prat[0][0]['mdp'];
                    if (password_verify($mdp, $password)) {//password_verify(mdp_formulaire, mdp hashé de la BD)
                        
                        $_SESSION['name']=$name;//Enregistrement des variables dans $_SESSION
                        $_SESSION['prenom']=$user[0][0]['prenom'];
                        
                        $_SESSION['type']="prat";
                        $_SESSION['prat_id']=$prat_id;
                        $action = "accueil_prat";
                        header("Location: ?action=" . $action);
                        exit();
                    } else {
                        echo 'Login ou MDP inconnu';
                    }
                }
            } else {
                echo "N° ADELI non reconnu";
            }
        }
        
    }
    

    public static  function read_infos_prat()
    {
        $_SESSION['compte_prat'] = praticien::read_prat($_SESSION['prat_id']);
    }

    public static function update_compte_prat()
    {
        $id = $_SESSION['compte_prat'][0]['id'];
        $nom = $_SESSION['compte_prat'][0]['nom'];
        $adresse = $_SESSION['compte_prat'][0]['adresse'];
        $prenom = $_SESSION['compte_prat'][0]['prenom'];
        $ville = $_SESSION['compte_prat'][0]['ville'];
        $adeli = $_SESSION['compte_prat'][0]['n_adeli'];
        $cp = $_SESSION['compte_prat'][0]['cp'];
        $tel = $_SESSION['compte_prat'][0]['tel'];
        $mail = $_SESSION['compte_prat'][0]['mail'];
        $spec = $_SESSION['compte_prat'][0]['specialite'];
        if (isset($_POST["nom"]) || isset($_POST["prenom"]) || (isset($_POST["adresse"]) || isset($_POST["cp"]) || isset($_POST["ville"]) || isset($_POST["spec"]) || isset($_POST["adeli"]) || isset($_POST["mail"]) || isset($_POST["tel"]))) {
            if (!empty($_POST["nom"])) {
                $nom = $_POST["nom"];
            }
            if (!empty($_POST["prenom"])) {
                $prenom = $_POST["prenom"];
            }
            if (!empty($_POST["adresse"])) {
                $adresse = $_POST["adresse"];
            }
            if (!empty($_POST["cp"])) {
                $cp = $_POST["cp"];
            }
            if (!empty($_POST["ville"])) {
                $ville = $_POST["ville"];
            }
            if (!empty($_POST["adeli"])) {
                $adeli = $_POST["adeli"];
            }
            if (!empty($_POST["tel"])) {
                $tel = $_POST["tel"];
            }
            if (!empty($_POST["spec"])) {
                $spec = $_POST["spec"];
            }
            if (!empty($_POST["mail"])) {
                $mail = $_POST["mail"];
            }
            $_SESSION['name'] = $nom;
            $_SESSION['prenom'] = $prenom;
            praticien::update_prat($id, $nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $spec, $adeli);
            $action = "compte_prat";
            header("Location: ?action=" . $action);
            exit();
        }
    }

    public static function password_update()
    {

        if (!empty($_POST['old']) && !empty($_POST['new']) && !empty($_POST['new_confirm'])) {
            $arr = login_prat::read_login_prat($_SESSION['prat_id']);
            $pw_db = $arr[0]['mdp'];
            $pw_old = $_POST['old'];
            $pw_new = $_POST['new'];
            $pw_new_confirm = $_POST['new_confirm'];
            if ($pw_new == $pw_new_confirm) {
                if (password_verify($pw_old, $pw_db)) {
                    login_prat::update_login_prat($_SESSION['prat_id'], password_hash($pw_new, PASSWORD_DEFAULT));
                    echo "le mdp a bien été modifi";
                } else {
                    echo "Le mdp n'est pas valide";
                }
            } else {
                echo "Les deux mots de passe ne sont pas identiques";
            }
        }
    }


    public static function inscription_prat(){
        if(isset($_POST["mail"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) &&  isset($_POST["adresse"]) &&  isset($_POST["ville"]) && isset($_POST["cp"]) && isset($_POST["adeli"]) && isset($_POST["tel"]) && isset($_POST["specialite"])) {
    
            $mail=$_POST["mail"]; 
            $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $adresse=$_POST["adresse"];
            $ville=$_POST["ville"];
            $cp=$_POST["cp"];
            $adeli=$_POST["adeli"];
            $tel=$_POST["tel"];
            $spec=$_POST["specialite"];
        
            $array[] = praticien::read_prat_adeli($adeli);
            if (!isset($array[0][0]['n_adeli'])) {
            praticien::create_prat($nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $spec, $adeli);
            $adeli_prat[] = praticien::read_prat_adeli($adeli);
            $id =  $adeli_prat[0][0]['id'];
            login_prat::create_login_prat($id, $mdp);
            $action = "defaut";
        header("Location: ?action=" . $action);
        exit();
            } 
            else 
            {
                echo "Ce numéro adeli est déja utilisé";
            }
            
        }
        
    }
    
}
