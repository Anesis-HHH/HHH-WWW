<?php 

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
		
		<h2>Ecrire une news</h2>
		
			<form action="action/addnews.php" method="post" name="news">
		<p>Titre :<br />
			<input type="text" name="titre" />
		</p>
		<p>Fichier avatar :<br />
			<input type="text" name="avatar"/><br />
		</p>
		<p>
		<span class="abloc gras">Mémo pour composer une news</span>
		
		<span class="abloc">Tout paragraphe dois commencer et finir par </span>
		<code>&ltp>votretexte&lt/p></code>
		<span class="abloc">Lien pour une image :</span>
		<code>&ltimg src="images/news/V3/2014-01-25/votreimage.jpg" alt="news hhh"></code>
		
		</p>
		<p>Contenu :<br />
				
			<textarea name="contenu" rows="20" cols="75""></textarea><br/>
							
		<p>Pseudo :
			<input type="text" name="pseudo"/></p>
		<p>
			<div id="previsualisation">Prévisualiser la news</div>
			<input type="submit" value="Envoyer" /><br />
			<span class="gras">
			Une fois enregistrée la news est "en attente". 
			N'oubliez pas de la valider pour la publier en utilisant le bouton prévu dans la liste des news !</span></p>
   	</form> 
</div>

<?php 
include 'include/foot.php';
?> 
