
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8" />
    	<title>All users</title>
    	<link href="style.css" rel="stylesheet" />
	</head>

	<body>
    	<h1>All users from praticien</h1>

<?php
$counter=0;
    	foreach ($posts as $post) {
			$counter++;
    	?>
        	<div class="news">
            	<h3>
				<?php echo "Patient ".$counter. " : "; ?>


            	</h3>
            	<p>
                	<?php
                	// We display the post content.
					echo '<br>'.($post['nom'].' '.($post['prenom']));
                	echo "</br>adresse : ".($post['adresse']);
                    echo "</br>ville : ".($post['ville']);
                	?>
                	<br />
            	</p>
        	</div>
    	<?php
    	} // The end of the posts loop.
    	?>
	</body>
</html>