<?php 
header("Pragma: no-cache");
include dirname(__FILE__).'/../include/connexionBdd.php';
include 'include/head.php';

// récupère les 30 derniers download
$comnews= $bdd->query('SELECT titre,C.pseudo as pseudo,commentaire, C.id as id,C.timestamp as timestamp FROM news N JOIN commentaire_news C ON N.id=C.id_news ORDER BY timestamp DESC' );
?>
<div id="main">
	<h2>Les 50 derniers commentaires de news</h2>
	
  <div id="archnews_liste">
<!-- entete du tableau-->

		<div id="listrlz_cat">
			<span class="commnews_date">Date</span>
			<span class="commnews_titre">Titre de la news</span>
			<span class="commnews_auteur">Auteur</span>
			<span class="commnews_comm">Commentaire</span>
			<span class="commnews_suppr">Suppression</span>
		</div>
<!-- entete du tableau-->
<?php
			// on récupère les 30 derniers download

			while($commentaires = $comnews->fetch(PDO::FETCH_ASSOC))
			{
			// print_r($commentaires);
		?>
<!-- dynamique-->		
		<div class="listrlz_line">
			<span class="commnews_date"><?php echo date("d/m/Y",$commentaires['timestamp']); ?></span>
			<span class="commnews_titre"><?php echo $commentaires['titre']; ?></span>
			<span class="commnews_auteur"><?php echo $commentaires['pseudo']; ?></span>
			<span class="commnews_comm"><?php echo $commentaires['commentaire']; ?></span>
			<span class="commnews_suppr"><a href="action/supprcomnews.php?idcommnews=<?php echo $commentaires['id']; ?>">Supprimer</a></span>
	
		</div>
<!-- dynamique-->		

<?php

	}
?>		
	</div>	<!-- end tableau-->		
	
	
</div>



<?php 
include 'include/foot.php';
?> 
