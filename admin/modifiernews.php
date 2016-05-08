<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
include dirname(__FILE__).'/../include/connexionBdd.php';

include 'include/head.php';
?>
<div id="main">
		<div id="newspreview">
			<div id="wrapper">
				<article class="news" data-newsid="240">
					<h3></h3>
					<time datetime="2014-04-01">1er Avril 2014</time>
					<div class="newsaside">
						<img src="" alt="avatar">
						<div class="author">Par <a href=""></a></div>
						<div class="commentaires">Commentaires (0)</div>
						<div class="thanks">Dire merci (<span>0</span>)</div>
					</div>
					<div id="contenunews">
					
					</div>
					<div class="newspermalien"><a href="http://hhh-world.com/V3/lirenews.php?idnews=240&titre=un-titre-de-news" data-link="news">Permalien</a></div>
				</article>
			</div>
			<div id="newspreviewclose">FERMER</div>
		</div>
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
			<h2>Modifier une news</h2>
			
				<form action="action/modnews.php" method="post" name="news">
			<p>Titre :<br />
				<input type="text" name="titre" value="<?php echo $formu['titre']; ?>" />
			</p>
			<p>Fichier avatar :<br />
				<input type="text" name="avatar" value="<?php echo htmlentities($formu['avatar']); ?>"/><br />
			</p>
			<p>
			<span class="abloc gras">Mémo pour composer une news</span>
			
			<span class="abloc">Tout paragraphe dois commencer et finir par </span>
			<code>&ltp>votretexte&lt/p></code>
			<span class="abloc">Lien pour une image :</span>
			<code>&ltimg src="images/news/V3/2014-01-25/votreimage.jpg" alt="news hhh"></code>
			
			</p>
			<p>Contenu :<br />
					
				<textarea name="contenu" rows="20" cols="75"><?php echo $formu['contenu']; ?></textarea><br/>
								
			<p>Pseudo :
				<input type="text" name="pseudo" value="<?php echo $formu['pseudo']; ?>" /></p>
			<p>
			<p>
				Best Of
				<input type="checkbox" name="best" <?php  if(strcmp('oui', $formu['best']) == 0) echo 'checked="checked"'; ?> />
			</p>
			<input type="hidden"  name="idMod" value="<?php echo $formu['id']; ?>" />
			</p>
			<p>
				<div id="previsualisation">Prévisualiser la news</div>
				<input type="submit" value="Envoyer" /><br />
				<span class="gras">
				La modification ne valide pas la news. Si elle n'est pas déjà publiée, 
				n'oubliez pas de le faire en utilisant le bouton Valider dans la liste des news !</span></p>
		</form>
		<?php
		}
		$modNew->closeCursor();
	}
   	?> 
</div>
<?php
 
include 'include/foot.php';
?> 
