<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
 
require 'classes/CommentProjet.php';

echo '<div id="commentaire_box">';
//On créer un objet CommentProjet avec lequel on va aficher la liste des commentaires			
$montreCom = new CommentProjet();
$montreCom->lister($_GET["idprojet"]);

echo'
<div id="depot_commentaire_depotbox">	
			<div class="twinbox">
				<div>Pseudo</div>
				<input type="text" name="pseudo" />
				<input type="text" name="dumbot" />
				<div id="preview_commentaire_button">Prévisualiser</div>
				<div id="depot_commentaire_button" data-commprojetid="'.$_GET["idprojet"].'">Envoyer</div>
			</div>
			<div class="twinbox">
				<div>Commentaire</div>
				<textarea name="commentaire"></textarea>
			</div>
			
		</div>
		
		';
		
		
?>
