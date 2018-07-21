<?php 
header("Pragma: no-cache");
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
include dirname(__FILE__).'/../include/connexionBdd.php';
include 'include/head.php';
?>
<div id="main">
	<?php
	//Vérification de l'existance de la variable GET
	if(isset($_GET['idMo']))
	{
		//On repasse la variable en int par sécurité
		$idMo = intval($_GET['idMo']);
		
		$modNew = $bdd->prepare('SELECT * FROM news WHERE id = :idMo');
		$modNew->bindValue(':idMo', $idMo, PDO::PARAM_INT);
		$modNew->execute();
		
		//affichage du formulaire de modification
		while($formu = $modNew->fetch(PDO::FETCH_ASSOC))
		{
		?>
	<h2>Modifier le best of</h2>

	<form action="action/modbestof.php" method="post">
		<input type="hidden" name="id" value="<?php echo $formu['id']; ?>">
		<p>
			Contexte de la news :
			<br />
			<textarea name="contexte" rows="8" cols="75"><?php echo $formu['contextbest']; ?></textarea>
		</p>	
		
		<input type="submit" value="Envoyer" />
	</form>
		<p>
			<span class="titlebox gras">La news</span>
			<span class="abloc">titre : <?php echo $formu['titre']; ?></span>
			<span class="abloc">Auteur : <?php echo $formu['pseudo']; ?></span>
			<span class="abloc">Date : <?php echo date('d/m/Y', $formu['timestamp']); ?></span>
		</p>
		<p>
			<?php echo $formu['contenu']; ?>
		</p>
<?php
	}
		$modNew->closeCursor();
}
?> 






		
</div>

<?php 
include 'include/foot.php';
?> 
