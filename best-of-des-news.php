<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
	$titredelapage="Le best-of des news";
	include 'include/head.php';
}
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
require 'classes/NewsManager.php';
?>
			
				<section>
					<div id="wrapper">
					

					<h3 class="center">
							Retrouverez dans cette section toutes les news qui ont marqué la HHH. Des plus gros délires aux plus petites vannes en passant par les débats important de l'équipe, voici le best of des news !
						</h3>
					
<?php
$listeNews = new NewsManager();
//Utilisation de la fonction de liste des news
$tabn = $listeNews->bestofNewsOnsite();
foreach($tabn as $elem)
{
$paramTitre = str_replace(' ', '-', $elem['titre']);
?>					

					<article class="best_news">
				
							<div class="best_titre"><?php echo $elem['titre']; ?></div>
							<div class="best_section">Date</div>
							<time datetime="<?php echo date('d-m-Y', $elem['timestamp']); ?>"><?php echo date('d/m/Y', $elem['timestamp']); ?></time>
							<div class="best_section">Auteur</div>
							<p><?php echo $elem['pseudo']; ?></p>
							<div class="best_section">Contexte</div>
							<p><?php echo $elem['contextbest']; ?></p>
							<div class="best_section">Extrait</div>
							<p class="best_resume"><?php echo $elem['contenu']; ?>...</p>
							<div class="best_read"><a href="lireNews.php?idnews=<?php echo $elem['id'].'&amp;titre='.$paramTitre?>" data-link="news">Lire la News</a></div>
					</article>
					
<?php
	}
?>						
					
					
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
