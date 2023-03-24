<?php
function read_prat($id){
require_once('connexion.php');
$database = connexion();
$statement = $database->query(
    "SELECT * FROM `praticien`  WHERE `id` = $id");
$posts = [];
while (($row = $statement->fetch())) {
	$post = [
    	'nom' => $row['nom'],
    	'prenom' => $row['prenom'],
    	'adresse' => $row['adresse'],
    	'ville' => $row['ville'],
    	'specialite' => $row['specialite'],
    	'n_adeli' => $row['n_adeli'],
	];

	$posts[] = $post;
}
return $posts;
}
?>


    	