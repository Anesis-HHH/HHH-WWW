<?php 

include 'include/head.php';
?>
<div id="main">
	<h2>Ajouter un projet</h2>

	<form action="action/addprojet.php" method="post">

		<p>
			Titre :
			<input type="text" name="titre_hhh" /><br/>
			<span class="advice mini">Le titre donné par la HHH</span>
		</p>
		<p>
			Titre Japonais :
			<input type="text" name="titre_jap" /><br/>
			<span class="advice mini">Le titre en kanji</span>
		</p>
		<p>
			Titre Romanji :
			<input type="text" name="titre_roman" /><br/>
			<span class="advice mini">Le titre japonais romanisé</span>
		</p>
		<p>
			Auteur :
			<input type="text" name="auteur"/><br/>
		</p>		
		<p>
			Editeur :
			<input type="text" name="editeur_jap" /><br/>
		</p>
		<p>
			Genre 1 :
			<select name="genre1">
				<option value="-">-</option>
				<option value="Bakunyu">Bakunyu</option>
				<option value="Classique">Classique</option>
				<option value="Comic">Comic</option>
				<option value="Compilation">Compilation</option>
				<option value="Couleur">Couleur</option>
				<option value="Déformation">Déformation</option>
				<option value="Doujinshi">Doujinshi</option>
				<option value="Ecchi">Ecchi</option>
				<option value="Fantasy">Fantasy</option>
				<option value="Femdom">Femdom</option>
				<option value="Fetish">Fetish</option>
				<option value="Furry">Furry</option>
				<option value="Futanari">Futanari</option>
				<option value="Guro">Guro</option>
				<option value="Humour">Humour</option>
				<option value="Inceste">Inceste</option>
				<option value="Lolicon">Lolicon</option>
				<option value="Oppai">Oppai</option>
				<option value="Scatophilie">Scatophilie</option>
				<option value="SchoolGirl">SchoolGirl</option>
				<option value="Shotacon">Shotacon</option>
				<option value="SM">SM</option>
				<option value="Tentacules">Tentacules</option>
				<option value="Viol">Viol</option>
				<option value="Yaoi">Yaoi</option>
				<option value="Yuri">Yuri</option>
				<option value="Zoophilie">Zoophilie</option>
			</select>
			Genre 2 :
			<select name="genre2">
				<option value="-">-</option>
				<option value="Bakunyu">Bakunyu</option>
				<option value="Classique">Classique</option>
				<option value="Comic">Comic</option>
				<option value="Compilation">Compilation</option>
				<option value="Couleur">Couleur</option>
				<option value="Déformation">Déformation</option>
				<option value="Doujinshi">Doujinshi</option>
				<option value="Ecchi">Ecchi</option>
				<option value="Fantasy">Fantasy</option>
				<option value="Femdom">Femdom</option>
				<option value="Fetish">Fetish</option>
				<option value="Furry">Furry</option>
				<option value="Futanari">Futanari</option>
				<option value="Guro">Guro</option>
				<option value="Humour">Humour</option>
				<option value="Inceste">Inceste</option>
				<option value="Lolicon">Lolicon</option>
				<option value="Oppai">Oppai</option>
				<option value="Scatophilie">Scatophilie</option>
				<option value="SchoolGirl">SchoolGirl</option>
				<option value="Shotacon">Shotacon</option>
				<option value="SM">SM</option>
				<option value="Tentacules">Tentacules</option>
				<option value="Viol">Viol</option>
				<option value="Yaoi">Yaoi</option>
				<option value="Yuri">Yuri</option>
				<option value="Zoophilie">Zoophilie</option>
			</select>
			Genre 3 :
			<select name="genre3">
				<option value="-">-</option>
				<option value="Bakunyu">Bakunyu</option>
				<option value="Classique">Classique</option>
				<option value="Comic">Comic</option>
				<option value="Compilation">Compilation</option>
				<option value="Couleur">Couleur</option>
				<option value="Déformation">Déformation</option>
				<option value="Doujinshi">Doujinshi</option>
				<option value="Ecchi">Ecchi</option>
				<option value="Fantasy">Fantasy</option>
				<option value="Femdom">Femdom</option>
				<option value="Fetish">Fetish</option>
				<option value="Furry">Furry</option>
				<option value="Futanari">Futanari</option>
				<option value="Guro">Guro</option>
				<option value="Humour">Humour</option>
				<option value="Inceste">Inceste</option>
				<option value="Lolicon">Lolicon</option>
				<option value="Oppai">Oppai</option>
				<option value="Scatophilie">Scatophilie</option>
				<option value="SchoolGirl">SchoolGirl</option>
				<option value="Shotacon">Shotacon</option>
				<option value="SM">SM</option>
				<option value="Tentacules">Tentacules</option>
				<option value="Viol">Viol</option>
				<option value="Yaoi">Yaoi</option>
				<option value="Yuri">Yuri</option>
				<option value="Zoophilie">Zoophilie</option>
			</select><br/>
			<span class="advice mini">Sélectionnez jusqu'a 3 genres.</span>
		</p>
		<p>
			Nombre de volume :
			<input type="text" name="volume" value="1"/>
		</p>
		<p>
			Nombre de chapitres :
			<input type="text" name="nombre_chapitre" value="1"/>
		</p>
		<p>
			Traduction US :
			<input type="text" name="traduction_us" value="???"/>
		</p>
		<p>
			Statut :
			<select name="categorie">
				<option value="en cours">Projet en cours</option>
				<option value="complet">Projet terminés</option>
				<option value="horsserie">Hors-série</option>
				<option value="anime">Anime</option>
				<option value="jeux">Jeux</option>
			</select><br/>
			<span class="advice mini">Sélectionnez la catégorie du site dans laquelle le projet apparaitra.</span>
		</p>	
		<p>
			Licencié :
			<select name="statut">
				<option value="non">Non</option>
				<option value="oui">Oui</option>
			</select><br/>
			<span class="advice mini">Si le statut du projet licencié est "oui", ses download n'apparaitront plus sur le site</span> 
		</p>
		<p>
			Résumé :
			<br />
			<textarea name="resume" rows="20" cols="75"></textarea>
		</p>		
		<p>
			Fichier couverture :
			<input type="text" name="couverture"/><br/>
			<span class="advice mini">Mettez le nom du fichier. N'oubliez pas d'uploader le fichier de couverture dans images/manga/couvertures/, même pour un jeu</span>
		</p>
		
		<p>
			Fichier extrait :
			<input type="text" name="extrait"/><br/>
			<span class="advice mini">Mettez le nom du fichier. N'oubliez pas d'uploader le fichier de couverture dans images/manga/extraits/, même pour jeux<br />Si vous n'avez pas d'extrait, un fichier "pas d'extrait" est disponible sous le nom "extrait_non_disponible.png"</span>
		</p>

<!--
		<p>
			Releases :
			<br />
			<textarea name="release" rows="15" cols="75"></textarea>
		</p>
-->		
		<input type="submit" value="Envoyer" />
	</form>







		
</div>

<?php 
include 'include/foot.php';
?> 
