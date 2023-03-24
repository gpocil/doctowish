<?php 
function connexion(){
try {
	$database = new PDO('mysql:host=localhost;dbname=doctowish;charset=utf8', 'root', '');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}
return $database;
}