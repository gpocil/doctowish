<?php
require_once('modele/dao.php');
class contr_user extends user
{
    public static function cadenas_prat(){
        if ($_SESSION['type']!='user'){
            $action = "defaut";
            header("Location: ?action=" . $action);
            exit();
        }
    }

    public static function login_user(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mdp = $_POST['password'];
            
        
            $arr[] = user::read_user_mail($email);
            $name = $arr[0][0]['nom'];
            $prenom = $arr[0][0]['prenom'];
            $id = $arr[0][0]['id'];
            if (isset($arr[0][0]['mail'])) {
                $db_mail = $arr[0][0]['mail'];
                $db_id = $arr[0][0]['id'];
                $user[] = login_user::read_login_user($db_id);
                $db_mdp = $user[0][0]['mdp'];
                if (password_verify($mdp, $db_mdp)) {
                    $_SESSION['name']=$name;
                    $_SESSION['prenom']=$prenom;
                    $_SESSION['user_id']=$id;
                    $_SESSION['type']='user';
                    $action = "accueil_user";
                    var_dump($_SESSION);
                    header("Location: ?action=" . $action);
                    exit();
                } else {
                    echo 'Mauvais MDP';
                }
            } else {
                echo 'Adresse mail non reconnue';
            }
        }
        
    }
    
    public static function inscription_user()
    {

        if (isset($_POST["mail"]) && isset($_POST["nom"]) && isset($_POST["mdp"]) && isset($_POST["prenom"]) &&  isset($_POST["adresse"]) &&  isset($_POST["ville"]) && isset($_POST["cp"]) && isset($_POST["dn"]) && isset($_POST["tel"]) && isset($_POST["tuteur"])) {
            $prat_id = $_SESSION['prat_id'];
            $mail = $_POST["mail"];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $adresse = $_POST["adresse"];
            $ville = $_POST["ville"];
            $cp = $_POST["cp"];
            $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
            $tel = $_POST["tel"];
            $dn = $_POST["dn"];
            $tuteur = $_POST["tuteur"];
            $photo = $_FILES["photo"]["name"]; // Access uploaded file using $_FILES array
             $file_path = "assets/img/photo_patient/"; 
            $photo_link = $file_path . $photo;
            move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path.$photo);
            $array[] = user::read_user_mail($mail);
        if (!isset($array[0][0]['mail'])) {
            user::create_user($nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $dn, $prat_id, $tuteur, $photo_link); // Store file path in database
            $mail_user[] = user::read_user_mail($mail);
            $id =  $mail_user[0][0]['id'];
            login_user::create_login_user($id, $mdp);
        }  else {
                echo "Cette adresse mail existe déjà dans la DB";
            }
        }
    }

    public static function maj_user()
    {

        $id = $_GET['id'];
        $_SESSION['update_user'] = user::read_user_id($id);

        if ($_SESSION['prat_id'] != $_SESSION['update_user'][0]['prat_id']) { //Si le patient n'est pas relié au praticien
            $action = "liste_users";
            header("Location: ?action=" . $action);
            exit();
        } else {
            $nom = $_SESSION['update_user'][0]['nom'];
            $prenom = $_SESSION['update_user'][0]['prenom'];
            $mail = $_SESSION['update_user'][0]['mail'];
            $adresse = $_SESSION['update_user'][0]['adresse'];
            $ville = $_SESSION['update_user'][0]['ville'];
            $prat_id = $_SESSION['update_user'][0]['prat_id'];
            $cp = $_SESSION['update_user'][0]['cp'];
            $tel = $_SESSION['update_user'][0]['date_naissance'];
            $tuteur = $_SESSION['update_user'][0]['tuteur'];
            $dn = $_SESSION['update_user'][0]['date_naissance'];
            $photo = $_SESSION['update_user'][0]['photo'];

            if (isset($_POST["nom"]) || isset($_POST["prenom"]) || isset($_POST["adresse"]) || isset($_POST["cp"]) || isset($_POST["ville"]) || isset($_POST["tuteur"]) || isset($_POST["mail"]) || isset($_POST["tel"]) || isset($_POST["dn"]) || isset($_POST["photo"])) {
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
                if (!empty($_POST["tel"])) {
                    $tel = $_POST["tel"];
                }
                if (!empty($_POST["mail"])) {
                    $mail = $_POST["mail"];
                }
                if (!empty($_POST["tuteur"])) {
                    $tuteur = $_POST["tuteur"];
                }
                if (!empty($_POST["photo"])) {
                    $photo = $_POST["photo"];
                }
                if (!empty($_POST["dn"])) {
                    $dn = $_POST["dn"];
                }
                user::update_user($id, $nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $dn, $prat_id, $tuteur, $photo);
                echo 'La prise en charge a bien été modifiée.';
                $action = "liste_users";
                header("Location: ?action=" . $action);
                exit();
            }
        }
    }

    public static function listing_users()
    {

        $_SESSION['list_users'] = user::read_user_prat($_SESSION['prat_id']);


        if (isset($_POST['nom'])) {
            $_SESSION['list_users'] = user::read_user_name($_POST['nom'], $_SESSION['prat_id']);
        }
        if (isset($_POST['ville'])) {
            $_SESSION['list_users'] = user::read_user_ville($_POST['ville'], $_SESSION['prat_id']);
        }
    }


    public static function suppr_user(){
        $arr = user::read_user_id($_GET['id']);
        $prat_id = $arr[0]['prat_id'];
        
        if ($prat_id !=$_SESSION['prat_id']){
            $action = "accueil_prat";
            header("Location: ?action=" . $action);
            exit();
        }
        
        $_SESSION['delete_user']=$arr;
        $id = $_SESSION['delete_user'][0]['id'];
        
        if (isset($_POST['yess'])){
        user::delete_user($id);
        $action = "liste_users";
        header("Location: ?action=" . $action);
        exit();
        
        }
        
        if (isset($_POST['nope'])){
            $action = "liste_users";
            header("Location: ?action=" . $action);
            exit();
        }
        
    
    }
    
}