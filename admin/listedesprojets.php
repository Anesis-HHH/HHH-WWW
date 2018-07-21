<?php 
header("Pragma: no-cache");
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../classes/ProjetManager.php';
include 'include/head.php';
?>
<div id="main">
<h2>Liste des projets</h2>
	<div id="archnews_liste">
<!-- entete du tableau-->
		<div id="listrlz_cat">
			<span class="listeprojet_titre">Titre</span>
			<span class="listeprojet_cat">Statut</span>
			<span class="listeprojet_statut">Licencié</span>
			<span class="listeprojet_note">Note</span>
			<span class="listeprojet_genre1">Genre 1</span>
			<span class="listeprojet_genre2">Genre 2</span>
			<span class="listeprojet_genre3">Genre 3</span>
			<span class="listeprojet_modif">Modifier</span>
			<span class="listeprojet_suppr">Supprimer</span>
		</div>
<!-- entete du tableau-->
<?php
	//Création d'un objet Projet Manager
	$lisproj = new ProjetManager();
	//Utilisation de la fonction de listage de projets en cours
	$tabproj = $lisproj->listProjet();
	
	foreach($tabproj as $elem)
	{
		// prend l'index 0 du tableau associatif retourné.
		//ajout de Yumemi : un tableau associatif n'a pas d'index 0, il fonctionne avec des clés qui ont des noms !
		//Ici on cherche la valeur de l'identifiant du projet et le nom de sa clé est id
		$vote = $lisproj->afficherNote($elem['id']);
		//print_r($vote);
?>
<!-- dynamique-->		
		<div class="listrlz_line">
			<span class="listeprojet_titre"><?php  echo $elem['titre']; ?></span>
			<span class="listeprojet_cat"><?php  echo $elem['statut']; ?></span>
			<span class="listeprojet_statut"><?php  echo $elem['licencie']; ?></span>
			<span class="listeprojet_note"><?php echo $vote['0']; ?></span>
			<span class="listeprojet_genre1"><?php  echo $elem['genre1']; ?></span>
			<span class="listeprojet_genre2"><?php  echo $elem['genre2']; ?></span>
			<span class="listeprojet_genre3"><?php  echo $elem['genre3'];?></span>
			<span class="listeprojet_modif"><a href="modifprojet.php?idModProj=<?php  echo $elem['id']; ?>">Modifier</a></span>
			<span class="listeprojet_suppr"><a href="">Supprimer</a></span>		
		</div>
		
<!-- dynamique-->
<?php
	}
?>			
	</div>								
</div>

<?php 
include 'include/foot.php';
?> 
