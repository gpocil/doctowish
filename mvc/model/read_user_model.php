<?php
function read_user($id){
require_once('connexion.php');
$database = connexion();
$statement = $database->query(
    "SELECT * FROM `user`  WHERE `id` = $id");
$posts = [];
while (($row = $statement->fetch())) {
	$post = [
    	'nom' => $row['nom'],
    	'prenom' => $row['prenom'],
    	'adresse' => $row['adresse'],
		'photo' => $row['photo'],
    	'ville' => $row['ville'],
    	'prat_id' => $row['prat_id'],
	];

	$posts[] = $post;
}
return $posts;
}
?>


    	