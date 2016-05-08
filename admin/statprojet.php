<?php 
include dirname(__FILE__).'/../include/connexionBdd.php';
include 'include/head.php';

// récupère les projets
$projet= $bdd->query('SELECT titre,vote,nombre_vote FROM projets P JOIN notation N ON P.id=N.id_projet ORDER BY titre' );

?>
<div id="main">
	<h2>Statistiques des notes de projets</h2>

  <div id="archnews_liste">
<!-- entete du tableau-->

		<div id="listrlz_cat">
			<span class="note_titre">Titres</span>
			<span class="note_chapitre">Notes</span>
			<span class="note_DL">Nombres de noteurs</span>
			<span class="note_fichier">Moyenne des points par noteurs</span>
		</div>
<!-- entete du tableau-->
<?php
			// on récupère les note et on calcul le coefficient d'appréciation.

			while($retour = $projet->fetch(PDO::FETCH_ASSOC))
			{

			$tile=$retour['titre'];
			$vote=intval($retour['vote']);
			$nbvote=intval($retour['nombre_vote']);
			$moyenne=round($vote / $nbvote,2);

		?>
<!-- dynamique-->		
			
		<div class="listrlz_line">
			<span class="note_titre"><?php echo $tile; ?></span>
			<span class="note_chapitre"><?php echo $vote; ?></span>
			<span class="note_DL"><?php echo $nbvote; ?></span>
			<span class="note_fichier"><?php echo $moyenne; ?></span>
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
