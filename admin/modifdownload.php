<?php
header("Pragma: no-cache");
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
include dirname(__FILE__).'/../include/connexionBdd.php';
require dirname(__FILE__).'/../classes/ProjetManager.php';
include 'include/head.php';

$projList = new ProjetManager();

$projets = $projList->listProjet();
?>
<div id="main">

	<h2>Modifier un download</h2>
	<?php
	if(isset($_GET['idModDow']))
	{
		//On repasse la variable en int par sécurité
		$idMod = intval($_GET['idModDow']);
	
		//Récupération des infos du projet dans la bdd
		$dowmod = $bdd->prepare('SELECT * FROM download2 WHERE id = :idMod');
		$dowmod->bindValue(':idMod', $idMod, PDO::PARAM_INT);
		
		$dowmod->execute();
		
		//affichage du formulaire de modification
		while($formu = $dowmod->fetch(PDO::FETCH_ASSOC))
		{
	?>
		<form action="action/moddownload.php" method="post">
			<p>
			Titre du projet :
			<select name="titre">
				<?php
				foreach($projets as $ele)
				{
					//echo '<option value"'.$ele['titre'].'">'.$ele['titre'].'</option>';
					?>
					<option value="<?php echo $ele['titre']; ?>" <?php if(strcmp($ele['titre'], $formu['titre']) == 0) echo 'selected="selected"'; ?> ><?php echo $ele['titre']; ?></option>
					<?php
				}
				?>
				
				<!-- name="l'id du projet dans la BDD"-->
			</select>
			</p>
			<p>
			Numéro de chapitre: <input type="text" name="chapitre" value="<?php echo $formu['numero_chapitre']; ?>" /><br/>
			Si c'est une intégrale mettre integrale (TOUT EN MINUSCULES !!! ET SANS ACCENT !) au lieu du numéro de chapitre, si c'est un one-shot ou un doujin, mettre un underscore "_". 
			</p>
			<p>
			Lien de download: <input type="text" name="lienDL" value="<?php echo $formu['dl']; ?>" />
			</p>
			<p>
				Traduction :
				<input type="text" name="traduc" value="<?php echo $formu['traducteur']; ?>" />
			</p>
			<p>
				Check :
				<input type="text" name="check" value="<?php echo $formu['checkeur']; ?>" />
			</p>
			<p>
				Édition :
				<input type="text" name="edition" value="<?php echo $formu['editeur']; ?>" />
			</p>
			<p>
				Qcheck :
				<input type="text" name="qcheck" value="<?php echo $formu['qcheck']; ?>" />
			</p>
			<input type="hidden" name="idDow" value="<?php echo $formu['id']; ?>" />		
			<input type="submit" value="Modifier"/>
		</form>
	<?php
		}
	}
	?>
</div>

<?php 
include 'include/foot.php';
?> 
