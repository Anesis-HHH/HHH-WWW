<?php 
include dirname(__FILE__).'/../include/connexionBdd.php';
include 'include/head.php';

$idmembre= intval($_GET['idmembre']);
$Membre= $bdd->query('SELECT * FROM membre WHERE id='.$idmembre.'');
$member = $Membre->fetch(PDO::FETCH_ASSOC);
?>
<div id="main">
	<h2>Modifier un membre</h2>

	<form action="action/modmembre.php" method="post">
			<input type="hidden" name="idmembre" value="<?php echo $_GET['idmembre']; ?>"/>
		<p>
			Pseudo :
			<input type="text" name="pseudo" value="<?php echo $member['pseudo']?>"/><br/>			
		</p>
		<p>
			email :
			<input type="text" name="email" value="<?php echo $member['email']?>"/><br/>	
			<span class="advice mini">N'apparaitra pas sur le site</span>				
		</p>
		<p>
			Date de naissance :
			<input type="text" name="datenaissance" value="<?php echo $member['birthday']?>"/><br/>
			<span class="advice mini">Sous la forme JJ/MM/AAAA. Seul votre âge apparaitra sur le site</span>
		</p>
		<p>
			Fichier avatar :
			<input type="text" name="avatar" value="<?php echo $member['avatar']?>"/><br/>
			<span class="advice mini">Mettez le nom du fichier. N'oubliez pas d'uploader le fichier d'avatar dans images/avatars/</span>
		</p>		
		<p>
			Pôle du(des) poste(s) occupé(s) :<br/>
			Traduction<input type="checkbox" name="pole1" value="traduction" <?php  if(strcmp("traduction", $member['pole1']) == 0) echo 'checked="checked"'; ?>/><br/>
			Correction<input type="checkbox" name="pole2" value="correction" <?php  if(strcmp("correction", $member['pole2']) == 0) echo 'checked="checked"'; ?>/><br/>
			Édition<input type="checkbox" name="pole3" value="edition" <?php  if(strcmp("edition", $member['pole3']) == 0) echo 'checked="checked"'; ?>/><br/>
			Développement<input type="checkbox" name="pole4" value="developpement" <?php  if(strcmp("developpement", $member['pole4']) == 0) echo 'checked="checked"'; ?>/><br/>
		</p>
		

		<p>
			Description :
			<br />
			<textarea name="description" rows="8" cols="75"><?php echo $member['description']?></textarea>
		</p>	

		<p>
			Loisirs :
			<br />
			<textarea name="loisirs" rows="8" cols="75"><?php echo $member['loisirs']?></textarea>
		</p>
		<p>
			Contribution aux projets suivants :
			<br />
			<textarea name="contribution" rows="8" cols="75"><?php echo $member['contribution']?></textarea>
		</p>		
		<p>
			Statut :
			<select name="statut">
				<option value="-">-</option>
				<option value="actif"  <?php  if(strcmp("actif", $member['statut']) == 0) echo 'selected="selected"'; ?>>Actif</option>
				<option value="enpause"  <?php  if(strcmp("en pause", $member['statut']) == 0) echo 'selected="selected"'; ?>>En pause</option>
				<option value="retraite"  <?php  if(strcmp("retraite", $member['statut']) == 0) echo 'selected="selected"'; ?>>À la retraite</option>
			</select><br/>
		</p>	
		
		<input type="submit" value="Envoyer" />
	</form>







		
</div>

<?php 
include 'include/foot.php';
?> 
