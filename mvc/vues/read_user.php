
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8" />
    	<title>Lecture user</title>
    	<link href="style.css" rel="stylesheet" />
	</head>

	<body>
    	<h1>Read users</h1>

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
                	echo "</br>adresse : ".($post['adresse']);
                    echo "</br>ville : ".($post['ville']);
					echo '</br><img src='. ($post['photo']) .' width="150" height="200" />';
                    echo "</br>prat_id : ".($post['prat_id']);

                	?>
                	<br />
                	<em><a href="?show=prat&id=<?=($post['prat_id'])?>"> Voir le praticien </a></em>
            	</p>
        	</div>
    	<?php
    	} // The end of the posts loop.
    	?>
	</body>
</html>