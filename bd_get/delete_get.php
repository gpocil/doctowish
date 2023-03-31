<?php

$db = 'doctowish'; // nom de la base de données
$table = $_GET["table"]; // nom de la table à sélectionner

$PARAM_nom_bd=$db; // nom de la base de données
$PARAM_utilisateur='root'; // nom d'utilisateur
$PARAM_mot_passe=''; // mot de passe de l'utilisateur
$PARAM_hote='localhost';
$PARAM_port='3306';

try {

 $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
 //Avec le port :
//  $dsn = 'mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd;
 
 //Options PDO sur les requêtes :
 $options = array(
     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
 //Constructeur PDO :
 $connexion = new PDO( $dsn , $PARAM_utilisateur, $PARAM_mot_passe, $options );
 
}
catch(Exception $e) {
 echo 'Erreur : '.$e->getMessage().'<br />';
 echo 'N° : '.$e->getCode();
 die('<pre><b>Une erreur est survenue !');
}

try {
    $table = $_GET['table'];
    $id = $_GET['id'];
    $sql = "DELETE FROM `$table`  WHERE `id` = $id";
    
 
 //On stock dans $resultats l'envoi de la requête EN LECTURE : query() :
 $resultats = $connexion->query($sql);
 
 // Retour du résultat sous forme d'objet :
 $resultats->setFetchMode(PDO::FETCH_OBJ);

 echo "L'ID ".$id." a été supprimé sur la table ".$table."</b><br />";
 
}
catch(Exception $e) {
 echo $e->getMessage();
 echo "Impossible de récupérer les données sur la table :".$table;
}
$resultats->closeCursor();

?>

