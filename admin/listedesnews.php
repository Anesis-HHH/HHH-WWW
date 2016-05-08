<?php 
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require dirname(__FILE__).'/../classes/NewsManager.php';
include 'include/head.php';
?>
<div id="main">
<h2>Liste des news</h2>
						
	<div id="archnews_liste">
<!-- entete du tableau-->
		<div id="listnews_cat">
			<span class="listnews_titre">Titre</span>
			<span class="listnews_date">Date</span>
			<span class="listnews_statut">preview</span>
			<span class="listnews_statut">Statut</span>
			<span class="listnews_valide">Valider</span>
			<span class="listnews_modif">Modifier</span>
			<span class="listnews_suppr">Supprimer</span>
		</div>
<!-- entete du tableau-->
<?php
$listeNews = new NewsManager();
//Utilisation de la fonction de liste des news
$tabn = $listeNews->listNews();
foreach($tabn as $elem)
{
?>
<!-- dynamique-->		
		<div class="listnews_line">
			<span class="listnews_titre"><?php echo $elem['titre']; ?></span>
			<span class="listnews_date"><?php echo date('d/m/Y', $elem['timestamp']); ?></span>
			<span class="listnews_modif"><a href="/lireNews.php?idnews=<?php echo $elem['id']; ?>">preview</a></span>
			<span class="listnews_statut">
				<?php
				if($elem['validation'] == 0)
				{
					echo 'en attente';
				}
				else
				{
					echo 'Publiée';
				}
				?>
				</span>
			<!-- liens ci dessous à modifier en fonction de tes manager-->
			
			<span class="listnews_modif"><a href="action/validernews.php?idVal=<?php echo $elem['id']; ?>">Valider</a></span>
			<span class="listnews_modif"><a href="modifiernews.php?idMo=<?php echo $elem['id']; ?>">Modifier</a></span>
			<span class="listnews_suppr"><a href="action/supprimernews.php?idSup=<?php echo $elem['id']; ?>">Supprimer</a></span>
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
