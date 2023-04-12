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
