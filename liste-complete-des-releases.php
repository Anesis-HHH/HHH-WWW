<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require 'classes/ProjetManager.php';

if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Liste complète des releases";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						<div id="filterbox" class="filterreploy">
							<div id="filterboxtitle">Filtres</div>
							<div class="filter filterreploy">
								<div class="filtername">Titre</div>
							</div>
							<div class="filter filterreploy">
								<div class="filtername">Genre</div>
							</div>
							<div class="filter filterreploy">
								<div class="filtername">Type</div>
							</div>
							<div class="filter filterreploy">
								<div class="filtername">Auteur</div>
							</div>
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
						<div id="listrlz_liste">
				<!-- entete du tableau-->
				
							<div id="listrlz_cat">
								<span class="listrlz_numero">N°</span>
								<span class="listrlz_titre">Titre</span>
								<span class="listrlz_chapitre">Chap</span>
								<span class="listrlz_genre">Genre 1</span>
								<span class="listrlz_genre">Genre 2</span>
								<span class="listrlz_genre">Genre 3</span>
								<span class="listrlz_type">Type</span>
								<span class="listrlz_auteur">Auteur</span>
								<span class="listrlz_datesortie">Paru le</span>
								<span class="listrlz_telechargements">DL</span>
							</div>
							<?php
				$infos = new ProjetManager();
				$listetele = $infos->listDownPublic();
				
				foreach($listetele as $colone)
				{
					$paramTitre = str_replace(' ', '-', $colone['titre']);
					//TECHNIQUE DU CASTOR D'ALBIREW (suédé par Lukia) POUR ENELVER LES ACCENTS, cherche pas, tu peux pas test. En fait il convertit la string en iso américain...
					setlocale(LC_CTYPE, 'fr_FR');
					$paramTitre = iconv('UTF-8', 'US-ASCII//TRANSLIT', $paramTitre);
					// echo $paramTitre;
				?>
							<div class="listrlz_line">
								
								<a href="ficheprojet.php?idProjet=<?php echo $colone['id'].'&amp;titre='.$paramTitre; ?>" data-link="listeprojet" >
								<span class="listrlz_numero"><?php echo $colone['numero']; ?></span>
								<span class="listrlz_titre"><?php echo $colone['titre']; ?></span>
								<span class="listrlz_chapitre"><?php echo $colone['numero_chapitre']; ?></span>
								<span class="listrlz_genre"><?php echo $colone['genre1']; ?></span>
								<span class="listrlz_genre"><?php echo $colone['genre2']; ?></span>
								<span class="listrlz_genre"><?php echo $colone['genre3']; ?></span>
								<span class="listrlz_type"><?php echo $colone['categorie']; ?></span>
								<span class="listrlz_auteur"><?php echo $colone['auteur']; ?></span>
								<span class="listrlz_datesortie"><?php echo date( 'd/m/y' ,$colone['timestamp']); ?></span>
								<span class="listrlz_telechargements"><?php echo $colone['pop']; ?></span>
								</a>
							</div>
						<?php
					}
						?>	
						</div>
					
					
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 
