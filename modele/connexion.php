<?php

//ESSAI DE MODIFICATION


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
    // $resultats = $connexion->query($sql);
    // $req->setFetchMode(PDO::FETCH_OBJ);
    // $req->closeCursor();
    
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
    // $resultats = $connexion->query($sql);
    // $resultats->setFetchMode(PDO::FETCH_OBJ);
    // $rep=$resultats->fetch();
    // $resultats->closeCursor();
  
return $rep;

}
}
