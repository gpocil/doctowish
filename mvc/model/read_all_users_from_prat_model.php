<?php
function read_all_users($id){
require_once('connexion.php');
$database = connexion();
$statement = $database->query(
    "SELECT * FROM `user`  WHERE `prat_id` = $id");
$posts = [];
while (($row = $statement->fetch())) {
	$post = [
    	'nom' => $row['nom'],
    	'prenom' => $row['prenom'],
    	'adresse' => $row['adresse'],
    	'ville' => $row['ville'],
	];

	$posts[] = $post;
}
return $posts;
}
?>


    	