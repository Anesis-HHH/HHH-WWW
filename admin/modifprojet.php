<?php
header("Pragma: no-cache");
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
include dirname(__FILE__).'/../include/connexionBdd.php';

include 'include/head.php';
?>
<div id="main">
	<h2>Modification d'un projet</h2>
<?php 
//vérification de l'existance de la variable
if(isset($_GET['idModProj']))
{
	//On repasse la variable en int par sécurité
	$idMod = intval($_GET['idModProj']);
	
	//Récupération des infos du projet dans la bdd
	$projmod = $bdd->prepare('SELECT * FROM projets WHERE id = :idMod');
	$projmod->bindValue(':idMod', $idMod, PDO::PARAM_INT);
	
	$projmod->execute();
	
	//affichage du formulaire de modification
	while($formu = $projmod->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<form action="action/modprojet.php" method="post">

		<p>
			Titre :
			<input type="text" name="titre_hhh" value="<?php echo $formu['titre']; ?>"/><br/>
			<span class="advice mini">Le titre donné par la HHH</span>
		</p>
		<p>
			Titre Japonais :
			<input type="text" name="titre_jap" value="<?php echo $formu['titre_jap']; ?>"/><br/>
			<span class="advice mini">Le titre en kanji</span>
		</p>
		<p>
			Titre Romanji :
			<input type="text" name="titre_roman" value="<?php echo $formu['titre_romanji']; ?>"/><br/>
			<span class="advice mini">Le titre japonais romanisé</span>
		</p>
		<p>
			Auteur :
			<input type="text" name="auteur" value="<?php echo $formu['auteur']; ?>"/><br/>
		</p>		
		<p>
			Editeur :
			<input type="text" name="editeur_jap" value="<?php echo $formu['editeur_jap']; ?>"/><br/>
		</p>
		<p>
			Genre 1 :
			<select name="genre1">
				<option value="-">-</option>
				<option value="Bakunyu" <?php  if(strcmp("Bakunyu", $formu['genre1']) == 0) echo 'selected="selected"'; ?>  >Bakunyu</option>
				<option value="Classique" <?php  if(strcmp("Classique", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Classique</option>
				<option value="Comic" <?php  if(strcmp("Comic", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Comic</option>
				<option value="Compilation" <?php  if(strcmp("Compilation", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Compilation</option>
				<option value="Couleur" <?php  if(strcmp("Couleur", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Couleur</option>
				<option value="Déformation" <?php  if(strcmp("Déformation", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Déformation</option>
				<option value="Doujinshi" <?php  if(strcmp("Doujinshi", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Doujinshi</option>
				<option value="Ecchi" <?php  if(strcmp("Ecchi", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Ecchi</option>
				<option value="Fantasy" <?php  if(strcmp("Fantasy", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Fantasy</option>
				<option value="Femdom" <?php  if(strcmp("Femdom", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Femdom</option>
				<option value="Fetish" <?php  if(strcmp("Fetish", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Fetish</option>
				<option value="Furry" <?php  if(strcmp("Furry", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Furry</option>
				<option value="Futanari" <?php  if(strcmp("Futanari", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Futanari</option>
				<option value="Guro" <?php  if(strcmp("Guro", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Guro</option>
				<option value="Humour" <?php  if(strcmp("Humour", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Humour</option>
				<option value="Inceste" <?php  if(strcmp("Inceste", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Inceste</option>
				<option value="Lolicon" <?php  if(strcmp("Lolicon", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Lolicon</option>
				<option value="Oppai" <?php  if(strcmp("Oppai", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Oppai</option>
				<option value="Scatophilie" <?php  if(strcmp("Scatophilie", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Scatophilie</option>
				<option value="SchoolGirl" <?php  if(strcmp("SchoolGirl", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>SchoolGirl</option>
				<option value="Shotacon" <?php  if(strcmp("Shotacon", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Shotacon</option>
				<option value="SM" <?php  if(strcmp("SM", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>SM</option>
				<option value="Tentacules" <?php  if(strcmp("Tentacules", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Tentacules</option>
				<option value="Viol" <?php  if(strcmp("Viol", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Viol</option>
				<option value="Yaoi" <?php  if(strcmp("Yaoi", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Yaoi</option>
				<option value="Yuri" <?php  if(strcmp("Yuri", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Yuri</option>
				<option value="Zoophilie" <?php  if(strcmp("Zoophilie", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Zoophilie</option>
			</select>
			Genre 2 :
			<select name="genre2">
				<option value="-">-</option>
				<option value="Bakunyu" <?php  if(strcmp("Bakunyu", $formu['genre2']) == 0) echo 'selected="selected"'; ?>  >Bakunyu</option>
				<option value="Classique" <?php  if(strcmp("Classique", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Classique</option>
				<option value="Comic" <?php  if(strcmp("Comic", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Comic</option>
				<option value="Compilation" <?php  if(strcmp("Compilation", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Compilation</option>
				<option value="Couleur" <?php  if(strcmp("Couleur", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Couleur</option>
				<option value="Déformation" <?php  if(strcmp("Déformation", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Déformation</option>
				<option value="Doujinshi" <?php  if(strcmp("Doujinshi", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Doujinshi</option>
				<option value="Ecchi" <?php  if(strcmp("Ecchi", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Ecchi</option>
				<option value="Fantasy" <?php  if(strcmp("Fantasy", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Fantasy</option>
				<option value="Femdom" <?php  if(strcmp("Femdom", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Femdom</option>
				<option value="Fetish" <?php  if(strcmp("Fetish", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Fetish</option>
				<option value="Furry" <?php  if(strcmp("Furry", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Furry</option>
				<option value="Futanari" <?php  if(strcmp("Futanari", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Futanari</option>
				<option value="Guro" <?php  if(strcmp("Guro", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Guro</option>
				<option value="Humour" <?php  if(strcmp("Humour", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Humour</option>
				<option value="Inceste" <?php  if(strcmp("Inceste", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Inceste</option>
				<option value="Lolicon" <?php  if(strcmp("Lolicon", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Lolicon</option>
				<option value="Oppai" <?php  if(strcmp("Oppai", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Oppai</option>
				<option value="Scatophilie" <?php  if(strcmp("Scatophilie", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Scatophilie</option>
				<option value="SchoolGirl" <?php  if(strcmp("SchoolGirl", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>SchoolGirl</option>
				<option value="Shotacon" <?php  if(strcmp("Shotacon", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Shotacon</option>
				<option value="SM" <?php  if(strcmp("SM", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>SM</option>
				<option value="Tentacules" <?php  if(strcmp("Tentacules", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Tentacules</option>
				<option value="Viol" <?php  if(strcmp("Viol", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Viol</option>
				<option value="Yaoi" <?php  if(strcmp("Yaoi", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Yaoi</option>
				<option value="Yuri" <?php  if(strcmp("Yuri", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Yuri</option>
				<option value="Zoophilie" <?php  if(strcmp("Zoophilie", $formu['genre2']) == 0) echo 'selected="selected"'; ?>>Zoophilie</option>
			</select>
			Genre 3 :
			<select name="genre3">
				<option value="-">-</option>
				<option value="Bakunyu" <?php  if(strcmp("Bakunyu", $formu['genre3']) == 0) echo 'selected="selected"'; ?>  >Bakunyu</option>
				<option value="Classique" <?php  if(strcmp("Classique", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Classique</option>
				<option value="Comic" <?php  if(strcmp("Comic", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Comic</option>
				<option value="Compilation" <?php  if(strcmp("Compilation", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Compilation</option>
				<option value="Couleur" <?php  if(strcmp("Couleur", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Couleur</option>
				<option value="Déformation" <?php  if(strcmp("Déformation", $formu['genre1']) == 0) echo 'selected="selected"'; ?>>Déformation</option>
				<option value="Doujinshi" <?php  if(strcmp("Doujinshi", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Doujinshi</option>
				<option value="Ecchi" <?php  if(strcmp("Ecchi", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Ecchi</option>
				<option value="Fantasy" <?php  if(strcmp("Fantasy", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Fantasy</option>
				<option value="Femdom" <?php  if(strcmp("Femdom", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Femdom</option>
				<option value="Fetish" <?php  if(strcmp("Fetish", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Fetish</option>
				<option value="Furry" <?php  if(strcmp("Furry", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Furry</option>
				<option value="Futanari" <?php  if(strcmp("Futanari", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Futanari</option>
				<option value="Guro" <?php  if(strcmp("Guro", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Guro</option>
				<option value="Humour" <?php  if(strcmp("Humour", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Humour</option>
				<option value="Inceste" <?php  if(strcmp("Inceste", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Inceste</option>
				<option value="Lolicon" <?php  if(strcmp("Lolicon", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Lolicon</option>
				<option value="Oppai" <?php  if(strcmp("Oppai", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Oppai</option>
				<option value="Scatophilie" <?php  if(strcmp("Scatophilie", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Scatophilie</option>
				<option value="SchoolGirl" <?php  if(strcmp("SchoolGirl", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>SchoolGirl</option>
				<option value="Shotacon" <?php  if(strcmp("Shotacon", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Shotacon</option>
				<option value="SM" <?php  if(strcmp("SM", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>SM</option>
				<option value="Tentacules" <?php  if(strcmp("Tentacules", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Tentacules</option>
				<option value="Viol" <?php  if(strcmp("Viol", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Viol</option>
				<option value="Yaoi" <?php  if(strcmp("Yaoi", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Yaoi</option>
				<option value="Yuri" <?php  if(strcmp("Yuri", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Yuri</option>
				<option value="Zoophilie" <?php  if(strcmp("Zoophilie", $formu['genre3']) == 0) echo 'selected="selected"'; ?>>Zoophilie</option>
			</select><br/>
			<span class="advice mini">Sélectionnez jusqu'a 3 genres.</span>
		</p>
		<p>
			Nombre de volume :
			<input type="text" name="volume" value="<?php echo $formu['volume']; ?>"/>
		</p>
		<p>
			Nombre de chapitres :
			<input type="text" name="nombre_chapitre" value="<?php echo $formu['nombre_chapitre']; ?>"/>
		</p>
		<p>
			Traduction US :
			<input type="text" name="traduction_us" value="<?php echo $formu['traduction_us']; ?>"/>
		</p>
		<p>
			Statut :
			<select name="categorie">
				<option value="en cours" <?php  if(strcmp("en cours", $formu['statut']) == 0) echo 'selected="selected"'; ?>>Projet en cours</option>
				<option value="complet" <?php  if(strcmp("complet", $formu['statut']) == 0) echo 'selected="selected"'; ?>>Projet terminés</option>
				<option value="horsserie" <?php  if(strcmp("horsserie", $formu['statut']) == 0) echo 'selected="selected"'; ?>>Hors-série</option>
				<option value="anime" <?php  if(strcmp("anime", $formu['statut']) == 0) echo 'selected="selected"'; ?>>Anime</option>
				<option value="jeux" <?php  if(strcmp("jeux", $formu['statut']) == 0) echo 'selected="selected"'; ?>>Jeux</option>
			</select><br/>
			<span class="advice mini">Sélectionnez la catégorie du site dans laquelle le projet apparaitra.</span>
		</p>	
		<p>
			Licencié :
			<select name="statut">
				<option value="non" <?php  if(strcmp("non", $formu['licencie']) == 0) echo 'selected="selected"'; ?>>Non</option>
				<option value="oui" <?php  if(strcmp("oui", $formu['licencie']) == 0) echo 'selected="selected"'; ?>>Oui</option>
			</select><br/>
			<span class="advice mini">Si le statut du projet licencié est "oui", ses download n'apparaitront plus sur le site</span> 
		</p>
		<p>
			Résumé :
			<br />
			<textarea name="resume" rows="20" cols="75" ><?php echo $formu['resume']; ?></textarea>
		</p>		
		<p>
			Fichier couverture :
			<input type="text" name="couverture" value="<?php echo htmlentities($formu['couverture']); ?>"/><br/>
			<span class="advice mini">Mettez le nom du fichier. N'oubliez pas d'uploader le fichier de couverture dans images/manga/couvertures/, même pour un jeu</span>
		</p>
		
		<p>
			Fichier extrait :
			<input type="text" name="extrait" value="<?php echo htmlentities($formu['extrait']); ?>"/><br/>
			<span class="advice mini">Mettez le nom du fichier. N'oubliez pas d'uploader le fichier de couverture dans images/manga/extraits/, même pour jeux<br />Si vous n'avez pas d'extrait, un fichier "pas d'extrait" est disponible sous le nom "extrait_non_disponible.png"</span>
		</p>

<!--
		<p>
			Releases :
			<br />
			<textarea name="release" rows="15" cols="75"></textarea>
		</p>
-->		
		<p>
			<input type="hidden"  name="idProj" value="<?php echo $formu['id']; ?>" />
		</p>
		<input type="submit" value="Envoyer" />
	</form>
		<?php
	}
	$projmod->closeCursor();
}



?>
		
</div>

<?php 
include 'include/foot.php';
?> 
