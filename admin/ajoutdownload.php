<?php 
require dirname(__FILE__).'/../classes/ProjetManager.php';
include 'include/head.php';

$projList = new ProjetManager();

$projets = $projList->listProjet();
?>
<div id="main">

	<h2>Ajouter un download</h2>
		<form action="action/adddownload.php" method="post">
			<p>
			Titre du projet :
			<select name="titre">
				<?php
				foreach($projets as $ele)
				{
					echo '<option value"'.$ele['titre'].'">'.$ele['titre'].'</option>';
				}
				?>
				
				<!-- name="l'id du projet dans la BDD"-->
			</select>
			</p>
			<p>
			Numéro de chapitre: <input type="text" name="chapitre"/><br/>
			Si c'est une intégrale mettre integrale (TOUT EN MINUSCULES !!!) au lieu du numéro de chapitre, si c'est un one-shot ou un doujin, mettre un underscore "_". 
			</p>
			<p>
			Lien de download: <input type="text" name="lienDL"/>
			</p>
			<p>
				Traduction :
				<input type="text" name="traduction_fr"/>
			</p>
			<p>
				Check :
				<input type="text" name="check"/>
			</p>
			<p>
				Édition :
				<input type="text" name="edition"/>
			</p>
			<p>
				Qcheck :
				<input type="text" name="qcheck"/>
			</p>		
			<input type="submit" value="Ajouter"/>
		</form>
	
</div>

<?php 
include 'include/foot.php';
?> 
