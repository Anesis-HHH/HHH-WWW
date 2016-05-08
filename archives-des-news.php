<?php
require 'classes/NewsManager.php';
require 'classes/toolz.php';

if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Les archives des news";
include 'include/head.php';
}

$archives = new NewsManager();
$tabArc = $archives->listArchive();


?>
			
				<section>
					<div id="wrapper">
						<div id="filterbox" class="filterreploy">
							<div id="filterboxtitle">Filtres</div>
							
							<div class="filter filterreploy">
								<div class="filtername">
									Date de parution<br/> <span class="mini indent abloc">(Choisissez obligatoirement une année et un mois)</span>
								</div>
								<div class="filterdate">
									<div class="filteryear" data-dateselect="false">2014</div>
									<div class="filteryear" data-dateselect="false">2013</div>
									<div class="filteryear" data-dateselect="false">2012</div>
									<div class="filteryear" data-dateselect="false">2011</div>
									<div class="filteryear" data-dateselect="false">2010</div>
									<div class="filteryear" data-dateselect="false">2009</div>
									<div class="filteryear" data-dateselect="false">2008</div>
									<div class="filteryear" data-dateselect="false">2007</div>
									<div class="filteryear" data-dateselect="false">2006</div>
									<div class="filteryear" data-dateselect="false">2005</div>
									<div class="filteryear" data-dateselect="false">2004</div>
								</div>
								<div class="filterdate">
									<div class="filtermonth" data-dateselect="false">01 - Janvier</div>
									<div class="filtermonth" data-dateselect="false">02 - Février</div>
									<div class="filtermonth" data-dateselect="false">03 - Mars</div>
									<div class="filtermonth" data-dateselect="false">04 - Avril</div>
									<div class="filtermonth" data-dateselect="false">05 - Mai</div>
									<div class="filtermonth" data-dateselect="false">06 - Juin</div>
									<div class="filtermonth" data-dateselect="false">07 - Juillet</div>
									<div class="filtermonth" data-dateselect="false">08 - Août</div>
									<div class="filtermonth" data-dateselect="false">09 - Septembre</div>
									<div class="filtermonth" data-dateselect="false">10 - Octobre</div>
									<div class="filtermonth" data-dateselect="false">11 - Novembre</div>
									<div class="filtermonth" data-dateselect="false">12 - Décembre</div>
								</div>
								<div id="filtrerladate">Filtrer par date</div>
							</div>
							<div id="resetfilter">Réinitialiser les filtres</div>
						</div>
						<div id="archnews_liste">
				<!-- entete du tableau-->
							<div id="listnews_cat">
								<span class="listnews_date">Date</span>
								<span class="listnews_titre">Titre</span>
								<span class="listnews_resume">Extrait</span>
								<span class="listnews_auteur">Auteur</span>
							</div>
							<?php
							foreach($tabArc as $info)
							{
								//On ne va afficher que la première phrase de la news sur la ligne.
								$resume = explode('.', $info['contenu']);
								
								$paramTitre=rewriteURL($info['titre']);
															
								/*$paramTitre = str_replace(' ', '-', $info['titre']);
								//TECHNIQUE DU CASTOR D'ALBIREW (suédé par Lukia) POUR ENELVER LES ACCENTS, cherche pas, tu peux pas test. En fait il convertit la string en iso américain...
								setlocale(LC_CTYPE, 'fr_FR');
								$paramTitre = iconv('UTF-8', 'US-ASCII//TRANSLIT', $paramTitre);*/
							?>
							<div class="listnews_line">
								<a href="lireNews.php?idnews=<?php echo $info['id'].'&amp;titre='.$paramTitre; ?>" data-link="archnews" >
								<span class="listnews_date"><?php echo date('d/m/y', $info['timestamp']); ?></span>
								<span class="listnews_titre"><?php echo $info['titre']; ?></span>
								<span class="listnews_resume"><?php echo stripslashes(strip_tags($resume[0])); ?></span>
								<span class="listnews_auteur"><?php echo $info['pseudo']; ?></span>
								</a>
							</div>
							<?php
							}
							?>
						</div>
					
					
					</div>
				</section>	


<?php

if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
