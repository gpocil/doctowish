
<p>Supprimer le RDV : <b><?=$_SESSION['delete_rdv'][0]['nom'].', avec '.$_SESSION['delete_rdv'][0][1].'' .$_SESSION['delete_rdv'][0]['prenom'].' à '.$_SESSION['delete_rdv'][0]['heure_rdv']?></b> ?</p>
<form method="post" action="?action=liste_rdv_prat&p=delete&id=<?=$_GET['id'];?>">
<div style="text-align: center;">

                <input type="submit" class="btn btn-primary" value="Oui" name="oui">
                <input type="submit" class="btn btn-primary" value="Retour à la liste des RDV" name="non">
			
</div></form>

    <ul>
		<li><a href="?action=liste_rdv_prat">Retour</a></li>
		<li><a href="?action=logout">Déconnexion</a></li>
	</ul>

