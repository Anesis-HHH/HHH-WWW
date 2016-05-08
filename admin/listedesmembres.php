<?php 
include dirname(__FILE__).'/../include/connexionBdd.php';
include 'include/head.php';
$Membre= $bdd->query('SELECT * FROM membre WHERE id!=0 ORDER BY statut,pseudo');
?>
<div id="main">
<h2>Liste des membres</h2>
	
	
	
	<div id="archnews_liste">
<!-- entete du tableau-->
		<div id="listnews_cat">
			<span class="membre_pseudo">Pseudo</span>
			<span class="membre_mail">Email</span>
			<span class="membre_pole">Pôle</span>
			<span class="membre_statut">statut</span>
			<span class="membre_modif">Modifier</span>
			<span class="membre_suppr">Supprimer</span>
		</div>
<!-- entete du tableau-->
		<?php
			while($member = $Membre->fetch(PDO::FETCH_ASSOC))
			{
		?>
<!-- dynamique-->		
		<div class="listnews_line">
			<span class="membre_pseudo"><?php echo $member['pseudo']; ?></span>
			<span class="membre_mail"><?php echo $member['email']; ?></span>
			<span class="membre_pole">
			<?php 
			if($member['pole1']!="-")echo $member['pole1'].", "; 
			if($member['pole2']!="-")echo $member['pole2'].", "; 
			if($member['pole3']!="-")echo $member['pole3'].", "; 
			if($member['pole4']!="-")echo $member['pole4'].", "; 
			?></span>
			<span class="membre_statut"><?php echo $member['statut']; ?></span>
			<span class="membre_modif"><a href="modifmembre.php?idmembre=<?php echo $member['id']; ?>">Modifier</a></span>
			<span class="membre_suppr"><a href="">Supprimer</a></span>
		</div>

		
		<?php
			}
			$Membre->closeCursor();
		?>
<!-- dynamique-->			
	</div>							
		


		
</div>


<?php 
include 'include/foot.php';
?> 
