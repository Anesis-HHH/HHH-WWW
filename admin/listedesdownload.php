<?php 
header("Pragma: no-cache");
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../classes/ProjetManager.php';
include 'include/head.php';
?>
<div id="main">
	<h2>Liste des downloads</h2>

  <div id="archnews_liste">
<!-- entete du tableau-->

		<div id="listrlz_cat">
			<span class="listrlz_numero">N°</span>
			<span class="listrlz_titre">Projet</span>
			<span class="listrlz_chapitre">Chap</span>
			<span class="listrlz_type">Type</span>
			<span class="listeprojet_membre">Trad</span>
			<span class="listeprojet_membre">Check</span>
			<span class="listeprojet_membre">Édition</span>
			<span class="listeprojet_membre">Qcheck</span>
			<span class="listrlz_datesortie">Date</span>
			<span class="listrlz_telechargements">DL</span>
			<span class="listrlz_modif">Modifier</span>
			<span class="listrlz_suppr">Supprimer</span>
		</div>
<!-- entete du tableau-->
<?php
	//Création d'un objet Projet Manager
	$lisdow = new ProjetManager();
	//Utilisation de la fonction de listage de projets en cours
	$tabdow = $lisdow->listDownload();
	
	foreach($tabdow as $elem)
	{
?>
<!-- dynamique-->		
		<div class="listrlz_line">
			<span class="listrlz_numero"><?php echo $elem['numero']; ?></span>
			<span class="listrlz_titre"><?php echo $elem['titre']; ?></span>
			<span class="listrlz_chapitre"><?php echo $elem['numero_chapitre']; ?></span>
			<span class="listrlz_type">
			<?php
			if(strcmp('integrale', $elem['numero_chapitre'])== 0)
			{
				echo 'Int';
			}
			else
			{
				echo 'Chap';
			}
			?>
			</span>
			<span class="listeprojet_membre"><?php echo $elem['traducteur']; ?></span>
			<span class="listeprojet_membre"><?php echo $elem['checkeur']; ?></span>
			<span class="listeprojet_membre"><?php echo $elem['editeur']; ?></span>
			<span class="listeprojet_membre"><?php echo $elem['qcheck']; ?></span>
			<span class="listrlz_datesortie"><?php echo date('d/m/y', $elem['timestamp']); ?></span>
			<span class="listrlz_telechargements"><?php echo $elem['pop']; ?></span>
			<span class="listrlz_modif"><a href="modifdownload.php?idModDow=<?php echo $elem['id']; ?>">Modifier</a></span>
			<span class="listrlz_suppr"><a href="">Supprimer</a></span>		
		</div>
<!-- dynamique-->		

<?php
	}
?>		
	
	
	</div>	<!-- end tableau-->		
</div>



<?php 
include 'include/foot.php';
?> 
