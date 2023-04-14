<<<<<<< HEAD
<?php

class connexion{
public static function query($sql){
    $db = 'doctowish';
    $PARAM_nom_bd = $db;
    $PARAM_utilisateur = 'root';
    $PARAM_mot_passe = '';
    $PARAM_hote = 'localhost';
    $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    
    $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
    $req = $connexion->prepare($sql);
    $req->execute();

    
}

public static function query_return($sql){
    $db = 'doctowish';
    $PARAM_nom_bd = $db;
    $PARAM_utilisateur = 'root';
    $PARAM_mot_passe = '';
    $PARAM_hote = 'localhost';
    $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

    );
    $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
    $req = $connexion->prepare($sql);
    $req->execute();
    $rep = $req->fetch();

  
return $rep;

}public static function query_fetch_all($sql){
    $db = 'doctowish';
    $PARAM_nom_bd = $db;
    $PARAM_utilisateur = 'root';
    $PARAM_mot_passe = '';
    $PARAM_hote = 'localhost';
    $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

    );
    $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
    $req = $connexion->prepare($sql);
    $req->execute();
    $rep = $req->fetchAll();

  
return $rep;

}
}
=======
<?php

class connexion
{
    public static function query($sql)//Query simple pour create/update
    {
        $db = 'doctowish';
        $PARAM_nom_bd = $db;
        $PARAM_utilisateur = 'root';
        $PARAM_mot_passe = '';
        $PARAM_hote = 'localhost';
        $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try { //DB principale
            $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
            $req = $connexion->prepare($sql);
            $req->execute();
        } catch (Exception $e) {
            try{ //DB de secours
            $db = 'dwish_backup';
            $PARAM_nom_bd = $db;
            $PARAM_utilisateur = 'root';
            $PARAM_mot_passe = '';
            $PARAM_hote = 'localhost';
            $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
            $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
            $req = $connexion->prepare($sql);
            $req->execute();
            echo $e;
            }
            catch (Exception $e) {
                $to = "votre@email.com";
                $subject = "Erreur de connexion à la base de données";
                $message = "Une erreur s'est produite lors de la connexion à la première base de données :\n\n";
                $message .= $e->getMessage();
                $headers = "From: Doctowish@gmail.com";
                $action = "error";
                mail($to, $subject, $message, $headers);
                error_log($e->getMessage(), 0);
                header("Location: ?action=" . $action);
                exit();
            }
        }
    }

    public static function query_return($sql)//Query pour fonctions avec retour (read simples)
    {
        $db = 'doctowish';
        $PARAM_nom_bd = $db;
        $PARAM_utilisateur = 'root';
        $PARAM_mot_passe = '';
        $PARAM_hote = 'localhost';
        $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        );
        try { //DB principale

            $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
            $req = $connexion->prepare($sql);
            $req->execute();
            $rep = $req->fetch();
        } catch (Exception $e) { //DB de secours
            try {
                $db = 'dwish_backup';
                $PARAM_nom_bd = $db;
                $PARAM_utilisateur = 'root';
                $PARAM_mot_passe = '';
                $PARAM_hote = 'localhost';
                $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
                $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
                $req = $connexion->prepare($sql);
                $req->execute();
                $rep = $req->fetch();


                $to = "votre@email.com";
                $subject = "Erreur de connexion à la base de données";
                $message = "Une erreur s'est produite lors de la connexion à la première base de données :\n\n";
                $message .= $e->getMessage();
                $headers = "From: Doctowish@gmail.com";
                mail($to, $subject, $message, $headers);
                error_log($e->getMessage(), 0);
            } catch (Exception $e) {

                $to = "votre@email.com";
                $subject = "Erreur de connexion à la base de données";
                $message = "Une erreur s'est produite lors de la connexion à la première base de données :\n\n";
                $message .= $e->getMessage();
                $headers = "From: Doctowish@gmail.com";
                $action = "error";
                mail($to, $subject, $message, $headers);
                error_log($e->getMessage(), 0);
                header("Location: ?action=" . $action);
                exit();
            }
        }
        return $rep;
    }






    public static function query_fetch_all($sql)//Query pour récupérer plusieurs objets
    {
        $db = 'doctowish';
        $PARAM_nom_bd = $db;
        $PARAM_utilisateur = 'root';
        $PARAM_mot_passe = '';
        $PARAM_hote = 'localhost';
        $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        );
        try {
            $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
            $req = $connexion->prepare($sql);
            $req->execute();
            $rep = $req->fetchAll();
        } catch (Exception $e) {
            try{
            $db = 'dwish_backup';
            $PARAM_nom_bd = $db;
            $PARAM_utilisateur = 'root';
            $PARAM_mot_passe = '';
            $PARAM_hote = 'localhost';
            $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
            $connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
            $req = $connexion->prepare($sql);
            $req->execute();
            $rep = $req->fetchAll();}
            catch(Exception $e){
                $action = "error";
                header("Location: ?action=" . $action);
                exit();
            }
        }

        return $rep;
    }
}
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
