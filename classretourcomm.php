<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
 
require 'classes/CommentNews.php';

echo '<div id="commentaire_box">';
//On créer un objet CommentNews avec lequel on va aficher la liste des commentaires			
$montreCom = new CommentNews();
$montreCom->lister($_GET["idnews"]);

echo '<div id="depot_commentaire_depotbox">	
			<div class="twinbox">
				<div>Pseudo</div>
				<input type="text" name="pseudo" />
				<input type="text" name="dumbot" />
				<div id="preview_commentaire_button">Prévisualiser</div>
				<div id="depot_commentaire_button" data-commnewsid="'.$_GET["idnews"].'">Envoyer</div>
			</div>
			<div class="twinbox">
				<div>Commentaire</div>
				<textarea name="commentaire"></textarea>
			</div>
			
		</div>';

/*
echo'
<div id="commentaire_box">
		<div id="commclose">&times;</div>
		<div id="commentaire_entete">Commentaires</div>

		<div id="commentaire_content">
			
			<div class="commentaire_auteur"> Par Machin, le 18-10-13.</div>
			<p>
			<br/><br/>
				Merci Lukia, ça me va droit au cœur. Tu es gentil car je ne sais pas si je le mérite vu comment je vous ai lâché quand j\'ai voulu rejoindre votre équipe, ce n\'était vraiment pas poli de ma part de ne plus vous donnez de nouvelle et pour ça je m\'en veux beaucoup. Si un jour j\'arrive à me sortir de mes galères je pense que je reviendrais au top et, si vous voulez toujours de moi, je vous lâcherais pas cette fois-ci car ça me plairait toujours au tant d\'éditer de nombreux chapitres avec vous.
				<br /><br />
				Merci à toute la team et je vous souhaite une bonne et belle année 2013 à tous.
			</p>
	

			
		</div>
		

		<div id="depot_commentaire_depotbox">	
			<div class="twinbox">
				<div>Pseudo</div>
				<input type="text" name="pseudo" />
				<input type="text" name="dumbot" />
				<div id="preview_commentaire_button">Prévisualiser</div>
				<div id="depot_commentaire_button" data-commnewsid="'.$_GET["idnews"].'">Envoyer</div>
			</div>
			<div class="twinbox">
				<div>Commentaire</div>
				<textarea name="commentaire"></textarea>
			</div>
			
		</div>
		
		';
//*/		
		
?>
