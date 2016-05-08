<?php
//*
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Les dernières news";
include 'include/head.php';
//*/
}
?>
				<section>
					<div id="wrapper">
					<?php
					//On récupère le nombre total de news dans la bdd
					include_once 'include/connexionBdd.php';
					
					$nbNews = $bdd->query('SELECT COUNT(*) as total_news FROM news');
					$totalNews = $nbNews->fetch();
					
					//on calcule le nombre de page necessaires
					$nbNewsPage = 5;
					$nbPages = ceil($totalNews['total_news']/ $nbNewsPage);
					
					$nbNews->closeCursor();
					//*/
					//On vérifie sur quelle page on est
					$pageIndex = 1;
					if(isset($_GET['pageIndex']))
					{
						$pageIndex = intval($_GET['pageIndex']);
					}
					else
					{
						$pageIndex = 1;
					}
					
					$cache = 'cache/index'.$pageIndex.'.html';//On met le chemin d'acces au fichier cache dans une variable
					$expire = time() - 86400;//Le cache est valable 24h soit 86400 secondes
					
					
					//Si le fichier existe et qu'il n'a pas expiré on le lit
					if(file_exists($cache) && filemtime($cache) > $expire)
					{
						readfile($cache);
					}
					else //Sinon on le crée
					{
						//echo '<br/>Passage dans le else de l\'index<br/>';
						//*/
						require 'classes/NewsManager.php';
						$news = new NewsManager();
						$affichage = $news->cacheIndex($pageIndex);
						
						echo $affichage;
						//*/
					}
					
					echo '</div></section>';

					?>	
						
<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
