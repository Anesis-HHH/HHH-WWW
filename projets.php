<?php
if(!isset($_GET['request'])) $_GET['request'] = "normal";
if($_GET['request'] != 'ajax'){
$titredelapage="Projets";
include 'include/head.php';
}
?>
			
				<section>
					<div id="wrapper">
						
						<div id="intermediaire">
							<div class="intertitre">
								<h3><a href="projets-en-cours.php" title="Projets en cours" data-link="internal">Projets en cours</a></h3>
								<p>
									Le projets actuellement en cours de traduction sont ici.
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="projets-termines.php" title="Projets terminés" data-link="internal">Projets terminés</a></h3>
								<p>
									Plus de 10 ans de scantrad, ça en fait des projets terminés ! 
								</p>
							</div>
							<div class="intertitre">
								<h3><a href="liste-complete-des-releases.php" title="Liste complète des releases" data-link="internal">Liste complète des releases</a></h3>
								<p>
									Vous recherchez les derniers chapitres sortis, un genre particulier ou un auteur ? Profitez de la liste complète des releases et son système de recherche. 
								</p>
							</div>
						
						</div>
						
					</div>
				</section>	


<?php if($_GET['request'] != 'ajax'){ 	
include 'include/foot.php';
} ?> 