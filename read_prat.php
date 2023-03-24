
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8" />
    	<title>Lecture praticien</title>
    	<link href="style.css" rel="stylesheet" />
	</head>

	<body>
    	<h1>Read praticiens</h1>

<?php
    	foreach ($posts as $post) {
    	?>
        	<div class="news">
            	<h3>
                	<?php echo ($post['nom'].' '.($post['prenom'])); ?>
            	</h3>
            	<p>
                	<?php
                	// We display the post content.
                	echo "</br>adresse : ".($post['adresse']).
                     "</br>ville : ".($post['ville']).
                     "</br>specialité : ".($post['specialite']).
                     "</br>n_adeli : ".($post['n_adeli']);
                	?>
                	<br />
                	<em><a href="?show=all_users&id=<?=($_GET['id'])?>"> Voir tous les patients pris en charge  par ce praticien </a></em>
            	</p>
        	</div>
    	<?php
    	} // The end of the posts loop.
    	?>
	</body>
</html>