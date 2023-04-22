
<p>Êtes vous sûr de vouloir supprimer le patient : <b><?=$_SESSION['delete_user'][0]['prenom'].' '.$_SESSION['delete_user'][0]['nom']?></b> ?</p>
<form method="post" action="?action=liste_users&p=delete&id=<?=$_GET['id'];?>">
<div style="display: flex; justify-content: center;">

                <input type="submit" class="btn btn-primary" value="Oui" name="yess" style="margin-right: 10px;">
                <input type="submit" class="btn btn-primary" value="Retour à la liste des patients" name="nope">
</div>
    <ul>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>
